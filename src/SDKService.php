<?php

namespace SergeySMoiseev\Restcomm;


use GuzzleHttp\Client;
use GuzzleHttp\post;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Stream;

class SDKService
{
    protected $host;
    protected $port;
    protected $sid;
    protected $token;

    public function __construct($host, $port, $sid, $token)
    {
        $this->host = $host;
        $this->port = $port;
        $this->sid = $sid;
        $this->token = $token;
    }

    public function SDKPostCommand ($command, $form_params)
    {
        $client = new Client();
        $url = 'http://' . $this->sid . ':' . $this->token . '@' . $this->host . ':' . $this->port . '/restcomm/2012-04-24/Accounts/' . $this->sid . $command;
//      var_dump($url, $form_params);exit;

        $response = $client->request('POST', $url, [
            'form_params'=> $form_params
        ]);
        $xml =(string) $response->getBody();
        return $xml;
    }

    public function SDKGetCommand ($command, $form_params)
    {
        $client = new Client();
        $url = 'http://' . $this->sid . ':' . $this->token . '@' . $this->host . ':' . $this->port . '/restcomm/2012-04-24/Accounts/' . $this->sid . $command;
        $response = $client->request('GET', $url, [
            'form_params'=> $form_params
        ]);
        $xml =(string) $response->getBody();
        return $xml;
    }
}