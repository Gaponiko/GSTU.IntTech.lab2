<?php
    class Chat
    {
        private $path;
        
        function __construct()
        {
            $this->path = __DIR__ . '/../../cache/';
            if (!is_dir($this->path)) mkdir($this->path, 0755);
        }
    
        /**
         * Функция отправки сообщения
         *
         * @param string|array $message - сообщение
         *
         * @return false|string
         * @throws Exception
         */
        public function send($message)
        {
            $messages = [];
            
            if (file_exists($this->path . 'chat.txt'))
            {
                $messages = json_decode(file_get_contents($this->path . 'chat.txt'), true);
            }
            
            $message['id'] = count($messages);
            $messages[] = $message;
            
            file_put_contents($this->path . 'chat.txt', json_encode($messages, JSON_UNESCAPED_UNICODE), LOCK_EX);
            
            return json_encode($message, JSON_UNESCAPED_UNICODE);
        }
    
        /**
         * Функция получения сообщений
         *
         * @return string
         */
        public function get()
        {
            if (file_exists($this->path . 'chat.txt'))
            {
                return file_get_contents($this->path . 'chat.txt');
            }
            
            return json_encode([]);
        }
    }
?>