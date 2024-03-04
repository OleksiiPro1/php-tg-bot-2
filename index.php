<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';
require_once 'functions.php';


// var_dump(BASE_URL);

// $res = json_decode(file_get_contents(BASE_URL . 'getMe'), true);
// $res = send_request('getMe');
// debug($res->result->id);

if (isset($_GET['bot_message'])) {
    $keyboard = json_encode([
        "inline_keyboard" => [
            [
                [
                    "text" => 'My site',
                     "url" => 'https://demo.wp.kiev.ua'
                ]
            ]
        ]
    ]);
    // $res = send_request('sendMessage', [
    //     'chat_id'=>405146542, 
    //     'text'=>'<b>' . $_GET['bot_message'] . '</b>', 
    //     'parse_mode'=>'HTML', 
    //     'reply_markup'=>$keyboard
    // ]);
    $res = send_request('sendPhoto', [
        'chat_id'=>405146542, 
        'caption'=>'<b>' . $_GET['bot_message'] . '</b>', 
        'photo'=> 'https://images.pexels.com/photos/1540977/pexels-photo-1540977.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
        'parse_mode'=>'HTML', 
        'reply_markup'=>$keyboard
    ]);
    print_r($res);
}

// $send_webhook = send_request('deleteWebhook', [
    // "url" => 'test.wp.kiev.ua/tg-bot-udemy/index.php'    
// ]);

print_r($send_webhook);

save_input();

$decode = decode_input();

// send_request("sendMessage", [
//     'chat_id'=>$decode->message->chat->id,
//     'text'=>$decode->message->text
// ]);


send_request("copyMessage", [
        'chat_id'=>$decode->message->chat->id,
        'from_chat_id'=>$decode->message->chat->id,
        'message_id'=>$decode->message->message_id
    ]);

    send_request("sendPhoto", [
        'chat_id'=>$decode->message->chat->id,
        'photo'=>'https://images.unsplash.com/photo-1508921912186-1d1a45ebb3c1?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGhvdG98ZW58MHx8MHx8fDA%3D',
        'caption'=>'nice photo'        
    ]);

    send_request("setChatTitle", [
        'chat_id'=>$decode->message->chat->id,
        'title'=>'super people'
    ]);