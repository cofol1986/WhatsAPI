<?php
set_time_limit(10);
require_once 'whatsprot.class.php';
require_once 'contacts.php';

function mySendMessage($username, $identity, $password, $nickname, $target, $message, $debug)
{
    //Create the whatsapp object and setup a connection.
    $w = new WhatsProt($username, $identity, $nickname, $debug);
    $w->connect();

    // Now loginWithPassword function sends Nickname and (Available) Presence
    $w->loginWithPassword($password);
    // Implemented out queue messages and auto msgid
    $w->sendMessage($target, $message);
    $w->pollMessages();
    #we need to run this continuely while client is online and timer doesnt timeout
    $msgs = $w->getMessages();
    foreach ($msgs as $m) {
        # process inbound messages
        print($m->NodeString("") . "\n");
    }
}
#get offline message when our client is on
#
function getOffLineMessage($username, $identity, $password, $nickname, $target, $message, $debug)
{
    //Create the whatsapp object and setup a connection.
    $w = new WhatsProt($username, $identity, $nickname, $debug);
    $w->connect();

    // Now loginWithPassword function sends Nickname and (Available) Presence
    $w->loginWithPassword($password);
    // Implemented out queue messages and auto msgid
    $w->pollMessages();
    $msgs = $w->getMessages();
    foreach ($msgs as $m) {
        # process inbound messages
        #print($m->NodeString("") . "\n");
        $this->wp->sendMessage($this->target, $m->NodeString("") . "\n");
    }
}
#check whether our client is on line
function isClientOnLine($status)
{
    return $status;
};
?>



