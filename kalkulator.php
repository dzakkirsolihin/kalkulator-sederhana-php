<?php
$nilai1 = "number";
$value1 = "";
$nilai2 = "operator";
$value2 = "";

if (isset($_POST['number'])) {
    $number=$_POST['input'].$_POST['number'];
} else {
    $number = "";
}

if (isset($_POST['operator'])) {
    $value1=$_POST['input'];
    setcookie($nilai1, $value1, time()+(86400*30), "/");

    $value2=$_POST['operator'];
    setcookie($nilai2, $value2, time()+(86400*30), "/");
    $number = "";
}

if (isset($_POST['clear'])) {
    $hasil = null;
}

if (isset($_POST['calculate'])) {
    $number=$_POST['input'];
    switch ($_COOKIE['operator']) {
        case '+':
            $hasil = $_COOKIE['number'] + $number;
            break;
        case '-':
            $hasil = $_COOKIE['number'] - $number;
            break;
        case 'x':
            $hasil = $_COOKIE['number'] * $number;
            break;
        case '/':
            if ($number!= 0) {
                $hasil = $_COOKIE['number'] / $number;
            } else {
                $hasil = "Tidak Terdefinisi";
            }
            break;
    }
    $number=$hasil;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <style>
    body{
        font-family: sans-serif;
        min-height: 100vh;
        background-color: #282828;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin: 0;
        padding: 0;
    }
    h1 {
        padding: 2em;
        font-size: 48px;
        color: #fff;
    }
    .content-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 30vh;
    }

    .calculator {
        width: 300px;
        background-color: #111;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.7);
    }

    .display {
        height: 5vh;
        padding: 20px;
        font-size: 24px;
        color: #fff;
        text-align: right;
    }

    input[name="input"] {
        background-color: #111;
        align-items: center;
        text-align: center;
    }

    .buttons {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        padding: 10px;
    }

    input {
        padding: 15px;
        font-size: 16px;
        background-color: #333;
        color: #fff;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .angka:hover {
        background-color: #444;
    }

    .operasi{
        background-color: rgba(255, 165, 0, 0.8);
        color: #111;
        font-weight: bold;
    }

    .operasi:hover{
        background-color: #FFA500;
    }
    </style>
</head>
<body>
    <h1>Kalkulator PHP Sederhana</h1>
    <div class="content-container">
        <div class="calculator">
            <form method="post" action="">
                <div class="display">
                    <input type="text" name="input" value="<?php echo $number; ?>">
                </div>
                <div class="buttons">
                    <input type="submit" class="operasi" name="clear" value="C">
                    <input type="submit" class="angka" name="number" value="0">
                    <input type="submit" class="operasi" name="operator" value="+">
                    <input type="submit" class="operasi" name="operator" value="/">
                    <input type="submit" class="angka" name="number" value="1">
                    <input type="submit" class="angka" name="number" value="2">
                    <input type="submit" class="angka" name="number" value="3">
                    <input type="submit" class="operasi" name="operator" value="x">
                    <input type="submit" class="angka" name="number" value="4">
                    <input type="submit" class="angka" name="number" value="5">
                    <input type="submit" class="angka" name="number" value="6">
                    <input type="submit" class="operasi" name="operator" value="-">
                    <input type="submit" class="angka" name="number" value="7">
                    <input type="submit" class="angka" name="number" value="8">
                    <input type="submit" class="angka" name="number" value="9">
                    <input type="submit" class="operasi" name="calculate" value="=">
                </div>
            </form>
        </div>
    </div>
</body>
</html>