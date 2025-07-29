

<?php
if (isset($_GET['delete'])) {
    setcookie("username", "", time() - 3600, "/");
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['name'])) {
    setcookie("username", htmlspecialchars($_POST['name']), time() + 7 * 24 * 60 * 60, "/");
    header("Location: ".$_SERVER['PHP_SELF']); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie</title>
</head>
<body>
    <?php if (!empty($_COOKIE['username'])) : ?>
        <h2>Hi <?= htmlspecialchars($_COOKIE['username']) ?>!</h2>
        <a href="?delete=1"><button>Delete Cookie</button></a>
    <?php else: ?>
        <form action="" method="POST">
            <label for="name">What is your name?:</label>
            <input type="text" id="name" name="name" required>
            <button type="submit">Submit</button>
        </form>
    <?php endif; ?>
</body>
</html>