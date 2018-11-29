<?php
$r = intval(htmlspecialchars($_POST['R']));
$g = intval(htmlspecialchars($_POST['G']));
$b = intval(htmlspecialchars($_POST['B']));
$colorAvg=($r+$g+$b)/3;
const fontColorAvg=255/3;
$fontColor="";
if($colorAvg>fontColorAvg){
$fontColor="black";
} elseif($colorAvg<fontColorAvg){
    $fontColor="white";
}elseif($colorAvg===fontColorAvg){
    $fontColor="white";
}



$bg = array('rgb'=>'rgb('.$r.','.$g.','.$b.')','font_color'=>$fontColor);
echo  json_encode($bg);
?>
