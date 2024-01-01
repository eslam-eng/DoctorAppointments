<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BookAppointment;
use App\Models\Settlement;
use App\Models\UrwayTransactions;
use App\Services\UrwayPayment\UrwayIntegrationService;
use App\Services\UrwayPayment\UrwayResponseService;
use DateInterval;
use DateTime;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class UrwayCallbackController extends Controller
{
    public function __construct(public UrwayIntegrationService $urwayIntegrationService)
    {
    }

    public function __invoke()
    {
        try {
            $responseData = \request()->all();
            $requestHash = $responseData['TranId'] . '|' . config('urway.auth.merchant_key') . '|' . $responseData['ResponseCode'] . '|' . $responseData['amount'];
            $hash = hash('sha256', $requestHash);
            $response = $this->urwayIntegrationService->find($responseData);
            if ($hash == $responseData['responseHash'] && $responseData['Result'] == "Successful") {
                if ($response->isSuccess()) {
                    $bookAppointment = BookAppointment::find(Arr::get($responseData, 'TrackId'));
                    $this->updateAppointmentStatus($responseData, $bookAppointment);
                    $this->createTransactionData($responseData);
                    $this->createSettlement($bookAppointment);
                    return apiResponse(data: ['transaction_id' => $responseData['TranId']], message: 'successfully paid');
                } else {
                    return apiResponse(message: 'there is an error please contact with support');
                }
            } else {
                return apiResponse(message: $response->getResponseMessage());
            }
        } catch (\Exception $exception) {
            return apiResponse(message: $exception->getMessage(), code: 500);
        }
    }

    private function createTransactionData(?array $responseData)
    {
        $urway_transaction_data = [
            'payment_id' => Arr::get($responseData, 'PaymentId'),
            'tran_id' => Arr::get($responseData, 'TranId'),
            'track_id' => Arr::get($responseData, 'TrackId'),
            'track_type' => (new BookAppointment())->getMorphClass(),
            'amount' => Arr::get($responseData, 'amount'),
            'masked_pan' => Arr::get($responseData, 'maskedPAN')
        ];
        UrwayTransactions::query()->updateOrCreate(['tran_id' => Arr::get($responseData, 'TranId')], $urway_transaction_data);
    }

    private function updateAppointmentStatus(?array $responseData, $bookAppointment)
    {
        DB::table('book_appointment')->where('id', $bookAppointment->id)->update([
            'payment_mode' => Arr::get($responseData, 'cardBrand'),
            'is_completed' => 1
        ]);
    }

    private function createSettlement($bookAppointment)
    {
        $date = DateTime::createFromFormat('d', 15)->add(new DateInterval('P1M'));
        $store = new Settlement();
        $store->book_id = $bookAppointment->id;
        $store->status = '0';
        $store->payment_date = $date->format('Y-m-d');
        $store->doctor_id = $bookAppointment->doctor_id;
        $store->amount = $bookAppointment->appointment_fees;
        $store->save();
    }
}
