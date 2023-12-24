<?php

namespace App\Services\UrwayPayment;

class UrwayResponseService
{
    protected array $data = [];

    /**
     * Response constructor.
     */
    public function __construct($response)
    {
        $this->data = $response;
    }

    public function getPaymentUrl()
    {
        if (!empty($this->data['payid']) && !empty($this->data['targetUrl'])) {
            return $this->data['targetUrl'] . '?paymentid=' . $this->data['payid'];
        }

        return false;
    }

    /**
     * @return boolean
     */
    public function isSuccess()
    {
        return $this->data['result'] == 'Successful' && $this->data['responseCode'] == '000';
    }

    /**
     * @return bool
     */
    public function isFailure()
    {
        return !$this->isSuccess();
    }

    public static function getResponseMessage($response_code)
    {
        return match ($response_code) {
            '000' => 'Transaction Successful',
            '001' => 'Pending for Authorization',
            '101' => 'Field is blank in a request',
            '102' => 'Internal Mapping for ISO not set',
            '103' => 'ISO message field configuration not found',
            '104' => 'Response Code not found in ISO message',
            '105' => 'Problem while creating or parsing ISO Message',
            '201' => 'Terminal does not exists',
            '202' => 'Merchant does not exists',
            '203' => 'Institution does not exists',
            '204' => 'Card prefix is not belong to corresponding card Type',

            '205' => 'Card not allowed for this transaction',
            '206' => 'Negative IP, Customer is not allowed to perform Transaction',
            '207' => 'Original Transaction not found',
            '208' => 'Transaction Flow not set for Transaction Type',
            '209' => 'Terminal status is Deactive, Transaction Declined',
            '210' => 'Terminal status is Closed, Transaction Declined',
            '211' => 'Terminal status is Invalid, Transaction Declined',
            '212' => 'Merchant status is Deactive, Transaction Declined',
            '213' => 'Merchant status is Closed, Transaction Declined',
            '214' => 'Merchant status is Invalid, Transaction Declined',
            '215' => 'Institution status is Deactive, Transaction Declined',
            '216' => 'Institution status is Closed, Transaction Declined',
            '217' => 'Institution status is Invalid, Transaction Declined',

            '219' => 'Card Type not supported by Merchant',
            '220' => 'CVV Check Failed, CVV value not present',
            '221' => 'AVS Capture Check Failed, Could not find Customer Address',
            '222' => 'Customer Info Check failed, Could not find Customer Information',
            '223' => 'Card expiry date is not greater than current date',
            '224' => 'Invalid Login Attempts exceeded',
            '225' => 'Wrong Terminal password, Please Re-Initiate transaction',
            '226' => 'Negative Country, Customer is not allowed to perform Transaction',
            '227' => 'Card type not supported by institution',
            '228' => 'Multiple captures not allowed',
            '301' => 'Transaction is not allowed for given Terminal',
            '302' => 'Transaction is not allowed for given Merchant',
            '303' => 'Transaction is not allowed for given Institution',
            '304' => 'Currency not supported for given Terminal',
            '305' => 'Currency not supported for given Merchant',
            '306' => 'Currency not supported for given Institution',

            '307' => 'Velocity Check Failed, Velocity Profile not found, Level - Terminal',
            '308' => 'Velocity Check Failed, Velocity Profile not found, Level - Merchant',
            '309' => 'Velocity Check Failed, Velocity Profile not found, Level - Institution',
            '310' => 'Transaction Profile not set for Terminal, Unable to check Transaction Profile',
            '311' => 'Transaction Profile not set for Merchant, Unable to check Transaction Profile',
            '312' => 'Transaction Profile not set for Institution, Unable to check Transaction Profile',
            '313' => 'Currency Profile not set for Terminal, Unable to check Currency Profile',
            '314' => 'Currency Profile not set for Merchant, Unable to check Currency Profile',
            '315' => 'Currency Profile not set for Institution, Unable to check Currency Profile',
            '316' => 'Velocity Profile not set for Terminal, Unable to check Velocity Profile',

            '618' => 'Invalid State',
            '619' => 'Invalid Country',
            '620' => 'Invalid Cardholder Name.',
            '621' => 'Invalid Zip Code.',
            '622' => 'Invalid IP Address.',
            '623' => 'Invalid Email Address.',
            '624' => 'Transaction cancelled by the user.',
            '6253' => 'D Secure Check Failed, Cannot continue transaction',
            '626' => 'Invalid CVV,CVV Mandatory.',
            '627' => 'Capture not allowed, Mismatch in Capture and Original Auth Transaction Amount.',
            '628' => 'Transaction has not been Captured/Purchase, Refund not allowed.',
            '629' => 'Refund Amount exceeds the Captured/Purchase Amount.',
            '645' => 'Transaction is chargeback transaction, refund not allowed',
            '646' => 'Transaction is chargeback transaction, refund amount exceeds allowed amount',
            '647' => 'Invalid subscription type',
            '649' => 'Invalid payment cycle',
            '650' => 'Invalid payment start date',
            '651' => 'Invalid payment days',
            '652' => 'Invalid payment Method',
            '653' => 'Terminal not allow for recurring payment',
            '654' => 'Invalid Recurring Amount',
            '655' => 'Invalid payment type',
            '656' => 'Invalid No of recurring payment',
            '657' => 'Recurring cycle limit exceeds, cannot set recurring for more than 2 years',
            '658' => 'Amount 0.00 is not supported for Pre-auth transaction',
            default=>'there is an error',
        };
    }
}
