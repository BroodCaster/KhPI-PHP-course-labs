<?php
$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES['file'])){
    $file = $_FILES['file'];

    if (!is_uploaded_file($file['tmp_name'])){
        die("Файл не був завантажений.");
    }

    if ($file['size'] > 2 * 1024 * 1024) {
        die("Файл перевищує дозволений розмір 2MB.");
    }

    $allowedExtensions = ['png', 'jpg', 'jpeg'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedExtensions)) {
        die("Дозволено завантажувати лише файли з розширенням: png, jpg, jpeg.");
    }

    $fileName = pathinfo($file['name'], PATHINFO_FILENAME);
    $destination = $uploadDir . basename($file['name']);

    if (file_exists($destination)) {
        $uniqueSuffix = date('Ymd_His') . '_' . rand(1000, 9999);
        $destination = $uploadDir . $fileName . '_' . $uniqueSuffix . '.' . $fileExtension;
    }

    if (move_uploaded_file($file['tmp_name'], $destination)) {

        echo "<h2>Файл успішно завантажено!</h2>";
        echo "<p><strong>Ім'я файлу:</strong> " . htmlspecialchars($file['name']) . "</p>";
        echo "<p><strong>Тип файлу:</strong> " . htmlspecialchars($file['type']) . "</p>";
        echo "<p><strong>Розмір файлу:</strong> " . round($file['size'] / 1024, 2) . " КБ</p>";

        echo "<p><a href='$destination' download>Завантажити файл</a></p>";
    } else {
        echo "Помилка при збереженні файлу.";
    }
} else {
    echo "Файл не був обраний.";
}

?>

<p><a href="index.html">Назад</a></p>