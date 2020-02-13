<?php
include_once "../base.php";

/* 
switch($_POST['type']){
    case 1:
        del("ord",['date'=>$_POST['date']]);
    break;
    case 2:
        del("ord",['movie'=>$_POST['movie']]);
} */
del("ord",$_POST);
$mlist=q("select movie from ord group by movie");
foreach ($mlist as $m) {
    echo "<option value='".$m['movie']."'>".$m['movie']."</option>";
}