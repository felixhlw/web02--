<style>
.row{
    background:white;
    margin:2px auto;
    width:95%;
    list-style-type:none;
    padding:3px;
    color:black;
    display:flex;
}

.row li:nth-child(1){
    width:15%;
}
.row li:nth-child(2){
    width:20%;
}

.row li:nth-child(1) img{
    width:90%;
    height:auto;
    vertical-align: middle;
}
</style>

<?php
include_once "../base.php";

$movies=all("movie",[]," order by rank");

foreach($movies as $k => $m){
    //計算上一筆的id
    $prev=($k!=0)?$movies[$k-1]['id']:$m['id'];
    
    //計算下一筆的id
    $next=($k!=(count($movies)-1))?$movies[$k+1]['id']:$m['id'];
?>
<ul class="row">
    <li>
        <img src="./movie/<?=$m['poster'];?>" >
    </li>
    <li>
        <div>分級:<img src="./icon/<?=$level[$m['level']][0];?>"></div>
        <div>片名:<?=$m['name'];?></div>
        <div>片長:<?=$m['length'];?></div>
        <div>上映時間:<?=$m['ondate'];?></div>
    </li>
    <li>
        <div>
            <button class="showBtn" data-show="<?=$m['id'];?>"><?=($m['sh']==1)?"顯示":"隱藏";?></button>
            <button class="shiftBtn" id="<?=$m['id']."-".$prev;?>">往上</button>
            <button class="shiftBtn" id="<?=$m['id']."-".$next;?>">往下</button>
            <button  onclick="javascript:location.href='admin.php?do=editmovie&id=<?=$m['id'];?>'">編輯電影</button>
            <button class="delBtn" data-del="<?=$m['id'];?>">刪除電影</button>
        
        </div>
        <div>
            劇情簡介:<?=$m['intro'];?>
        </div>
    </li>

</ul>
<?php

}
?>