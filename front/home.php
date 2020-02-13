<?php
include_once "base.php";
?>
<style>
.movie-list{
  display:flex;
  flex-wrap:wrap;
  justify-content:start;
}
.movie-box{
  width:48%;
  margin:0.5%;
  box-sizing:border-box;
  border:1px solid #ccc;
  border-radius:10px;
  display:flex;
  flex-wrap:wrap;
  padding:10px 3px;
}
.movie-poster img{
  width:55px;
  height:70px;
}
.movie-poster{
  width:30%;
  cursor: pointer;
}
.movie-info{
  width:70%;

}
.movie-info li{
  list-style-type:none;
  padding:0;
  font-size:12px;
}
.movie-info li img{
  width: 20px;
  vertical-align: middle;
}

/* ----------------------------------------- */
.lists, .controls{
  border: 0px solid white;
}

#slider *{
  box-sizing: border-box;
  margin: auto;
}

#slider .lists{
  margin: auto;
  width: 180px;
  height:240px ;
  overflow: hidden;
}

#slider .controls{
  width: 90%;
  height: 100px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.controls .btns{
  width: 320px;
  display: flex;
  align-items: center;
  overflow: hidden;
}

.controls .btns .icon{
  width: 80px;
  height: 100px;
  /* background: yellow; */
  flex-shrink: 0;
  font-size: 14px;
  text-align: center;
  position: relative;
  
}

.controls .ra, .controls .la{
  border-top: 15px solid transparent;
  border-bottom: 15px solid transparent;
  cursor: pointer;
}

.la{
  border-right: 25px solid orange;
}

.ra{
  border-left: 25px solid orange;
}
.poster img{
  width: 100%;
}
.poster{
  text-align:center;
  display:none;
}
.icon img {
  width: 80%;
  cursor: pointer;
}

</style>
<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="slider">
          <div class="lists">
            <?php
              $pos=all("poster",["sh"=>1], " order by rank");
              foreach($pos as $p){
            ?>    
                <div class="poster" data-ani="<?=$p['ani'];?>">
                <img src="./poster/<?=$p['poster'];?>" alt="">
              <div class="name"><?=$p['name'];?></div>
                </div>
            <?php
              }
            ?>
          </div>
          <div class="controls">
            <div class="la">  </div>
            <div class=btns>
              <?php
              foreach ($pos as $p) {
              ?>

              <div class="icon">
                <img src="./poster/<?=$p['poster'];?>" alt="">
                <div class="name"><?=$p['name'];?></div>
              </div>
              <?php
              }
            ?>
          </div>
            <div class="ra">  </div>
          </div>
        </div>
      </div>
    </div>

<script>
$(".poster").eq(0).show();
let total=$(".poster").length;
let next=1;
let slide=setInterval(ani,2500);


$(".icon").on("click",function(){
  next=$(this).index(".icon")
  ani()
})

let mov=0;
let w=$(".icon").outerWidth();
$(".ra,.la").on("click",function(){
  switch($(this).attr("class")) {
    case "ra":
      if (mov<(total-4)) {
        mov++;
        $(".icon").animate({right:w*mov},
        function(){
          showArrow();
        }
        )
      }
    break;
    case "la":
      if (mov>0) {
        mov--;
        $(".icon").animate({right:w*mov},
        function(){
          showArrow();
        }
        )
      }
    break;
  }
})
showArrow();
function showArrow(){
  if (mov==0) {
    $(".la").css({"border-right":"25px solid transparent"});
  }else if(mov==(total-4)){
    $(".ra").css({"border-left":"25px solid transparent"});
  }else{
    $(".la").css({"border-right":"25px solid orange"});
    $(".ra").css({"border-left":"25px solid orange"});
  }
}


function ani(){
  let show=$(".poster:visible");
  let ani=$(".poster").eq(next).data("ani")
/*   console.log(ani);
  console.log(typeof(ani)); */
  switch(ani) {
    case 1:
    //@淡入淡出
      $(show).fadeOut(1000,function(){
        $(".poster").eq(next).fadeIn(1000)
/*         $(".poster").animate({"width":0,"height":0})
        $(".poster").animate({"width":"180px","height":"240px"}) */
        next++;
        if (next >= total) {
          next=0;
        }
      })
      break;
    case 2: 
    //滑入滑出
    $(show).slideUp(1000,function(){
        $(".poster").eq(next).slideDown(1000)
/*         $(".poster").animate({"width":0,"height":0})
        $(".poster").animate({"width":"180px","height":"240px"}) */
        next++;
        if (next >= total) {
          next=0;
        }
      })
    break;
    case 3:
    //縮放
    $(show).hide(1000,function(){
        $(".poster").eq(next).show(1000)
        next++;
        if (next >= total) {
          next=0;
        }
      })
    break;
  }
}

$(".btns").hover(
  function(){
    clearInterval(slide)
  },
  function(){
    slide=setInterval(ani,2500)

  }
)

</script>
<!-- --------------------------------------- -->



    <div class="half">

      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
      <div class="movie-list">
    <?php
      include_once "base.php";

      $today=date("Y-m-d");
      $startDay=date("Y-m-d",strtotime("-2 days"));
      //$sql="select * from movie where sh='1' && ondate >= '$startDay' && ondate <= '$today' order by rank";
      $total=q("select count(*) from movie where sh='1' && ondate >= '$startDay' && ondate <= '$today'")[0][0];
/*       $aa=q("select count(*) from movie where sh='1' && ondate >= '$startDay' && ondate <= '$today'");
      echo "<pre>";print_r($aa);"</pre>";  */
      $div=4;
      $pages=ceil($total/$div);
      $now=(!empty($_GET['p']))?$_GET['p']:1;
      $start=($now-1)*$div;
      $sql="select * from movie where sh='1' && ondate >= '$startDay' && ondate <= '$today' order by rank limit $start,$div";
      $movies=q($sql);


      foreach($movies as $m){
    ?>
      <div class="movie-box" >
        <div class="movie-poster" onclick="javascript:location.href='index.php?do=intro&id=<?=$m['id'];?>'">
          <img src="./movie/<?=$m['poster'];?>" >
        </div>
        <div class="movie-info">
          <li style="font-size:16px;"><?=$m['name'];?></li>
          <li>分級:<img src="./icon/<?=$level[$m['level']]['0'];?>" style="display:inline-block;">  </li>
          <li>上映日期:<?=$m['ondate'];?></li>
        </div>
        <div class="movie-btn">
          <button onclick="javascript:location.href='index.php?do=intro&id=<?=$m['id'];?>'">劇情簡介</button>
          <button onclick="javascript:location.href='index.php?do=order&id=<?=$m['id'];?>'">線上訂票</button>
        </div>
      </div>

    <?php
      }
    ?> 
    </div>
        <div class="ct a ">
          
        <?php
          
          //建立分頁的相關連結
          if(($now-1)>0){
            echo "<a href='index.php?p=".($now-1)."'> < </a>";
          }
          
          for($i=1;$i<=$pages;$i++){
            $fontSize=($i==$now)?"24px":"18px";
            echo "<a href='index.php?p=$i' style='font-size:$fontSize'> $i </a>";
          }
          
          if(($now+1)<=$pages){
            echo "<a href='index.php?p=".($now+1)."'> > </a>";
          }

        ?>


        </div>
      </div>
    </div>