<?php

//  For Supporting Api Request ...
//  It is Support Get And Post Request
//  In The Remote Url

function support_api( array $allowed_domain ){
    $http_origin = $_SERVER['HTTP_ORIGIN'];
    if (in_array($http_origin, $allowed_domain))
    {
       echo header('Access-Control-Allow-Origin: *');
       //echo header("Access-Control-Allow-Headers: Authorization");
    }

   echo header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
   echo  header('Access-Control-Max-Age: 1728000');

    if(array_key_exists('HTTP_ACCESS_CONTROL_REQUEST_HEADERS', $_SERVER)) {
       echo header('Access-Control-Allow-Headers: '
               . $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']);
    } else {
       echo header('Access-Control-Allow-Headers: *');
    }

    if("OPTIONS" == $_SERVER['REQUEST_METHOD']) {
        echo "You do not have Permission <br/>";
        exit(0);
    }
}

# For Using it Call it In the Top Of the File..

# This is the List of Allowed Domain

/*$allowed_domain = array(
    'https://www.filemail.com',
    'https://clipping-path-express.filemail.com',
    'http://localhost',
);

support_api( $allowed_domain );*/
