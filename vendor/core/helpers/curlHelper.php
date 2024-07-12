<?php

function run_curl_post($url, array $data = []){
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_FAILONERROR, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($curl);
    curl_close($curl);

    return $result;

}

function run_curl_get($url_with_get_data){
    $curl = curl_init($url_with_get_data);
    curl_setopt($curl, CURLOPT_FAILONERROR, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($curl);
    curl_close($curl);

    return $result;
}

function my_curl($data){
    $cURLConnection = curl_init();

    curl_setopt($cURLConnection, CURLOPT_URL, 'http://localhost/tests/trans.php?data='.$data);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $res = curl_exec($cURLConnection);
    curl_close($cURLConnection);

    return $res;
}

function curl_example(){
    for($i = 0; $i < 10; $i++) {

        $data  = "data_".$i;

        $res = my_curl($data);

        echo $res.str_repeat("<br/>", 4);

    }

    echo "<br/>"."I Execute After The Curl Called";
}