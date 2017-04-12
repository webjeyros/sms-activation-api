<?php
namespace SmsActivator;

use GuzzleHttp\ClientInterface;

class SmsActivator
{

    /**
     * @var SmsServiceInterface
     */
    protected $service;

    /**
     * SmsActivator constructor.
     * @param SmsServiceInterface $service
     * @param ClientInterface $client
     * @param $logger
     */
    public function __construct(SmsServiceInterface $service, ClientInterface $client,$logger=null)
    {
        $this->service = $service;
        $this->service->setClient($client);

        if (isset($logger)) $this->service->setLogger($logger);
    }

    /**
     * Get the Service.
     *
     * @return SmsServiceInterface service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param SmsServiceInterface $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    public function getBalance()
    {
        return $this->getService()->getBalance();
    }

    public function getNumber($service)
    {
        return $this->getService()->getNumber($service);
    }

    public function setReady($id)
    {
        return $this->getService()->setReady($id);
    }

    public function setUsed($id)
    {
        return $this->getService()->setUsed($id);
    }

    public function setCancel($id){

        return $this->getService()->setCancel($id);
    }

    public function setComplete($id){

        return $this->getService()->setComplete($id);
    }

    public function getList()
    {
        return $this->getService()->getList();
    }

    public function getStatus($id)
    {
        return $this->getService()->getStatus($id);
    }

}