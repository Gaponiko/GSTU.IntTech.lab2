<?php
    error_reporting(E_ALL ^ E_NOTICE);
    
    require "classes/Chat.class.php";
    
    $chat = new Chat();
    
    // Собираем входящие данные в массив
    // По правильному их нужно валидировать, но нам сейчас это ни к чему, мы же для себя всё делаем
    $array = [
        'name' => $_POST['name'],
        'message' => $_POST['message']
    ];
    
    try {
        echo $chat->send($array);
    } catch (Exception $e) {}