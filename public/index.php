<?php

require "../bootstrap/app.php";

$app->run();

/*$timeline = [1000,1010,1020,1030,1040];
$hand = [1001,1011,1021,1031,1041];

$newtimeline = insert_in($timeline,1001,1);




function insert_in($array,$new_value,$new_key)
{
	$new_array = array();
    foreach($array as $key=>$value)
    {
       if ($key == $new_key)
            array_push($new_array,$new_value);
 
       array_push($new_array,$value);
    }
    var_dump($new_array);
    $array = $new_array;
    unset($new_array);
    return $array;
}*/