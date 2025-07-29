<?php
session_start();
$inactive_time = 5;

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $inactive_time)) {
    session_unset();
    session_destroy();
    header("Location: index.php?expired=1");
    exit;
}

$_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Timeout</title>
</head>
<body>
    <h2>Activity Monitoring Page</h2>

    <?php if (isset($_GET['expired'])): ?>
        <p style="color: red;">Your session has expired due to inactivity.</p>
    <?php endif; ?>

    <p>Last activity: <?= date("H:i:s", $_SESSION['last_activity']) ?></p>
    <p>If you remain inactive for 10 seconds, your session will expire.</p>

    <p><a href="index.php">Refresh the page</a></p>
</body>
</html>
