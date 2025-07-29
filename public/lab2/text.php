<?php
$logFile = 'log.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['text'])) {
    $text = trim($_POST['text']);

    if (!empty($text)) {
        file_put_contents($logFile, $text . PHP_EOL, FILE_APPEND | LOCK_EX);
        echo "<p>Текст записано</p>";
    } else {
        echo "<p>Поле не може бути порожнім</p>";
    }
}

if (file_exists($logFile)) {
    $content = file_get_contents($logFile);
    echo "<h2>Вміст log.txt:</h2>";
    echo "<pre>" . htmlspecialchars($content) . "</pre>";
} else {
    echo "<p>Файл log.txt ще не створений.</p>";
}
?>

<p><a href="index.html">Назад</a></p>