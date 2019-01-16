<?php 
include_once("db.ini"); 
$Gender=$_REQUEST['0']; 
$Age=$_REQUEST['1'];
$Num1=$_REQUEST['2'];
$Num2=$_REQUEST['3'];
$Num3=$_REQUEST['4'];
$Num4=$_REQUEST['5'];
$Num5=$_REQUEST['6'];
$Num6=$_REQUEST['7'];
$Num7=$_REQUEST['8'];
$Num8=$_REQUEST['9'];
$Num9=$_REQUEST['10'];
$Num10=$_REQUEST['11'];
$Num11=$_REQUEST['12'];
	$result=mysql_query("insert into `question` (`Gender`,`Age`,`1`,`2`,`3`,`4`,`5`,`6`,`7`,`8`,`9`,`10`,`total`) values ('$Gender','$Age','$Num1','$Num2','$Num3','$Num4','$Num5','$Num6','$Num7','$Num8','$Num9','$Num10','$Num11')");
?>
<script>
function goBack(){
    window.history.go(-1)
}

</script>