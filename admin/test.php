<?php
set_time_limit ( 1);
$enabled = true;
$serverAddr = "tcp://149.28.238.231:15559";
$socket = new ZMQSocket(new ZMQContext(), ZMQ::SOCKET_SUB);
$socket->connect($serverAddr );
$socket->setSockOpt(ZMQ::SOCKOPT_SUBSCRIBE, "");
print_r($socket->recv());
/*
// Zmq blocking mode for received the message
while ($enabled) {
    $messageReceived = trim($socket->recv());
    $messageData = explode(" ", $messageReceived);
    
    if (count($messageData) != 2)
        continue;
    $orderData = explode("|", $messageData[1]);
    if (count($orderData) != 9)
        continue;
    print_r([
        "Login"  => $messageData[0],
        "Action" => $orderData[0],
        "Symbol" => $orderData[1]
    ]);
}
*/
$socket->disconnect($serverAddr );