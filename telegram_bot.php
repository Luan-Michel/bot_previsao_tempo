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
                    'keyboard' => array(array('Previsão')),
                    'one_time_keyboard' => true)));
            } else if ($text === "Previsão") {
                sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => 'Escolha de qual cidade você deseja receber a previsão.', 
                    'reply_markup' => array(
                    'keyboard' => array(array('Ponta Grossa', 'Castro', 'Carambeí', 'Jaguariaíva'), 
                                        array('Tibagi', 'Telêmaco Borba', 'Reserva', 'Irati'),
                                        array('Ipiranga', 'Prudentópolis', 'Ivaí', 'Todas')),
                    'one_time_keyboard' => true)));

            } else if ($text === "Ponta Grossa") {
                sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getCity('6401'),
                            'reply_markup' => array(
                            'keyboard' => array(array('Ponta Grossa', 'Castro', 'Carambeí', 'Jaguariaíva'), 
                                                array('Tibagi', 'Telêmaco Borba', 'Reserva', 'Irati'),
                                                array('Ipiranga', 'Prudentópolis', 'Ivaí', 'Todas')),
                            'one_time_keyboard' => true)));
            } else if ($text === "Castro") {
                sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getCity('3357'),
                            'reply_markup' => array(
                            'keyboard' => array(array('Ponta Grossa', 'Castro', 'Carambeí', 'Jaguariaíva'), 
                                                array('Tibagi', 'Telêmaco Borba', 'Reserva', 'Irati'),
                                                array('Ipiranga', 'Prudentópolis', 'Ivaí', 'Todas')),
                            'one_time_keyboard' => true)));
            } else if ($text === "Carambeí") {
                sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getCity('6711'),
                            'reply_markup' => array(
                            'keyboard' => array(array('Ponta Grossa', 'Castro', 'Carambeí', 'Jaguariaíva'), 
                                                array('Tibagi', 'Telêmaco Borba', 'Reserva', 'Irati'),
                                                array('Ipiranga', 'Prudentópolis', 'Ivaí', 'Todas')),
                            'one_time_keyboard' => true)));
            } else if ($text === "Jaguariaíva") {
                sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getCity('6589'),
                            'reply_markup' => array(
                            'keyboard' => array(array('Ponta Grossa', 'Castro', 'Carambeí', 'Jaguariaíva'), 
                                                array('Tibagi', 'Telêmaco Borba', 'Reserva', 'Irati'),
                                                array('Ipiranga', 'Prudentópolis', 'Ivaí', 'Todas')),
                            'one_time_keyboard' => true)));
            } else if ($text === "Tibagi") {
                sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getCity('6249'),
                            'reply_markup' => array(
                            'keyboard' => array(array('Ponta Grossa', 'Castro', 'Carambeí', 'Jaguariaíva'), 
                                                array('Tibagi', 'Telêmaco Borba', 'Reserva', 'Irati'),
                                                array('Ipiranga', 'Prudentópolis', 'Ivaí', 'Todas')),
                            'one_time_keyboard' => true)));
            } else if ($text === "Telêmaco Borba") {
                sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getCity('6224'),
                            'reply_markup' => array(
                            'keyboard' => array(array('Ponta Grossa', 'Castro', 'Carambeí', 'Jaguariaíva'), 
                                                array('Tibagi', 'Telêmaco Borba', 'Reserva', 'Irati'),
                                                array('Ipiranga', 'Prudentópolis', 'Ivaí', 'Todas')),
                            'one_time_keyboard' => true)));
            } else if ($text === "Reserva") {
                sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getCity('6472'),
                            'reply_markup' => array(
                            'keyboard' => array(array('Ponta Grossa', 'Castro', 'Carambeí', 'Jaguariaíva'), 
                                                array('Tibagi', 'Telêmaco Borba', 'Reserva', 'Irati'),
                                                array('Ipiranga', 'Prudentópolis', 'Ivaí', 'Todas')),
                            'one_time_keyboard' => true)));
            } else if ($text === "Irati") {
                sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getCity('6994'),
                            'reply_markup' => array(
                            'keyboard' => array(array('Ponta Grossa', 'Castro', 'Carambeí', 'Jaguariaíva'), 
                                                array('Tibagi', 'Telêmaco Borba', 'Reserva', 'Irati'),
                                                array('Ipiranga', 'Prudentópolis', 'Ivaí', 'Todas')),
                            'one_time_keyboard' => true)));
            } else if ($text === "Ipiranga") {
                sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getCity('6573'),
                            'reply_markup' => array(
                            'keyboard' => array(array('Ponta Grossa', 'Castro', 'Carambeí', 'Jaguariaíva'), 
                                                array('Tibagi', 'Telêmaco Borba', 'Reserva', 'Irati'),
                                                array('Ipiranga', 'Prudentópolis', 'Ivaí', 'Todas')),
                            'one_time_keyboard' => true)));
            } else if ($text === "Prudentópolis") {
                sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getCity('5615'),
                            'reply_markup' => array(
                            'keyboard' => array(array('Ponta Grossa', 'Castro', 'Carambeí', 'Jaguariaíva'), 
                                                array('Tibagi', 'Telêmaco Borba', 'Reserva', 'Irati'),
                                                array('Ipiranga', 'Prudentópolis', 'Ivaí', 'Todas')),
                            'one_time_keyboard' => true)));
            } else if ($text === "Ivaí") {
                sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getCity('6584'),
                            'reply_markup' => array(
                            'keyboard' => array(array('Ponta Grossa', 'Castro', 'Carambeí', 'Jaguariaíva'), 
                                                array('Tibagi', 'Telêmaco Borba', 'Reserva', 'Irati'),
                                                array('Ipiranga', 'Prudentópolis', 'Ivaí', 'Todas')),
                            'one_time_keyboard' => true)));
            } else {
                sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => 'Desculpe, não entendi o que disse (a opção Todas não está funcionando).'));
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