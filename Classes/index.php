<?php

class Product
{ 
    
      
    function GetProducts()
    {	
        $items = [1 => 'Ручка', 2 => 'Линейка', 3 => 'Тетрадь', 4 => 'Ластик'];
       
        
        return $items;
    }
}


class Order
{ 
    private $orders = [];
 
    public function AddOrder($orderedProducts)
    {
        if(empty($orderedProducts)) return 0;

        $lastOrderNumber = 1;
        $this->orders[$lastOrderNumber] = [];

        foreach($orderedProducts as $key => $amount)
        {
            $amount = (int)$amount;

            if($amount > 0)
                $this->orders[$lastOrderNumber][$key] = $amount;
        }

        return $lastOrderNumber;
    }

    public function GetOrder($orderNumber)
    {
        return $this->orders[$orderNumber];
    }
}




$pr = new Product();

$products = $pr->GetProducts();

?>

<html>
    <head>
        <title></title>
</head>
<body>
    <form action="index.php" method="post">
        <?php foreach($products as $key => $product): ?>
                <div>
                <p><span ><?= $product ?>
                <input type="text" name="amount[<?= $key ?>]" placeholder="Количество" value="0" ><br /></p>
        </div>
            <? endforeach; ?>

    <input type="submit" value="Заказать"/>
</form>


</body>
</html>
<?php




$pr = new Product();
$or = new Order();

$products = $pr->GetProducts();


$orderedProducts = $_POST['amount'];
$orderNumber = $or->AddOrder($orderedProducts);
$orderProducts = $or->GetOrder($orderNumber);

//print_r($orderedProducts);

?>

<html>
    <head>
        <title></title>
</head>
<body>
   
    <? if($orderNumber  > 0): ?>
    <h1>Номер вашего заказа <?= $orderNumber ?></h1>
        
    <table>
        
        <tr>
            <th>Товар</th>
            <th>Количество</th>
        </tr>
    <?php foreach($orderProducts as $key =>  $amount): ?>
        <tr>
            <td><?= $products[ $key ] ?>
            <td><?= $amount ?>
    </tr>
        <? endforeach; ?>
</table>
<? endif; ?>
      

</body>
</html>