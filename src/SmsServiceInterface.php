<?php


namespace SmsActivator;


use GuzzleHttp\ClientInterface;

interface SmsServiceInterface
{
    public function setClient(ClientInterface $client);
    public function setLogger($logger);
    public function getBalance();
    public function getNumber($service);
    public function setReady($id);
    public function setUsed($id);
    public function setCancel($id);
    public function setComplete($id);
    public function getList();
    public function getStatus($id);
}