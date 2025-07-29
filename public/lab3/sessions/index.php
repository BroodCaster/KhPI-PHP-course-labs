<?php
session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

const VALID_USER = 'sanya';
const VALID_PASSWORD = '123';

$error = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($login) && !empty($password)) {
        if ($login === VALID_USER && $password === VALID_PASSWORD) {
            $_SESSION['user'] = $login;
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            $error = "Incorrect login or password";
        }
    } else {
        $error = "Please fill in both fields";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions</title>
</head>
<body>
    <?php if (!empty($_SESSION['user'])): ?>
        <h2>Hi <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
        <a href="?logout=1"><button>Logout</button></a>
    <?php else: ?>
        <h2>Sign in</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form action="" method="POST">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Submit</button>
        </form>
    <?php endif; ?>
</body>
</html>