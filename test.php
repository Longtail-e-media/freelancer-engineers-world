<?php

require_once 'includes/initialize.php';

// Your Job Data
$job_title = 'New Website Development';

// API Credentials
$token = "EAAXDKDleXdwBQ21IZCux7yQJ1v2nCry2IJmOKR372XIQ5rFpzThDIJpaPTgcasaGsvxZAGpBfc2lnRzNcVd6zJCkBl6oCHpcM4SQSPVt6CCnNiLXE1vZAtSBfGQiWt439V0uWNkYJFRepzwlZANagJyDx4pnegZBFcuscQEvoIkyreh3rR6NTtxWAxgBmG71G0wZDZD";
$phone_number_id = "953069291221946";
$my_number = "9779849482842"; // The test number you verified in Step 1

$url = "https://graph.facebook.com/v24.0/$phone_number_id/messages";

//$data = [
//    "messaging_product" => "whatsapp",
//    "to" => $my_number,
//    "type" => "template",
//    "template" => [
//        "name" => "hello_world", // Use the default 'hello_world' template for your first test
//        "language" => ["code" => "en_US"]
//    ]
//];

// custom template "job_alert" with a variable placeholder {{1}} for the job title
$custom_message = "this is second message"; // This will replace {{1}}

$data = [
    "messaging_product" => "whatsapp",
    "to" => $my_number,
    "type" => "template",
    "template" => [
        "name" => "job_alert",
        "language" => [
            "code" => "en" // Ensure this matches the language you chose in the portal
        ],
        "components" => [
            [
                "type" => "body",
                "parameters" => [
                    [
                        "type" => "text",
                        "text" => $custom_message // Your dynamic data
                    ]
                ]
            ]
        ]
    ]
];


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $token",
    "Content-Type: application/json"
]);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// $response = curl_exec($curl);
curl_close($curl);
// echo $response;


