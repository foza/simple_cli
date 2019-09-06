<?php
function read($filename, $operation)
{
    $data = [];
    $files = fopen($filename, 'r');
    if (!$files) return false;

    while (!feof($files)) {                                                 // пока файл не закончиться, продолжаем цикл
        $line = fgets($files, 9999);                                //  читаем строки в файле ограничение 9999 строк
        $data = explode(" ", $line);
        $result = eval("return " . $data['0'] . $operation . $data['1'] . ";");
        if ($result > 0)
            writeAnswers("+", $result, $operation);
        else
            writeAnswers("-", $result, $operation);
    }
    fclose($files);

    return "Результаты у вас в папке :)  ";
}


function writeAnswers($filename, $txt, $operation)
{
    $file = fopen($filename, "a") or die("Unable to open file!");
    fwrite($file, $txt . "\n");
    fclose($file);
}