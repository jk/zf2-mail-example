<?php

use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;

require('vendor/autoload.php');

// @see http://framework.zend.com/manual/current/en/modules/zend.mail.introduction.html
$mail = new Message();
$mail->setBody('This is the text of the email.');
$mail->setFrom('Freeaqingme@example.org', 'Sender\'s name');
$mail->addTo('Matthew@example.com', 'Name of recipient');
$mail->setSubject('TestSubject');

// @see http://framework.zend.com/manual/current/en/modules/zend.mail.transport.html
$transport = new SmtpTransport();
$options   = new SmtpOptions(array(
    'name'              => 'localhost.localdomain',
    'host'              => '127.0.0.1',
    'connection_class'  => 'login',
    'connection_config' => array(
        'username' => 'user',
        'password' => 'pass',
    ),
));
$transport->setOptions($options);
$transport->send($mail);
