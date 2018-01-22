<?php
$this->title = 'Біржа фірлансу «ОА»'; 
use yii\helpers\Url; 
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<br> <br> <br>
<div class="text-left"> 
<h1><b>Знайти роботу</b></h1>  
</div>
<div class="text-right">
<h1><b>Знайти виконавця</b></h1>  
</div>
<br>

<div class="index-left">
<a href="<? echo Url::to(['todo/orders']) ?>"></a>
</div>
<div class="index-right">
<a href="<? echo Url::to(['todo/login']) ?>"></a>
</div>
</body>
</html>   

