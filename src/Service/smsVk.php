<?php
// @link http://smsvk.net/api.html

namespace SmsActivator\Service;


use SmsActivator\SmsServiceInterface;

class smsVk extends smsActivate implements SmsServiceInterface
{
    protected $endPoint='http://smsvk.net/stubs/handler_api.php';
}