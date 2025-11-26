<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data["name"])) {
    echo json_encode([
        "status" => "error",
        "message" => "Thiếu tham số 'name'"
    ]);
    exit;
}

$name = $data["name"];

echo json_encode([
    "status" => "success",
    "message" => "Xin chào " . $name,
    "server_time" => date("Y-m-d H:i:s")
]);
