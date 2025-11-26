<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET");

$action = $_GET['action'] ?? '';

switch ($action) {

    // -----------------------------
    // Chức năng 1: Xin chào
    // -----------------------------
    case 'hello':
        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data || !isset($data["name"])) {
            echo json_encode([
                "status" => "error",
                "message" => "Thiếu tham số 'name'"
            ]);
            exit;
        }

        echo json_encode([
            "status" => "success",
            "message" => "Xin chào " . $data["name"],
            "server_time" => date("Y-m-d H:i:s")
        ]);
        break;


    // -----------------------------
    // Chức năng 2: Lấy thời gian server
    // -----------------------------
    case 'time':
        echo json_encode([
            "status" => "success",
            "server_time" => date("Y-m-d H:i:s")
        ]);
        break;


    // -----------------------------
    // Không có action hợp lệ
    // -----------------------------
    default:
        echo json_encode([
            "status" => "error",
            "message" => "API không hợp lệ hoặc thiếu action"
        ]);
        break;
}
