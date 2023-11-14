<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset = "UTF-8">
    <link rel="stylesheet" href="Calculator.css" type="" />
</head>
<body>
<h1>Прототип калькулятора</h1>
<form action='' method='post' class="calculate-form">
    <input type="text" name="number1" class="numbers" placeholder="Первое число">
    <select class="operations" name="operation">
        <option value='plus'>+</option>
        <option value='minus'>-</option>
        <option value="multiply">*</option>
        <option value="divide">/</option>
    </select>
    <input type="text" name="number2" class="numbers" placeholder="Второе число">

    <input class="submit_form" type="submit" name="submit" value="Получить ответ">

<?php
if(isset($_POST['submit'])){
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $operation = $_POST['operation'];
//    $result = $_POST ['Result'];

    // Валидация
    if(!$operation || (!$number1 && $number1 != '0') || (!$number2 && $number2 != '0')) {
        $error_result = 'Не все поля заполнены';

    }
    else {

        if(!is_numeric($number1) || !is_numeric($number2)){
            $error_result = "Операнды должны быть числами";
        }
        else
            switch($operation){
                case 'plus':
                    $result = $number1 + $number2;
                    break;
                case 'minus':
                    $result = $number1 - $number2;
                    break;
                case 'multiply':
                    $result = $number1 * $number2;
                    break;
                case 'divide':
                    if( $number2 == '0')
                        $error_result = "На ноль делить нельзя!";
                    else
                        $result = $number1 / $number2;
                    break;
            }

    }
    if(isset($error_result)){
        echo "<div class='error-text'>Ошибка: $error_result</div>";
    }
    else {
        echo "<input type='text' id='Numbers' class='numbers' placeholder='Результат' readonly value='$result'> </input>";
    }
}
?>
</form>
</body>
</html>
