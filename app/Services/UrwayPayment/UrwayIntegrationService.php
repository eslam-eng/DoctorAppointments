<?php

namespace App\Services\UrwayPayment;

use Illuminate\Support\Facades\Http;

class UrwayIntegrationService
{
    /**
     * @var string
     */
    protected $endpoint;
    protected $base_path;

    /**
     * Store request attributes.
     *
     * @var array
     */
    protected array $attributes = [];

    /**
     * @return $this
     */
    public function setTrackId(string|int $trackId): static
    {
        $this->attributes['trackid'] = $trackId;
        return $this;
    }

    /**
     * @return $this
     */
    public function setCustomerEmail(string $email): static
    {
        $this->attributes['customerEmail'] = $email;
        return $this;
    }

    /**
     * @return $this
     */
    public function setMerchantIp($ip): static
    {
        $this->attributes['merchantIp'] = $ip;
        return $this;
    }

    /**
     * @return $this
     */
    public function setCurrency(string $currency): static
    {
        $this->attributes['currency'] = $currency;
        return $this;
    }

    /**
     * @return $this
     */
    public function setCountry(string $country): static
    {
        $this->attributes['country'] = $country;
        return $this;
    }

    /**
     * @return $this
     */
    public function setAmount($amount): static
    {
        $this->attributes['amount'] = $amount;
        return $this;
    }

    /**
     * @return $this
     */
    public function setRedirectUrl($url): static
    {
//        from documentation
        /*
         * User defined field 2 – Same description as UDF1
            Mandatory : No
            Type : String
            Note : udf2 Can be used as dynamic return URL Only
         */
        $this->attributes['udf2'] = $url;
        return $this;
    }

    /**
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @param array $attributes
     *
     * @return $this
     */
    public function mergeAttributes(array $attributes)
    {
        $this->attributes = array_merge($this->attributes, $attributes);
        return $this;
    }

    /**
     * @param mixed $key
     * @param mixed $value
     *
     * @return $this
     */
    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    /**
     * @param mixed $key
     *
     * @return boolean
     */
    public function hasAttribute($key)
    {
        return isset($this->attributes[$key]);
    }

    /**
     * @param mixed $key
     *
     * @return boolean
     */
    public function removeAttribute($key): bool
    {
        $this->attributes = array_filter($this->attributes, function ($name) use ($key) {
            return $name !== $key;
        }, ARRAY_FILTER_USE_KEY);

        return $this;
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException|\Exception
     */
    public function pay()
    {
        $this->setAuthAttributes();

        // We have to generate request
        $this->generateRequestHash();

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Content-Length' => strlen(json_encode($this->attributes)),
            ])->post($this->getEndPoint(), $this->attributes);
            return new UrwayResponseService($response->json());
        } catch (\Throwable $e) {
            throw new \Exception(UrwayResponseService::getResponseMessage($e->getCode()));
        }
    }

    /**
     * @param string $transaction_id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException|\Exception
     */
    public function find(array $urwayResponseData)
    {
        $currency = 'SAR';
        $txn_details1 = $urwayResponseData['TrackId'] . '|' . config('urway.auth.terminal_id') . '|' . config('urway.auth.password') . '|' . config('urway.auth.merchant_key') . '|' . $urwayResponseData['amount'] . '|' . $currency;
        $requestHash1 = hash('sha256', $txn_details1);

        $apiResponseFields = [
            'trackid' => $urwayResponseData['TrackId'],
            'terminalId' => config('urway.auth.terminal_id'),
            'action' => '10',
            'merchantIp' => request()->ip(),
            'password' => config('urway.auth.password'),
            'currency' => $currency,
            'transid' => $urwayResponseData['TranId'],
            'amount' => $urwayResponseData['amount'],
            'requestHash' => $requestHash1
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Content-Length' => strlen(json_encode($apiResponseFields)),
        ])->post($this->getEndPoint(), $apiResponseFields);

        return new UrwayResponseService($response->json());

    }

    /**
     * @return void
     */
    protected function generateRequestHash()
    {
        //Hash Sequence :- trackid|Terminalid|password|secret_key|amount|currency_code
        $requestHash = $this->attributes['trackid'] . '|' . config('urway.auth.terminal_id') . '|' . config('urway.auth.password') . '|' . config('urway.auth.merchant_key') . '|' . $this->attributes['amount'] . '|' . $this->attributes['currency'];
        $this->attributes['requestHash'] = hash('sha256', $requestHash);
        $this->attributes['action'] = '1'; //always one depends on the payment documentation
    }


    /**
     * @return void
     */
    protected function setAuthAttributes()
    {
        $this->attributes['terminalId'] = config('urway.auth.terminal_id');
        $this->attributes['password'] = config('urway.auth.password');
    }

    /**
     * @return string
     */
    public function setEndPoint(string $end_point)
    {
        $this->endpoint = $end_point;
    }

    public function getEndPoint()
    {
        return $this->endpoint ?? config('urway.auth.urway_endpoint');
    }


    /**
     * Determine the base path based on the mode.
     *
     * @return string
     */


    /**
     * Get the package mode.
     *
     * @return string
     */
    public function getMode()
    {
        return config('urway.mode', 'test');
    }

    /**
     * Determine whether the mode is test.
     *
     * @return boolean
     */
    protected function isTesting()
    {
        return $this->getMode() == 'test';
    }

    /**
     * Determine whether the mode is production.
     *
     * @return boolean
     */
    protected function isProduction()
    {
        return $this->getMode() == 'production';
    }
}
