<?php
/**
 * Created by PhpStorm.
 * User: shuhao
 * Date: 2018-01-12
 * Time: 10:34 AM
 * 
 * Usage: php send_email.php [recipient_email] [score1] [score2] [score3]
 */

$address = $argv[1];
$score1 = $argv[2];
$score2 = $argv[3];
$score3 = $argv[4];


$subject = "Email Subject";
$headers = "From: Sender Name <sender@server.com>" . "\r\n" .
    'Reply-To: Sender Name <replyto@server.com>' . "\r\n" .
    //'CC: CC <cc@server.com>' . "\r\n" .
    //'BCC: BCC <bcc@server.com>' .
    "";

$message = "Please find your scores below.

# Presentation (30%) | Your score: $score1

# Scope of the topic (30%) | Your score: $score2

# Organization (40%) | Your score: $score3
";

mail($address, $subject,
    str_replace("\r", "", $message),
    $headers);
