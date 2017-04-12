<?php

// @link http://sms-reg.com/docs/API.html

namespace SmsActivator\Service;


use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use SmsActivator\SmsServiceInterface;

class smsReg implements SmsServiceInterface
{
    protected $endPoint='http://api.sms-reg.com/';

    protected $apiKey;

    /**
     * @var ClientInterface
     */
    protected  $client;

    protected $logger;

    /**
     * smsReg constructor.
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }


    protected function request($action,$params=[])
    {
        $params['apikey']=$this->apiKey;

        try {
            return $this->client->request('GET', $this->endPoint.$action.'.php',['query'=>$params])->getBody();
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
            exit();
        }
    }

    public function setClient(ClientInterface $client) {

        $this->client=$client;
    }

    public function setLogger($logger) {

        $this->logger=$logger;
    }


    public function getBalance()
    {
        $response=$this->request('getBalance');

        return json_decode($response);
    }

    public function getNumber($service)
    {
        $response=$this->request('getNum',[
            'country'=>'ru',
            'service'=>$service
        ]);

        return json_decode($response);
    }

    public function setReady($id)
    {
        $response=$this->request('setReady',[
            'tzid'=>$id,
        ]);

        return json_decode($response);
    }

    public function setUsed($id)
    {
        $response=$this->request('setOperationUsed',[
            'tzid'=>$id,
        ]);

        return json_decode($response);
    }

    public function setCancel($id)
    {
        $response=$this->request('setOperationOver',[
            'tzid'=>$id,
        ]);

        return json_decode($response);
    }

    public function setComplete($id)
    {
        $response=$this->request('setOperationOk',[
            'tzid'=>$id,
        ]);

        return json_decode($response);
    }

    public function getList()
    {
        return [
            'youla' => 'youla.io',
            'gmail' => 'Gmail.com',
            'facebook' => 'Facebook.com',
            'mailru' => 'Mail.ru',
            'vk' => 'Вконтакте',
            'classmates' => 'Одноклассники',
            'twitter' => 'Twitter',
            'mamba' => 'Мамба',
            'uber' => 'Uber',
            'telegram' => 'telegram.org',
            'badoo' => 'Badoo',
            'drugvokrug' => 'другвокруг',
            'avito' => 'avito.ru',
            'olx' => 'OLX',
            'steam' => 'STEAM',
            'fotostrana' => 'Фотострана.ру',
            'microsoft' => 'Microsoft',
            'viber' => 'Viber',
            'whatsapp' => 'whatsapp.com',
            'wechat' => 'wechat.com',
            'seosprint' => 'SEOsprint.net',
            'instagram' => 'Instagram',
            'yahoo' => 'Yahoo',
            'other' => 'Другой сервис'
        ];
    }

    public function getStatus($id)
    {
        $response=$this->request('getState',[
            'tzid'=>$id,
        ]);

        return json_decode($response);
    }

}