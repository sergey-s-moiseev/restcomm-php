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

    /**
     * @return mixed
     */
    public function sendSMS($from, $to, $text)
    {
        $command = '/SMS/Messages';
        $options = [
            'From' => $from,
            'To' => $to,
            'Body' => $text,
        ];
        $contents = $this->sdkService->SDKPostCommand($command, $options);

        return $contents;
    }
    /**
     * @return mixed
     */
    public function Calls($from, $to, $url)
    {
        $command = '/Calls.json';
        $options = [
            'From' => $from,
            'To' => $to,
            'Url' => $url,
        ];
        $contents = $this->sdkService->SDKPostCommand($command, $options);

        return $contents;
    }

    /**
     * @param null $sid
     * @return mixed
     */
    public function Accounts($sid = null)
    {
        if ($sid = null) $sid = $this->sid;
        $command = '';
        $options = [
        ];
        $contents = $this->sdkService->SDKPostCommand($command, $options);

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


    /**
     * @return array
     */
    public function CallClient($from, $to, $url)
    {
        $options = [
            'From' => $from,
            'To' => $to,
            'Url' => $url,
        ];

        $xmlResponse = $this->sdkService->SDKPostCommand($options);
        $response = $xmlResponse;
        return [$response];
        return [];
    }
/**
     * @return array
     */
    public function xz()
    {
        return [];
    }

    private function commander()
    {


    }


}
