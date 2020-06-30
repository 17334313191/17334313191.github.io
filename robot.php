<?php
$text = $_GET['text'];
$data = "{
    'reqType':0,
    'perception': {
        'inputText': {
            'text': '$text'
             },      
        },
    'userInfo': {
        'apiKey': '41bd65706d69420ab9a4409e4c5e9a1a',
        'userId': 'fb143ba11d25e07a'
    }
}";
$url = "http://openapi.tuling123.com/openapi/api/v2";

$res = http_request($url, $data);
$json = json_decode($res);
$res1 = $json->results;
$res2 = $res1[0]->values->text;
echo $res2;

//HTTP请求（支持HTTP/HTTPS，支持GET/POST）
function http_request($url, $data = null)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)) {
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}
