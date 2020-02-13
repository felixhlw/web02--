<style>
.orderlist {
    width:100%;
    height: 400px;
    overflow: auto;
}
h3{
    margin:0;
    padding:5px;
    background:#555;
    color:white;
    text-align:center;
    border:1px solid black;
}


}

</style>

<h3>訂單清單</h3>

<div class="fun">
快速刪除:
<input type="radio" name="type" class="type" value="1">依日期
<input type="text" name="text" id="date">

<input type="radio" name="type" class="type" value="2">依電影
<select name="movie" id="movie">

<?php 
$mlist=q("select movie from ord group by movie");
foreach ($mlist as $m) {
    echo "<option value='".$m['movie']."'>".$m['movie']."</option>";
}
?>



</select>

<button id="qdel" onclick="qDel()">刪除</button>
</div>

<div class="orderlist">



</div>

<script>
getList()

function getList(){
    $.get("./admin/orderlist.php",function(list){
        $(".orderlist").html(list);

        $(".delBtn").on("click",function(){
            let id=$(this).data('del');

            $.post("./api/del.php",{"table":"ord",id},function(m){
                $("#movie").html(m)
                getList()
            })
        })
        
    })
}

function qDel(){
    let type=$(".type:checked").val()
    let chk=""
    let data={};
    console.log(type)
    switch(type){
        case "1":
            data={"date":$("#date").val()}
        break;
        case "2":
            data={"movie":$("#movie").val()}
        break;
    }
    chk=confirm(`確定刪除全部的訂單嗎?`)
    if(chk==true){
        $.post('./api/qdel.php',data,function(m){
            $("#movie").html(m)
            getList()
        })
    }
}


</script>