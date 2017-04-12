# sms-activation-api
PHP Library for working with SMS activation services

## Supported sevices
* [sms-reg.com](http://sms-reg.com) ([API Documentation](http://sms-reg.com/docs/API.html))
* [getsms.online](https://getsms.online) ([API Documentation](https://getsms.online/ru/api.html))
* [onlinesim.ru](http://onlinesim.ru) ([API Documentation](http://onlinesim.ru/docs/api/ru))
* [sms-activate.ru](http://sms-activate.ru) ([API Documentation](http://sms-activate.ru/index.php?act=api))
* [sms-area.org](http://sms-area.org) ([API Documentation](http://sms-area.org/api.txt))
* [smslike.ru](https://smslike.ru) ([API Documentation](https://smslike.ru/?action=cp&page=api))
* [smsvk.net](http://smsvk.net) ([API Documentation](http://smsvk.net/api.html))

## Instalation
   ```
   composer require webjeyros/sms-activation-api
   ```
## Example usage:

```php
use SmsActivator\Service\smsReg;
use SmsActivator\SmsActivator;

require_once __DIR__.'/../vendor/autoload.php';
$client= new GuzzleHttp\Client();
$smsActivator=new SmsActivator(new smsReg('_api_key_here_'),$client);
print_r($smsActivator->getBalance()) ;
```
