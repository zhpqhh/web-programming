<?php
    echo"<h3>Задание 1</h3>";
    $length = 10;
    for($i=0;$i<$length;$i++)
    {
        $arr[]=rand(0,100);
    }
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
    $sum = 0;
    foreach ($arr as $value) 
    {
        $sum += $value;
    }
    echo "Сумма чисел равна {$sum}";

    echo"<h3>Задание 2</h3>";
    $a = array("a", "b", "c", "d", "e");
    echo '<pre>';
    print_r($a);
    echo '</pre>';
    $a = array_map("strtoupper", $a);
    echo '<pre>';
    print_r($a);
    echo '</pre>';

    echo"<h3>Задание 3</h3>";
    $a = array(1, 66, 36, 3, 9);
    $answer="Элемента со значением 3 нет";
    echo "Исходный массив: ";
    foreach($a as $element)
    {
        echo "$element  ";
        if($element==3)
        {
            $answer="Элемент со значением 3 есть!";
        }
    }
    echo "</br>$answer";

    echo"<h3>Задание 4</h3>";
    $a = array(1, 2, 3);
    echo '<pre>';
    print_r($a);
    echo '</pre>';
    $b = array('a', 'b', 'c');
    echo '<pre>';
    print_r($b);
    echo '</pre>';
    $a=array_merge($a,$b);
    echo '<pre>';
    print_r($a);
    echo '</pre>';

    echo"<h3>Задание 5</h3>";
    $a = array(1,2, 3, 4, 5);
    echo '<pre>';
    print_r($a);
    echo '</pre>';
    $result=array_slice($a, 1,3);
    echo '<pre>';
    print_r($result);
    echo '</pre>';
?>