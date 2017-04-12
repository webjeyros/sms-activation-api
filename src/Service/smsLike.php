<?php

// @link https://smslike.ru/?action=cp&page=api

namespace SmsActivator\Service;


use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use SmsActivator\SmsServiceInterface;

class smsLike implements SmsServiceInterface
{
    protected $endPoint='http://sms-activate.ru/stubs/handler_api.php';

    protected $apiKey;

    /**
     * @var ClientInterface
     */
    protected  $client;

    protected $logger;

    /**
     * smsLike constructor.
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }


    protected function request($action,$params=[])
    {
        $params['apikey']=$this->apiKey;
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
        $response=$this->request('getbalance');

        return $response->__toString();
    }

    public function getNumber($service)
    {
        $response=$this->request('regnum',[
            'lc'=>1,
            's'=>$service
        ]);

        return $response->__toString();
    }

    public function setReady($id)
    {
        $response=$this->request('setready',[
            'tz'=>$id
        ]);

        return $response->__toString();
    }

    public function setUsed($id)
    {
        $response=$this->request('setused',[
            'tz'=>$id
        ]);

        return $response->__toString();
    }

    public function setCancel($id)
    {
      throw new \Exception('Not implement');
    }

    public function setComplete($id)
    {
        throw new \Exception('Not implement');
    }

    public function getList()
    {
        return [
            '2'=>'GMail',
            '3'=>'Facebook',
            '5'=>'Вконтакте ',
            '6'=>'Одноклассники',
            '10'=>'Yandex',
            '11'=>'Webmoney',
            '13'=>'QIWI',
            '22'=>'Twitter',
            '23'=>'Telegram',
            '25'=>'Avito',
            '26'=>'Avito+переадресация',
            '28'=>'Viber',
            '29'=>'Whatsapp',
            '30'=>'Instagram',
            '34'=>'TALK2',
            '35'=>'SmartCall',
            '36'=>'PayQR',
            '37'=>'Yahoo',
            '38'=>'WeChat',
            '39'=>'Gem4Me',
            '40'=>'AOL',
            '41'=>'Carousel',
            '42'=>'Line',
            '43'=>'Rambler',
            '44'=>'Uber',
            '45'=>'KFC',
            '0'=>'Другое'
        ];
    }

    public function getStatus($id)
    {
        $response=$this->request('getstate',[
            'tz'=>$id
        ]);

        return $response->__toString();
    }

}