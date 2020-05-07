<?php
    //WEBHOOK PARA RECEBIMENTO DE MENSAGENS DO TELEGRAM

    include_once 'telegram_bot.php';

    $update_response = file_get_contents("php://input");

    $update = json_decode($update_response, true);

    if (isset($update["message"])) {
        processMessage($update["message"]);
    }
?>