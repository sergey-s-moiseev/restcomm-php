Restcomm PHP API
========================

## About
This library provides an abstraction to use some functions of Restcomm Rest API

### Require:

- PHP >= 5.3

### Installation via composer

- Add a project in your composer.json

```json
{
    "require": {
        "sergey-s-moiseev/restcomm-php": "dev-master"
    }
}
```
and run
  
```$ php composer.phar update```


- Or use:
```
$ php composer.phar require sergey-s-moiseev/restcomm-php
```

### Usage

```
    $rs = new RestcommService('YOUR_RESTCOMM_SDK_URL','YOUR_RESTCOMM_SDK_PORT','YOUR_SID','YOUR_TOKEN');
    $response = $rs->sendSMS('PHONE_NUMBER_FROM','PHONE_NUMBER_TO','MESSAGE_TEXT');
    
```


 ## Available functions
 [Account Restcomm Account documentation] (http://documentation.telestax.com/connect/api/account-api.html#account)
    
      Account:   
       ->getInformationAboutTheDefaultAccount() 
       ->updatePasswordUsingAccountSid($new_password)
       ->updatePasswordUsingEmailAddress($email, $new_password)
       
 [Account Restcomm Calls documentation] (http://documentation.telestax.com/connect/api/calls-api.html#calls)
      Calls:
       ->makingACall($from, $to, $url)
       ->terminateInProgressCall($call_id)
       ->terminateRingingCall($call_id)

 [Account Restcomm Clients documentation] (http://documentation.telestax.com/connect/api/clients-api.html#clients)
      Clients:
       ->createAClient($login, $password)
       ->deleteAClient($sid)
       ->changeClientsPassword($sid, $password)
       ->getListOfAvailableClients()

 [Account Restcomm SMS documentation] (http://documentation.telestax.com/connect/api/sms-api.html#sms)
      SMS:
       ->sendSMS($from, $to, $text)
       ->getListOfSMSMessages()

To the ```$response``` variable service returns a response in the format of an associative array or HTTP error message
