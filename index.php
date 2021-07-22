<?php
       $strArr = [
        "人生最美好的東西，就是他同別人的友誼。",
        "永遠記住，你自己決心成功比其它什麼都重要。",
        "記住，當人生的道路陡峭的時候，要保持沉著。",
        "不要有懷才不遇的想法。懷才不遇多半是自己造成的。",
        "人生最美好的東西，就是他同別人的友誼。",
        "永遠記住，你自己決心成功比其它什麼都重要。",
        "記住，當人生的道路陡峭的時候，要保持沉著。",
        "不要有懷才不遇的想法。懷才不遇多半是自己造成的。",
        "人生最美好的東西，就是他同別人的友誼。",
        "永遠記住，你自己決心成功比其它什麼都重要。",
        "記住，當人生的道路陡峭的時候，要保持沉著。",
        "不要有懷才不遇的想法。懷才不遇多半是自己造成的。"
];

if(empty($_GET['year']) && empty($_GET['month'])){
$now = time();
$month = date('m',$now);
$year = date('Y',$now);
}else{
$month = $_GET['month'];
$year = $_GET['year'];
}
$firstDayMonth = mktime(0,0,0,$month,1,$year);

    $days = date('t',$firstDayMonth);
 
    $firstDayWeek = date('w',$firstDayMonth);

if($month == 1){
    $preYear = $year - 1;
    $preMonth = 12;
}else{
    $preYear = $year;
    $preMonth = $month - 1;
}

if($month == 12){
    $nextYear = $year + 1;
    $nextMonth = 1;
}else{
    $nextYear = $year;
    $nextMonth = $month + 1;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆作業</title>
</head>
<style>
body{
    background: url('https://images.unsplash.com/photo-1553451193-d4d44c036555?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80') no-repeat;
    background-size:100% 200%;

    
}
th{
    background: rgb(238, 148, 148);
    color:white;
}
    td {
        height: 70px;
        width: 70px;
        text-align: center;
        background: rgb(93, 240, 191);
        color:black;
        font-size:22px;
    }
    td.bb {
        background: rgb(235, 10, 160);
        color:white;
    }
    td:hover:not(.bb) {
    background: rgb(86, 153, 240);
	color:yellow;
    border-radius: 50px;

      
    }
    .center {
        color: rgb(18, 245, 48);
        margin: auto;
        text-align: center;
        font-weight: bold;
        font-size: 20px;
    }
    #box1 {
        border: 2px solid black;
        border-radius: 25px;
    }
    a { 
        text-decoration: none;
        color: blue;
        font-size: 20px;
        margin: 50px ;
        padding: 60px;
    }

    a:hover {
        color: red;
        text-decoration: none;
        cursor: pointer;
    }
    h3 {
        font-family: Verdana;
    }
    th.cc{
        color: red;
    }
    tbody td:nth-child(7n), tbody td:nth-child(7n+1){
    color: red;
  }
</style>
<body>
<div class="center">
    <h3>萬年曆</h3>
    <?php
    $changeMonth = str_pad($month,2,"0",STR_PAD_LEFT);
    ?>
    <h3 style="margin-bottom:18px"><?= $year."&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;". $changeMonth?></h3            >
    </div>
    <div class="center">
    <a href="./index.php?year=<?= $preYear;?>&month=<?= $preMonth;?>">上個月</a>   
    <a href="./index.php">現在</a>   
    <a href="./index.php?year=<?= $nextYear;?>&month=<?= $nextMonth;?>">下個月</a>   
    </div>
    <br>
    <table class="center" border="2px"  width="50%" >
    <tr>
    <th class="cc">星期日</th>
    <th>星期一</th>
    <th>星期二</th>
    <th>星期三</th>
    <th>星期四</th>
    <th>星期五</th>
    <th class="cc">星期六</th>
    </tr>
    <?php for($i=1;$i<=6;$i++):?>
    <tr>
    <?php for($j=1;$j<=7;$j++){
         $dayStr = (($i-1)*7+$j) - $firstDayWeek;
         if($i == 1){ 
             if($dayStr>0){
                
                echo "<td>$dayStr</td>";
             }else{
             
                 echo "<td></td>";
             }
         }else{
            
             if($dayStr <= $days){
                 echo "<td>$dayStr</td>";
             }else{
                 if($j == 1){
                     break;
                 }
                 echo"<td></td>";
             }
         }  
        }
    
    ?>
    
</tr>
<?php endfor;?>

<tr>
     <th class="bb" colspan="7" id="box1"><?= $strArr[$month - 1];?></th>
     </tr>
    </table>

</body>
</html>