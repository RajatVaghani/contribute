<?php
include '../includes/db.php';


$q = "SELECT con_date AS dd FROM wall WHERE verified=1";


$res = mysqli_query($con, $q);

$arrm = ["01"=>"Jan", "02"=>"Feb", "03"=>"March", "04"=>"Apr", "05"=>"May", "06"=>"June", "07"=>"July", "08"=>"August", "09"=>"September", "10"=>"October", "11"=>"November", "12"=>"December"];

$arr = array();
$i=0;

while($rows = mysqli_fetch_assoc($res)){
    $fulld = $rows['dd'];
    $month = substr($fulld, 0, strpos($fulld, "/"));
    if (!in_array($month, $arr))
    {
        $arr[] = $month;
    }
}







$rs = array();
$rs[0] = ["Month", "Contributions"];
$count =1;


for ($i =0; $i< count($arr); $i++){
    $mo = $arr[$i]."/";
    $query2 = "SELECT COUNT(*) AS coun FROM wall WHERE verified=1 AND con_date LIKE '".$mo."%'";
    $res2 = mysqli_query($con, $query2);
    $rows2 = mysqli_fetch_array($res2);
    //echo $rows2[0];

    $rs[$count] = [$arrm[$arr[$i]], $rows2['coun']];

    $count = $count+1;
}

$json = json_encode($rs);
echo $json;



 ?>
