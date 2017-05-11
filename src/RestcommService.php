<?php

namespace SergeySMoiseev\Restcomm;
class RestcommService
{
    protected $sdkService;
    protected $host;
    protected $port;
    protected $sid;
    protected $token;
    public function __construct($host, $port, $sid, $token)
    {
        $this->sdkService = new SDKService($host, $port, $sid, $token);
        $this->host = $host;
        $this->port = $port;
        $this->sid = $sid;
        $this->token = $token;
    }

    /**Account**/

    public function getInformationAboutTheDefaultAccount(){
        $contents = $this->sdkService->SDKCommand('POST');
        return $contents;
    }

    public function updatePasswordUsingAccountSid($new_password){
        $command = '';
        $options = ["Password" => $new_password];
        $contents = $this->sdkService->SDKCommand('PUT', $command, $options);
        return $contents;
    }

    public function updatePasswordUsingEmailAddress($email, $new_password){
        $command = '';
        $options = ["Password" => $new_password];
        $contents = $this->sdkService->SDKCommand('PUT', $command, $options, $email);
        return $contents;
    }


    /**Calls**/

    public function makingACall($from, $to, $url)
    {
        $command = '/Calls.json';
        $options = [
            'From' => $from,
            'To' => $to,
            'Url' => $url,
        ];
        $contents = $this->sdkService->SDKCommand('POST', $command, $options);
        return $contents;
    }

     public function terminateInProgressCall($call_id)
        {
            $command = '/Calls.json/'.$call_id;
            $options = [
                'Status' => 'completed'
            ];
            $contents = $this->sdkService->SDKCommand('POST', $command, $options);
            return $contents;
        }

     public function terminateRingingCall($call_id)
        {
            $command = '/Calls.json/'.$call_id;
            $options = [
                'Status' => 'canceled'
            ];
            $contents = $this->sdkService->SDKCommand('POST', $command, $options);
            return $contents;
        }


    /**Clients**/

    /**
     * @param $login
     * @param $password
     * @return mixed
     * @internal param array $options
     */
    public function createAClient($login, $password)
    {
        $options = [
            'Login' => $login,
            'Password' => $password
        ];
        $command = '/Clients.json';
        $contents = $this->sdkService->SDKCommand('POST', $command, $options);
        return $contents;
    }

    public function deleteAClient($sid)
    {   $command = '/Clients/'.$sid;
        $options = [
        ];
        $contents = $this->sdkService->SDKCommand('DELETE', $command, $options);
        return $contents;
    }

    public function changeClientsPassword($sid, $password)
    {   $command = '/Clients/'.$sid;
        $options = [
            'Password' => $password
        ];
        $contents = $this->sdkService->SDKCommand('PUT', $command, $options);
        return $contents;
    }

    public function getListOfAvailableClients()
    {   $command = '/Clients';
        $options = [
        ];
        $contents = $this->sdkService->SDKCommand('GET', $command);
        return $contents;
    }


    /**Incoming Phone Numbers**/



    /**SMS**/


    public function sendSMS($from, $to, $text)
    {
        $command = '/SMS/Messages';
        $options = [
            'From' => $from,
            'To' => $to,
            'Body' => $text,
        ];
        $contents = $this->sdkService->SDKCommand('POST', $command, $options);
        return $contents;
    }


    public function getListOfSMSMessages()
    {
        $command = '/SMS/Messages';
        $options = [
        ];
        $contents = $this->sdkService->SDKCommand('GET', $command, $options);

        return $contents;
    }



//•	List of contacts
//•	Free app to app messages, including self-destructing messages, delete/edit message
//•	App to SMS message - connect to relevant SMS provider(s)
//•	Free app to app calls (VoIP)
//•	User profile, including status
//•	Non-VoIP calling – connect to providers such as Voxbeam using least cost routing, for international calls to mobiles/landlines
//•	Calling/SMS Credit
//•	Add menus to the website for the following:
//•	Purchase credit
//•	Send SMS
//•	Send free message (to other app users)
//•	View contacts (show other app users at the top of the list with an icon)




}
