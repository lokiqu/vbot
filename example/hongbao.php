<?php
/**
 * Created by PhpStorm.
 * User: HanSon
 * Date: 2016/12/7
 * Time: 16:33
 */

require_once __DIR__ . './../vendor/autoload.php';

use Hanson\Vbot\Foundation\Vbot;
use Hanson\Vbot\Message\Message;
use Hanson\Vbot\Support\Console;

$robot = new Vbot([
    'tmp' => __DIR__ . '/./../tmp/',
]);

$robot->server->setMessageHandler(function($message){
    /** @var $message Message */
    if($message->type === 'RedPacket'){
        if($message->fromType == 'Group'){
            $nickname = group()->get($message->username)['NickName'];
        }else{
            $nickname = contact()->get($message->username)['NickName'];
        }
        Console::log("收到来自 {$nickname} 的红包");
    }

});

$robot->server->run();
