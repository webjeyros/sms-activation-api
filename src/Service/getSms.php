<?php
// @link https://getsms.online/ru/api.html

namespace SmsActivator\Service;


use SmsActivator\SmsServiceInterface;

class getSms extends smsActivate implements SmsServiceInterface
{
    protected $endPoint='http://api.getsms.online/stubs/handler_api.php';
}