<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>

<style>

div.a7 { 
	margin-right: 23px;
	margin-bottom: 3px;
	overflow: hidden;
	float: left;
	width: 130px;
	height: 80px;
	text-align:left;
	border:none;
	border-width: 1px;
}

div.text7 {
	font-size: 12px;
}

div.barcode7 {
	margin-top:-5px;
	font-size: 12px;
}

div.price7 {
	margin-top:-5px;
	font-weight:bold;
	font-size:12px;
}
</style>



</head>
<body>

<?

$num = $barcode->t_num;
$name = $barcode->t_name . '<br>';
$barc = $barcode->t_barcode;
$etc = $barcode->t_price;

$barcode = '<img src="'. asset('barcode/barcode_gen.php?text='. $barc .'&size=25&codetype=Code128&print=true') .'" /> <br>';
$id = $barc .'<br>';

$pri_bar = '<center><div class="text7">'.$name.'</div>' . $barcode .'<div class="barcode7">'. $id.'</div><div class="price7">' . $etc.'</div></center>';
?>

<?

for($i=0;$i<$num;$i++)
{ 
    echo '<div class="a7">'.$pri_bar.'</div>';
}
?>

</body>
</html>
