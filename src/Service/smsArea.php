<?php
// @link http://sms-area.org/api.txt

namespace SmsActivator\Service;


use SmsActivator\SmsServiceInterface;

class smsArea extends smsActivate implements SmsServiceInterface
{
    protected $endPoint='http://sms-area.org/stubs/handler_api.php';
}