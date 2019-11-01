<?php

function getLocationSevice($appId, $appSecret)
{
    $timestamp = time();
    $noncestr = getRandStr(15);
    $url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=' . get_token($appId, $appSecret) . '&type=jsapi';
    $ret_json = https_request($url);
    $ret = json_decode($ret_json);
    $ticket = isset($ret->ticket)?$ret->ticket:'';
    $strvalue = 'jsapi_ticket=' . $ticket . '&noncestr=' . $noncestr . '&timestamp=' . $timestamp . '&url=http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $signature = sha1($strvalue);


    $data = [
        'appId' => $appId,
        'timestamp' => $timestamp,
        'nonceStr' => $noncestr,
        'signature' => $signature,
    ];

    return $data;
}

function getRandStr($length)
{
    $str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randString = '';
    $len = strlen($str) - 1;
    for ($i = 0; $i < $length; $i++) {
        $num = mt_rand(0, $len);
        $randString .= $str[$num];
    }
    return $randString;
}

//请求接口
function https_request($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($curl);
    if (curl_errno($curl)) {
        return 'ERROR ' . curl_error($curl);
    }
    curl_close($curl);
    return $data;
}

//获取token
function get_token($appid, $appsecret)
{
    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
    $ret_json = https_request($url);
    $ret = json_decode($ret_json,TRUE);

    if (isset($ret['access_token'])) {
        return $ret['access_token'];
    }
}