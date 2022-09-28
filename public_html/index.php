<?php

    require_once '../vendor/autoload.php';

    if (isset($_GET['url'])){
        $url = explode('/', $_GET['url']);
        
        if($url[0] == 'api'){
            $service = 'App\\Services\\'.ucfirst($url[1]).'Service';

            $method = strtolower($_SERVER['REQUEST_METHOD']);
            
            try {
                $response = call_user_func_array(array(new $service, $method), array($url));

                echo  array('status' => 'sucess', 'data' => $response);
            } catch (\Exception $e) {
                
            }
        }
    }
    