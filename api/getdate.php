<?php
include_once "../base.php";


$id=$_GET['id'];
$movie=find("movie",$id);

$today=strtotime(date("Y-m-d"));


$ondate=strtotime($movie['ondate']);

for($i=0;$i<3;$i++){
    
    $showDate=strtotime("+$i days",$ondate);
    if($showDate>=$today){
        
        echo "<option value='".date("Y-m-d",$showDate)."'>".date("m月d日 l",$showDate)."</option>";

    }
}





?>

