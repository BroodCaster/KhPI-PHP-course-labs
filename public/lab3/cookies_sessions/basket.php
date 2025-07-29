<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$products = [
    1 => "t1",
    2 => "t2",
    3 => "t3"
];

// Додавання товару в корзину
if (isset($_GET['action']) && $_GET['action'] === 'add' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    if (isset($products[$id])) {
        $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;

        // Збереження в кукі попередніх покупок
        $previous_purchases = isset($_COOKIE['previous_purchases']) ? json_decode($_COOKIE['previous_purchases'], true) : [];
        $previous_purchases[$id] = ($previous_purchases[$id] ?? 0) + 1;
        setcookie('previous_purchases', json_encode($previous_purchases), time() + 3600 * 24 * 30);
    }

    header("Location: cart.php");
    exit;
}


// Очищення корзини
if (isset($_GET['action']) && $_GET['action'] === 'clear') {
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit;
}


$previous_purchases = isset($_COOKIE['previous_purchases']) ? json_decode($_COOKIE['previous_purchases'], true) : [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Basket</title>
</head>
<body>
<h2>Basket</h2>
    <ul>
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $id => $quantity): ?>
                <li><?= htmlspecialchars($products[$id]) ?> - <?= $quantity ?> шт.</li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Cart is empty</p>
        <?php endif; ?>
    </ul>

    <h2>Previous purchases</h2>
    <ul>
        <?php if (!empty($previous_purchases)): ?>
            <?php foreach ($previous_purchases as $id => $quantity): ?>
                <li><?= htmlspecialchars($products[$id]) ?> - <?= $quantity ?> шт.</li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No previous purchases</p>
        <?php endif; ?>
    </ul>

    <p><a href="index.php">Continue shopping</a></p>
    <p><a href="cart.php?action=clear">Empty cart</a></p>
</body>
</html>