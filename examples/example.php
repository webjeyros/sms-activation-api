<?php
use SmsActivator\Service\smsReg;
use SmsActivator\SmsActivator;

require_once __DIR__.'/../vendor/autoload.php';
$client= new GuzzleHttp\Client();
$smsActivator=new SmsActivator(new smsReg('_api_key_here_'),$client);
print_r($smsActivator->getBalance()) ;