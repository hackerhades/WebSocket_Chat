<?php
include 'websocket.class.php';

$config=array(
    'address'=>'192.168.199.208',
    'port'=>'8123',
    'event'=>'WSevent',//回调函数的函数名
    'log'=>true,
);
$websocket = new websocket($config);
$websocket->run();

function WSevent($type,$event){
    global $websocket;
    if('in'==$type){
        $websocket->log('客户进入id:'.$event['k']);
    }elseif('out'==$type){
        $websocket->log('客户退出id:'.$event['k']);

    }elseif('msg'==$type){
        $websocket->log($event['k'].'消息:'.$event['msg']);
        $websocket->writeall( $event['k'] . "  " . date('H:i') . "</br>" . $event['msg']);
    }
}

?>