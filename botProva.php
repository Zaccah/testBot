<?php
    $content = file_get_contents("php://input");
    $update = json_decode($content, true);
    define('token', "");
    define('api', 'https://api.telegram.org/bot' . token . '/');
    if(!isset($update["callback_query"])){
        if($update["message"]["text"]==="/start"){
            $chatId = $update["chat"]["id"];
            $text = "Hi! Available options:\n";
            $keyboard = [
                ["text"=>"Primo anno","callback_data"=>"primo"],
                ["text"=>"Secondo anno","callback_data"=>"secondo"],
                ["text"=>"Terzo anno","callback_data"=>"terzo"]
            ];
            $request = "sendMessage?chat_id=$chatId&&text=$text&&reply_markup=$keyboard";
            $url = api.$request;
            $session = curl_init();
            curl_setopt($CurlSession,CURLOPT_URL,$url);
            curl_exec($session);
            curl_close($session);
            //Ciaoooooooasnknsaiocacnsckncksla
        }
    }
    else{
        switch($update["callback_query"]["data"]){
            case "primo":
                $chatId = $update["chat"]["id"];
                $text = "Available groups:\n";
                //fetch from db
                $keyboard = [
                    ["text"=>"Gruppo 1.1","url"=>"https://t.me/link1"],
                    ["text"=>"Gruppo 1.2","url"=>"https://t.me/link2"]
                ];
                $request = "sendMessage?chat_id=$chatId&&text=$text&&reply_markup=$keyboard";
                $session = curl_init();
                $url = api.$request;
                curl_setopt($CurlSession,CURLOPT_URL,$url);
                curl_exec($session);
                curl_close($session);
            break;
            case "secondo":
                //sdasdasdasdsadaasd prova di PULLLL
                //aa
            break;
            case "terzo":
                //edfhewhfeiwuhfewùàòàùòùòà
            break;
            //ciaooooo
            //ciaoo
        }
    }
?>
