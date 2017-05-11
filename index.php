<?php
    require_once __DIR__ . '/vendor/autoload.php';

    use SergeySMoiseev\Restcomm\RestcommService;

    $restcomm = new RestcommService('restcomm.sdk','8080','ACae6e420f425248d6a26948c17a9e2acf','508759bea0d816bf0bc7f01e16a4afa1');
    $response = $restcomm->sendSMS('+7123456789','+7987654321','smth text');
//    $response = $restcomm->getInformationAboutTheDefaultAccount();
//    $response = $restcomm->makingACall('+7123456789','sip:alice@127.0.0.1:5060','http://restcomm.sdk:8080/restcomm/demos/hello-play.xml');
//    $response = $restcomm->getListOfSMSMessages();
//    $response = $restcomm->updatePasswordUsingAccountSid('RestComm123');
//    $response = $restcomm->updatePasswordUsingEmailAddress('administrator@company.com','RestComm123');
//$response = $restcomm->terminateInProgressCall('CA2bca7ba0e99b4a34b23f6b5963d91a9d');


    var_dump($response);


    exit;