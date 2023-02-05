<?php

if (
        !empty(trim($_POST['name']))
        && !empty(trim($_POST['email']))
        && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
        && !empty(trim($_POST['message']))
    )
{

    $mail_to = "info@email.com";
    $email_from = "info@email.com";
    $name_from = "Личный сайт портфолио";
    $subject = "Сообщение с сайта!";

    $message =  "Вам пришло новое сообщение с сайта: <br><br>\n" .
        "<strong>Имя отправителя:</strong>" . strip_tags(trim($_POST['name'])) . "<br>\n" .
        "<strong>Email отправителя: </strong>" . strip_tags(trim($_POST['email'])) . "<br>\n" .
        "<strong>Сообщение: </strong>" . strip_tags(trim($_POST['message']));


    $subject = "=?utf-8?B?" . base64_encode($subject) . "?=";


    $headers = "MIME-Version: 1.0" . PHP_EOL .
        "Content-Type: text/html; charset=utf-8" . PHP_EOL .
        "From: " . "=?utf-8?B?" . base64_encode($name_from) . "?=" . "<" . $email_from . ">" .  PHP_EOL .
        "Reply-To: " . $email_from . PHP_EOL;


    $mailResult = mail($mail_to, $subject, $message, $headers);

    if ($mailResult) {
        $response = [
            'status' => true,
            'message' => 'Message sent successfully'
        ];
    } else {
        $response = [
            'status' => false,
            'message' => 'An error occurred while sending the email'
        ];
    }

    echo json_encode($response);

} else {
    $response = [
        'status' => false,
        'message' => []
    ];

    if (empty(trim($_POST['name']))) {
        $response['message'][] = "The 'Name' field cannot be empty.";
    }

    if (empty(trim($_POST['email']))) {
        $response['message'][] = "The 'Email' field cannot be empty.";
    }

    if ( !filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL) ) {
        $response['message'][] = "Please enter a valid 'Email' format.";
    }

    if (empty(trim($_POST['message']))) {
        $response['message'][] = "The 'Message' field cannot be empty.";
    }

    echo json_encode($response);
}
