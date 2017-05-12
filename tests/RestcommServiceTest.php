<?php
namespace SergeySMoiseev\Restcomm\Tests;

use PHPUnit\Framework\TestCase;
use SergeySMoiseev\Restcomm\RestcommService;

class RestcommServiceTest extends TestCase
{
    public function testGetInformationAboutTheDefaultAccount()
    {
        $restcomm = new RestcommService('restcomm.sdk','8080','ACae6e420f425248d6a26948c17a9e2acf','508759bea0d816bf0bc7f01e16a4afa1');
        $response = $restcomm->getInformationAboutTheDefaultAccount(null);
//        fwrite(STDERR, print_r($response, TRUE));
        $this->assertEquals($response['Sid'] , 'ACae6e420f425248d6a26948c17a9e2acf');
        $this->assertEquals($response['AuthToken'] , '508759bea0d816bf0bc7f01e16a4afa1');
    }

    public function testSendSMS()
    {
        $restcomm = new RestcommService('restcomm.sdk','8080','ACae6e420f425248d6a26948c17a9e2acf','508759bea0d816bf0bc7f01e16a4afa1');
        $response = $restcomm->sendSMS('+7123456789','+7987654321','smth text');
//        fwrite(STDERR, print_r($response, TRUE));
        $this->assertEquals($response['AccountSid'] , 'ACae6e420f425248d6a26948c17a9e2acf');
    }

    public function testMakingACall()
    {
        $restcomm = new RestcommService('restcomm.sdk','8080','ACae6e420f425248d6a26948c17a9e2acf','508759bea0d816bf0bc7f01e16a4afa1');
        $response = $restcomm->makingACall('+7123456789','sip:alice@127.0.0.1:5060','http://restcomm.sdk:8080/restcomm/demos/hello-play.xml');
//        fwrite(STDERR, print_r($response, TRUE));
        $this->assertEquals($response['account_sid'] , 'ACae6e420f425248d6a26948c17a9e2acf');
    }

    public function testGetListOfSMSMessages()
    {
        $restcomm = new RestcommService('restcomm.sdk','8080','ACae6e420f425248d6a26948c17a9e2acf','508759bea0d816bf0bc7f01e16a4afa1');
        $response = $restcomm->getListOfSMSMessages();
//        fwrite(STDERR, print_r($response, TRUE));
        $this->assertEquals(isset ($response['SMSMessage']) , TRUE);
    }

}