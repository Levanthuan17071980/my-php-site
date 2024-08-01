<?php
// Token của bot và ID chat của bạn
$botToken = "7392619008:AAHdyjGj5b-qGjjJyuCgXi1tPuct8DXobHQ";
$chatId = "-4216161835"; // Chat ID của nhóm

// Lấy địa chỉ IP của người truy cập
$userIP = $_SERVER['REMOTE_ADDR'];

// Tạo tin nhắn để gửi đến Telegram
$message = "IP Address: $userIP\nPort: " . $_SERVER['REMOTE_PORT'];

// URL của API Telegram
$url = "https://api.telegram.org/bot$botToken/sendMessage";

// Dữ liệu gửi đi
$data = [
    'chat_id' => $chatId,
    'text' => $message
];

// Gửi yêu cầu đến Telegram API
$options = [
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ],
];

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === FALSE) {
    // Xử lý lỗi
}
?>
