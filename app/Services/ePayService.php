<?php

namespace App\Services;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client as GuzzleClient;

class ePayService
{
    public $client;
    private $page;
    private $min;
    private $encoded;
    private $checksum;
    private $url_ok;
    private $url_cancel;
    private $currency;
    private $exp_time;
    private $descr;
    private $invoice;

    public function __construct(Request $request)
    {
        $this->client = new GuzzleClient();
        $this->page = 'paylogin';
        $this->min = 2779014582;
        $this->invoice = 3001;
        $this->amount = $request->levels;
        $this->currency = 'BGN';
        $this->exp_time = '30.11.2019';
        $this->descr = 'Payment VSC 9-month coding course -' . $request->user_email;
        $this->url_ok = route('course.payment.create');
        $this->url_cancel = route('course.payment.create');
//        $this->encoded = base64_encode($this->completeData);
        $this->encoded =  base64_encode('DATA');
        $password = 'MS3P75C0ZKZMOTA01IPP9EGRT0WGFVERH5LN4C8IVFCJ76WX34CD218J1FI2KK2P';
        $this->checksum = hash_hmac('sha1', $this->encoded, $password);
        $this->completeData = [
            'PAGE' => $this->page,
            'MIN' => $this->min,
            'INVOICE' => $this->invoice,
            'AMOUNT' => $this->amount,
            'CURRENCY' => $this->currency,
            'EXP_TIME' => $this->exp_time,
            'DESCR' => $this->descr,
            'URL_OK' => $this->url_ok,
            'URL_CANCEL' => $this->url_cancel,
            'ENCODED' => $this->encoded,
            'CHECKSUM' => $this->checksum
        ];
    }

    public function sendPayment()
    {
        $response = $this->client->request('POST', 'https://demo.epay.bg/', [
            'form_params' => $this->completeData
        ]);

        return $response->getBody()->getContents();
    }
}