<?php session_start();

$product = [
'id'=>1,
'name'=>15.5,
'discount'=> 15,
'quantity' => 1
];

$_SESSION['products'][] = $product;





// highlight_string("<?php" . var_export($_SESSION['products'],true) . ";?>")

?>
