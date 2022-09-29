<?php

    require_once '../vendor/autoload.php';

    if (isset($_GET['url'])){
        $url = explode('/', $_GET['url']);
        
        if($url[0] == 'api'){
            $service = 'App\\Services\\'.ucfirst($url[1]).'Service';

            $method = strtolower($_SERVER['REQUEST_METHOD']);
            
            try {
                $response = call_user_func(array(new $service, $method), $url[2]);

                echo  json_encode(array('status' => 'sucess', 'data' => $response),JSON_UNESCAPED_UNICODE);
                exit;
            } catch (\Exception $e) {
                echo  json_encode(array('status' => 'error', 'data' => $e->getMessage()),JSON_UNESCAPED_UNICODE);
                exit;
            }
        }
    }
    