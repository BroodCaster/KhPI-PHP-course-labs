<?php
// 1. Вивід "Hello, World!"
echo "Hello, World!<br><br>"; 

// 2. Змінні та типи даних
$wow = "wow";
$a = 10;
$b = 10.5;
$boolvalue = true;

echo "$wow<br>";
echo "$a<br>";
echo "$b<br>";
echo "$boolvalue<br>"; 

echo "<br>";
var_dump($wow);
echo "<br>";
var_dump($a);
echo "<br>";
var_dump($b);
echo "<br>";
var_dump($boolvalue);
echo "<br>";

// 3. Конкатенація рядків
$firstName = "Sanya";
$lastName = "Kurdukov";
$fullName = $firstName . " " . $lastName;
echo "<br>" . "Повне ім'я: $fullName<br>";

// 4. Умовні конструкції
$number = 7;
if ($number % 2 == 0) {
    echo "<br>$number - парне число<br>";
} else {
    echo "<br>$number - непарне число<br>";
}

// 5. Цикли
// for 
for ($i = 1; $i <= 10; $i++) {
    echo "$i ";
}
echo "<br>";

// while
$j = 10;
while ($j >= 1) {
    echo "$j ";
    $j--;
}
echo "<br>";

// 6. Масиви
$student = [
    "name" => "Evgen",
    "surname" => "Trim",
    "age" => 22,
    "specialty" => "Developer"
];

echo "<b>Student</b>: {$student['name']} {$student['surname']}, <b>Age</b>: {$student['age']}, <b>Specialty</b>: {$student['specialty']}<br>";

$student["avgMark"] = 4.5;
print_r($student);
?>