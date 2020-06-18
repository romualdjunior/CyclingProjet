<?php


namespace ReclamationUserBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MessageController extends Controller

{




public  function  SendSmsAction (Request $request)

{

    $mobile = $request -> get('mobile');
    $message = $request -> get('message');
    $encodedMessage = urlencode($message) ;
    $authKey = "" ;
    $senderId = "" ;
    $route = 4;
    $postData = array (

        'authKey' => $authKey ,
        'sender' => $senderId ,
        'route' => $route ,
        'mobiles' => $mobile ,
        'message' => $encodedMessage) ;


    $url = "" ;
    $ch = curl_init() ;
    curl_setopt_array($ch , array(
        CURLOPT_URL => $url ,
        CURLOPT_RETURNTRANSFER => true ,
        CURLOPT_POST => true ,
        CURLOPT_PORT => $postData
    )) ;


    curl_setopt($ch , CURLOPT_SSL_VERIFYHOST , 0 ) ;
    curl_setopt($ch , CURLOPT_SSL_VERIFYPEER , 0 ) ;
    $response = curl_exec($ch);
    if(curl_errno($ch))
    {
     echo 'erreur'.curl_error($ch);
    }
    curl_close($ch) ;
    return $this ->  render('@ReclamationUser/Sms/success.html.twig' , [ 'response' => $response]);
}

}