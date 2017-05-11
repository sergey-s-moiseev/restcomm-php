<?php

namespace SergeySMoiseev\Restcomm;


use GuzzleHttp\Client;
use GuzzleHttp\post;
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

    public function SDKCommand ($method = 'POST', $command = '', $form_params = '', $id = '')
    {
        $result = '';
        if (empty($id)) $id = $this->sid;
        $client = new Client();
        $url = 'http://' . $this->sid . ':' . $this->token . '@' . $this->host . ':' . $this->port . '/restcomm/2012-04-24/Accounts/' . $id . $command;
        try{
            $response = $client->request($method, $url, [
                'form_params'=> $form_params
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        $content =  $response->getBody();
        $type = $response->getHeaders()['Content-Type'];
       if ($type[0] == 'application/xml'){
            $xml = simplexml_load_string($content);
            foreach ($xml as $element) {
                foreach($element as $key => $val) {
                    $result["{$key}"] = "{$val}";
                }
            }
       } elseif($type[0] == 'application/json'){
           $json = json_decode($content);
           $result = (get_object_vars ($json));
       }
       else  {$result = $content;}
       return $result;
    }

    public function SDKServerCommand ($method = 'POST', $command = '', $form_params = '', $id = ''){
        $result = '';
        if (empty($id)) $id = $this->sid;
        $client = new Client();
        $url = 'http://'.$this->host . ':' . $this->port . '/restcomm/201204-24/Accounts/' . $id . $command;
        try{
            $response = $client->request($method, $url, [
                'form_params'=> $form_params
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        $content =  $response->getBody();
        $type = $response->getHeaders()['Content-Type'];
        if ($type[0] == 'application/xml'){
            $xml = simplexml_load_string($content);
            foreach ($xml as $element) {
                foreach($element as $key => $val) {
                    $result["{$key}"] = "{$val}";
                }
            }
        } elseif($type[0] == 'application/json'){
            $json = json_decode($content);
            $result = (get_object_vars ($json));
        }
        else  {$result = $content;}
        return $result;
    }
}