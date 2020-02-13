<?php

include_once "../base.php";

$table=$_POST['table'];
$id=$_POST['id'];

del($table,$id);
$mlist=q("select movie from ord group by movie");
foreach ($mlist as $m) {
    echo "<option value='".$m['movie']."'>".$m['movie']."</option>";
}


?>