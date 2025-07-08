<?php
require_once './class_car.php';

//สร้างออปเจ็คจาก class car

$car1 = new car();
$car2 = new car();

//เรียกใช้ methot in car
$car1->set_name('Toyota');
$car1->set_color('red');


$obj1 = new product("A01","A");
$obj2 = new product("A02","B");

// $ss = $obj1->info();

$car2->set_name('Honda');
$car2->set_color('back');



// แสดงผล echo
// echo "Name Car1 :".$car1->get_name()."<br>";
// echo "color Car1 :". $car1->get_color()."<br>";
// echo "Name Car1 :".$car2->get_name()."<br>";
// echo "color Car1 :". $car2->get_color()."<br>";

// echo $ss[0] . "  ".$ss[1];

?>