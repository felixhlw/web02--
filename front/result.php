<style>
.list{
    margin: auto;
}
</style>

<?php

include_once "../base.php";
sort($_GET['seat']);
$data['seat']=serialize($_GET['seat']);
$data['movie']=$_GET['movie'];
$data['date']=$_GET['date'];
$data['session']=$_GET['session'];
$data['qt']=$_GET['qt'];
$data['no']=date("Ymd").sprintf("%04d",q("select max(id)+1 from ord")[0][0]);


save("ord",$data);
?>
<div>

    <table>
        <tr>
            <td colspan=2>感謝您的訂購，您的訂單編號是: <?=$data['no'];?></td>
        </tr>       
         <tr>
            <td>電影名稱: </td>
            <td><?=$data['movie'];?></td>
        </tr>
        <tr>
            <td>日期: </td>
            <td><?=$data['date'];?></td>
        </tr>
        <tr>
            <td>場次時間: </td>
            <td><?=$data['session'];?></td>
        </tr>
        <tr>
            <td colspan=2 class='list'>
                座位: 
            <?php
                foreach ($_GET['seat'] as $seat) {
                    echo "<div>".(floor($seat/5)+1)."排".(($seat%5)+1)."號</div>";
                }
            ?>
            <div>共<?=$data['qt'];?>張電影票</div>

            </td>
            
        </tr>
        <tr>
            <td colspan=2>
            <button onclick="javascript:location.href='index.php'" > 確認</button>        
        </td>
            
        </tr>

    </table>


</div >

