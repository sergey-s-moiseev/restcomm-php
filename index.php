<?php
    require_once __DIR__ . '/vendor/autoload.php';

    use SergeySMoiseev\Restcomm\RestcommService;

    $restcomm = new RestcommService('172.17.0.2','8080','ACae6e420f425248d6a26948c17a9e2acf','7946e795e44db67be4c74219def41e2e');
//    $response = $restcomm->sendSMS('+7123456789','+7987654321','smth text');
//    $response = $restcomm->Accounts();
    $response = $restcomm->Calls('+7123456789','sip:alice@127.0.0.1:5060','http://172.17.0.2:8080/restcomm/demos/hello-play.xml');

    $a=[];
    var_dump($response);


    exit;