<h1>Задание 1</h1>

<form method="post">
  <input type="number" name="num" />
  <input type="submit" />
</form>

<?php
    if(isset($_POST['num'])) 
    {
        $num = (int) $_POST['num'];
        $count = strlen($num);
        if($count > 1)
        {
            $sum = 0;
            $arr = str_split($num);
        
            for($i = 0; $i < $count; $i++)
            {
                $sum += $arr[$i];
            }
        
            echo 'Сумма введенных цифр: ', $sum;
        }
        else
            echo 'Вы ввели одну цифру. Цифра: ', $num;
    }
?>

<h1>Задание 2</h1>

<form method="post">
  <input type="number" name="num1" />
  <input type="number" name="num2" />
  <input type="submit" />
</form>

<?php
    if(isset($_POST['num1'])) 
    {
        $num1 = (int) $_POST['num1'];
        $num2 = (int) $_POST['num2'];
        $count = strlen($num1);
    	if ($num2 < 10 && $num2 >= 0)
        {
    		if($count > 1) 
            {
    			$sum = 0;
    			$arr = str_split($num1);
            
    			for($i = 0; $i < $count; $i++)
    				if ($arr[$i] == $num2)
                    {
    					$sum ++;
    				}
                
    			echo 'Количество цифры ', $num2, ' в числе ', $num1, ': ', $sum;
    		}
    		else
    			echo 'Вы не ввели число';
    	}
    	else
    		echo 'Вы неверно ввели цифру';
    }
?>

<h1>Задание 3</h1>

<?php
    // Количество элементов в массиве
    $k = 5;

    // Создаем пустой массив 
    $arr = [];

    // Заполняем пустой массив случайными числами от 0 до 100 и выводим его 
    for ($i=0; $i<= $k-1; ++$i) {
     $arr[$i] = rand(0, 100);
    }
    echo "Вывод случайного массива из $k элементов:".'<br>';
    foreach ($arr as $key => $value) {
    echo "$value", ' ';
    }
    echo '<br>';

    // Определяем максимальное и минимальное значения в массиве
    echo 'Максимальное значение: '. max($arr). '<br>';
    echo 'Минимальное значение: '. min($arr). '<br><p>';
    echo '<p>';

    // Определяем индексы максимального и минимального элементов
    $mini = array_search(min($arr), $arr);
    $maxi = array_search(max($arr), $arr);

    // Записываем временные максимальное и минимальное значение
    $min = min($arr);
    $max = max($arr);

    // Меняем местами элементы в массиве по индексу
    $arr[$mini] = $max;
    $arr[$maxi] = $min;

    echo "Max и Min поменяны местами: ". '<br>';
    foreach ($arr as $key => $value) 
    {
        echo "$value", ' ';
    }
    echo '<br>';
?>

<h1>Задание 4</h1>

<form method="post">
  <input type="string" name="name" />
  <input type="submit" />
</form>

<?php
    if(isset($_POST['name'])) 
    {
        $name = (string) $_POST['name'];
        $count = strlen($name);
	    $str = $name;
	    $arr_full = explode(' ', $str);
	    $surname = $arr_full[0];
	    $firstname = $arr_full[1];
	    $secondname = $arr_full[2];

	    $firstname_short = str_split($firstname)[0]. '.';
	    $secondname_short = str_split($secondname)[0]. '.';
	    $result = $surname. ' '. $firstname_short. ' '. $secondname_short;
	    echo $result;
    }
?>

<h1>Задание 5</h1>

<form method="post">
  <input type="number" name="year" />
  <input type="submit" />
</form>

<?php
    if(isset($_POST['year'])) 
    {
        $year = (int) $_POST['year'];
        $count = strlen($year);
    	if ($year % 400 == 0) 
        {
    		echo "Это високосный год";
    	}
    	else 
        {
    		if ($year % 100 == 0) 
            {
    			echo "Это не високосный год";
    		}
    		else 
            {
    			if ($year % 4 == 0) 
                {
    				echo "Это високосный год";
    			}
    			else 
                {
    				echo "Это не високосный год";
    			}
    		}
    	}
    }
?>