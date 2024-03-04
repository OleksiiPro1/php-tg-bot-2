<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function debug($data): void {
    echo "<pre>" . print_r($data, true) . "</pre>";
}

function send_request(string $method, array $params = []): mixed {
    $url = BASE_URL . $method;
    if (!empty($params)) {
        $url .= '?' . http_build_query($params);
    }
    return json_decode(file_get_contents($url));
}

function save_input() {
    $input = file_get_contents("php://input");
    file_put_contents(__DIR__."/input.json", $input);

}

function decode_input() {
    $decode = file_get_contents("php://input");
    $decoded = json_decode($decode);
    return $decoded;
}

