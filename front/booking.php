<style>
.room{
    width:540px;
    height: 362px;
    margin: auto;
    background: url("./icon/03D04.png")no-repeat;
    box-sizing: border-box;
    display:flex;
    flex-wrap: wrap;
    /* justify-content: space-between;   */ 
    align-content:end;
    padding: 18px 110px;
}
.info{
    width: 540px;
    margin: auto;
    background: #ccc;
    box-sizing: border-box;
    padding:10px 100px;
    
}
.seat{
    /* background: green; */
    width: 64px;
    height: 86px;
    position: relative;
}
.info .ct{
    margin-top: 10px;
}
.chk{
    position: absolute;
    bottom: 5px;
    right: 5px;
}
.null{
    background: url("./icon/03D02.png") no-repeat center;
}
.pick{
    background: url("./icon/03D03.png") no-repeat center;

}
</style>
<?php
include_once "../base.php";
$merge=[];
$movie=find("movie",$_GET['id'])['name'];
$date=$_GET['date'];
$session=$_GET['session'];
$orders=q("select * from ord where movie='$movie' && date='$date' && session='$session'");
/* echo "<pre>";print_r($orders);"</pre>"; */
/*  */

foreach ($orders as $o) {
    $merge=array_merge($merge ,unserialize($o['seat']));
    
}
/* echo "<pre>";print_r($merge);"</pre>"; */

?>


<div class="room">
    <?php 
    for ($i=0; $i <20 ; $i++) { 
        if (in_array($i,$merge)) {
            echo "<div class='seat pick'>";      
        }else{
            echo "<div class='seat null'>";
            echo "<input type='checkbox' value='$i' class='chk'>";
        } 
            echo "<div class='ct'>".floor(($i/5)+1)."排".(($i%5)+1)."號</div>";
            echo "</div>";
    }
    ?>

</div>
<div class="info">
    <div>您選擇的電影是: <?=$movie;?> </div>
    <div>您選擇的日期是: <?=$date."<br> 場次是: ".$session;?></div>
    <div>您已經勾選<span class="ticket">0</span> 張票，最多可以購買四張票</div>
<div class="ct">
<button class="pre">上一步</button>
<button class="order">訂購</button>
</div>    
</div>

<script>

let num=0;
let seat=new Array()
$(".chk").on("click",function(){
    let chk=$(this).prop("checked")
    //有打勾就會是true
    if (chk==true) {
        if (num<4) {
            num++;
            seat.push($(this).val())
            //這段可不用作
            $(this).parent().removeClass("null")
            $(this).parent().addClass("pick")

        }else{
            alert("最多只能訂購四張票!")
            $(this).prop("checked",false)
        }
    }else{
        num--;
        seat.splice(seat.indexOf($(this).val()),1);
        //這段可不用作
            $(this).parent().removeClass("pick")
            $(this).parent().addClass("null")
    }
    
    $(".ticket").html(num);
    console.log(seat, seat.length);
    
})


$(".pre").on("click",function(){
    $(".ct").show()
    $(".load").html("")
    $("form").show()
})
$(".order").on("click",function(){
    let result={
        "seat":seat,
        "movie":"<?=$movie;?>",
        "date":"<?=$date;?>",
        "session":"<?=$session;?>",
        "qt":seat.length
    }
    $.get("./front/result.php",result,function(res){
        $(".load").html(res)

    })
})

</script>