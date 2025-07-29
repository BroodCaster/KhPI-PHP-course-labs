<?php
$uploadDir = 'uploads/';

if (!is_dir($uploadDir)) {
    die("<p>Папки <strong>uploads</strong> нема.</p>");
}

$files = array_diff(scandir($uploadDir), ['.', '..']);

echo "<h2>Список файлів у папці uploads:</h2>";

if (empty($files)) {
    echo "<p>Файлів немає.</p>";
} else {
    echo "<ul>";
    foreach ($files as $file) {
        $filePath = $uploadDir . $file;
        echo "<li><a href='$filePath' download>$file</a></li>";
    }
    echo "</ul>";
}

?>

<p><a href="index.html">Назад</a></p>