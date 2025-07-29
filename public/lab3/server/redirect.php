<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$client_ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$script_name = $_SERVER['PHP_SELF'];
$request_method = $_SERVER['REQUEST_METHOD'];
$file_path = __FILE__;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Information</title>
</head>
<body>
    <h2>Server Information</h2>
    <ul>
        <li><strong>Client IP:</strong> <?= htmlspecialchars($client_ip) ?></li>
        <li><strong>Browser name and version:</strong> <?= htmlspecialchars($user_agent) ?></li>
        <li><strong>Script name:</strong> <?= htmlspecialchars($script_name) ?></li>
        <li><strong>Request:</strong> <?= htmlspecialchars($request_method) ?></li>
        <li><strong>File path:</strong> <?= htmlspecialchars($file_path) ?></li>
    </ul>
</body>
</html>
