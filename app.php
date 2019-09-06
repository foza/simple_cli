<?php

require_once 'functions.php';

$read_file = readline("Введите название файла(укажите файл без расширение): ");
$operation = readline("Введите тип операции (*, /, +, -): ");
$file = $read_file . ".txt";

if (file_exists($file) && is_readable($file)) {
    read($file, $operation);
} else {
    print "Файл не существует";
}

?>