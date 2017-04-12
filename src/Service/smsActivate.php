<?php

// @link http://sms-activate.ru/index.php?act=api

namespace SmsActivator\Service;


use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use SmsActivator\SmsServiceInterface;

class smsActivate implements SmsServiceInterface
{
    protected $endPoint='http://sms-activate.ru/stubs/handler_api.php';

    protected $apiKey;

    /**
     * @var ClientInterface
     */
    protected $client;

    protected $logger;

    /**
     * smsActivate constructor.
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    protected function request($action,$params=[])
    {
        $params['api_key']=$this->apiKey;
        $params['action']=$action;

        try {
            return $this->client->request('GET', $this->endPoint,['query'=>$params])->getBody();
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

        return $response->__toString();
    }

    public function getNumber($service)
    {
        $response=$this->request('getNumber',[
            'service'=>$service
        ]);

        return $response->__toString();
    }

    public function setReady($id)
    {
        $response=$this->request('setStatus',[
            'id'=>$id,
            'status'=>1
        ]);

        return $response->__toString();
    }

    public function setUsed($id)
    {
        $response=$this->request('setStatus',[
            'id'=>$id,
            'status'=>8
        ]);

        return $response->__toString();
    }

    public function setCancel($id)
    {
        $response=$this->request('setStatus',[
            'id'=>$id,
            'status'=>-1
        ]);

        return $response->__toString();
    }

    public function setComplete($id)
    {
        $response=$this->request('setStatus',[
            'id'=>$id,
            'status'=>6
        ]);

        return $response->__toString();
    }

    public function getList()
    {
        return [
            'vk'=>'Вконтакте',
            'ok'=>'Одноклассники',
            'wa'=>'Whatsapp',
            'vi'=>'Viber',
            'tg'=>'Telegram',
            'wb'=>'WeChat',
            'go'=>'Google,youtube,Gmail',
            'av'=>'avito',
            'fb'=>'facebook',
            'tw'=>'Twitter',
            'ub'=>'Uber',
            'qw'=>'Qiwi',
            'gt'=>'Gett',
            'sn'=>'OLX.ua',
            'ig'=>'Instagram',
            'ss'=>'SeoSprint',
            'ym'=>'Юла',
            'ma'=>'Mail.ru',
            'mm'=>'Microsoft',
            'uk'=>'Airbnb',
            'me'=>'Line messenger',
            'mb'=>'Yahoo',
            'we'=>'Aol',
            'bd'=>'Rambler.ru',
            'kp'=>'Tencent QQ',
            'dt'=>'Такси Максим',
            'ya'=>'Яндекс',
            'mt'=>'Skout',
            'oi'=>'Momo',
            'fd'=>'GetResponse',
            'zz'=>'Zalo',
            'kt'=>'KakaoTalk',
            'ot'=>'Любой другой'
        ];
    }

    public function getStatus($id)
    {
        $response=$this->request('getStatus',[
            'id'=>$id
        ]);

        return $response->__toString();
    }




}