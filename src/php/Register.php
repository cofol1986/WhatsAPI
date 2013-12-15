<?php

require_once('whatsprot.class.php');

function register_phrase1($username, $identity, $nickname, $debug) {
    $w = new WhatsProt($username, $identity, $nickname, $debug);
    $w->codeRequest('sms');

};
function register_phrase2($username, $identity, $nickname, $registercode, $debug) {
    $w = new WhatsProt($username, $identity, $nickname, $debug);
    $authinfo=$w->codeRegister('391668');
    return authinfo;

};
