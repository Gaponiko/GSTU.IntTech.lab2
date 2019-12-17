<?php
    error_reporting(E_ALL ^ E_NOTICE);
    
    require "classes/Chat.class.php";
    $chat = new Chat();
    
    try {
        echo $chat->get();
    } catch (Exception $e) {}
    