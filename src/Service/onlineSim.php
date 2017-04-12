<?php

// @link http://onlinesim.ru/docs/api/ru

namespace SmsActivator\Service;


use SmsActivator\SmsServiceInterface;

class onlineSim extends smsReg implements SmsServiceInterface
{
    protected $endPoint='http://onlinesim.ru/api';
}