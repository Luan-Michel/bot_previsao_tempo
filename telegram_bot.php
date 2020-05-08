<?php

    include_once 'get_previsao.php';
    
    define('BOT_TOKEN', getenv('TELEGRAM_TOKEN'));
    define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

    function processMessage($message) {
        // processa a mensagem recebida
        $message_id = $message['message_id'];
        $chat_id = $message['chat']['id'];
        if (isset($message['text'])) {
            
            $text = $message['text'];//texto recebido na mensagem

            if (strpos($text, "/start") === 0) {
                //envia a mensagem ao usuário
            sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => 'Olá, '. $message['from']['first_name'].
                '! Eu sou um bot que informa a previsão do tempo', 'reply_markup' => array(
                'keyboard' => array(array('Previsao')),
                'one_time_keyboard' => true)));
            } else if ($text === "Previsao") {
                sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => urlencode(getPrevisao('previsao', $text))));
            }

        } else {
            sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => 'Desculpe, mas só compreendo mensagens em texto'));
        }
    }

    function sendMessage($method, $parameters) {
        $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($parameters),
            'header'=>  "Content-Type: application/json\r\n" .
                        "Accept: application/json\r\n"
            )
        );

        $context  = stream_context_create( $options );
        file_get_contents(API_URL.$method, false, $context );
    }

?>