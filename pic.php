<?php 
include_once("db.ini");
$result = mysql_query("SELECT Count(*) as man FROM question Where Gender='1'");
$row=mysql_fetch_array($result);
$result1 = mysql_query("SELECT Count(*) as woman FROM question Where Gender='2'");
$row1=mysql_fetch_array($result1);
$result2 = mysql_query("SELECT Count(*) as adult FROM question Where Age >= '18' AND Age < '24'");
$row2=mysql_fetch_array($result2);
$result3 = mysql_query("SELECT Count(*) as young  FROM question Where Age >= '24' AND Age < '40'");
$row3=mysql_fetch_array($result3);
$result4 = mysql_query("SELECT Count(*) as strong FROM question Where Age >= '40'");
$row4=mysql_fetch_array($result4);
$result5 = mysql_query("SELECT Count(*) as health FROM question Where total >= '10' AND total<'16'");
$row5=mysql_fetch_array($result5);
$result6 = mysql_query("SELECT Count(*) as little FROM question Where total >= '16' AND total<'25'");
$row6=mysql_fetch_array($result6);
$result7 = mysql_query("SELECT Count(*) as lot FROM question Where total >= '25' AND total<'33'");
$row7=mysql_fetch_array($result7);
$result8 = mysql_query("SELECT Count(*) as heavy FROM question Where total >= '33' AND total<= '40'");
$row8=mysql_fetch_array($result8);
$result9 = mysql_query("SELECT Count(*) as Minor FROM question Where Age < '18' ");
$row9=mysql_fetch_array($result9);

// content="text/plain; charset=utf-8"
require_once ('jpgraph-4.2.6\src\jpgraph.php');
require_once ('jpgraph-4.2.6\src\jpgraph_pie.php');

$data = array($row['man'],$row1['woman']);
$data1 = array($row9['Minor'],$row2['adult'],$row3['young'],$row4['strong']);
$data2 = array($row5['health'],$row6['little'],$row7['lot'],$row8['heavy']);

// Create the Pie Graph. 
$graph = new PieGraph(400,450);
$graph->SetColor('#b7e2dc');
$graph->SetShadow();


// Set A title for the plot


// Create
$size=0.13;
$p1 = new PiePlot($data);
$graph->Add($p1);

$p1->title->Set("Gender");
$p1->SetSize($size);
$p1->SetCenter(0.25,0.25);
$p1->SetSliceColors(array('blue','pink'));
$legend = array('Male','Female');
$p1->SetLegends($legend);


$p2 = new PiePlot($data1);
$graph->Add($p2);

$p2->SetSize($size);
$p2->SetCenter(0.75,0.25);
$p2->SetSliceColors(array('#ffaf03','#2970db','#2E8B57','#ADFF2F'));
$p2->title->Set("Age");
$legend1 = array('18↓','18~23','24~39','40↑');
$p2->SetLegends($legend1);

$p3 = new PiePlot($data2);
$graph->Add($p3);

$p3->SetSize($size);
$p3->SetCenter(0.5,0.6);
$p3->SetSliceColors(array('#00FA9A','#4682B4','#9370DB','#ae00ff'));
$p3->title->Set("Brain Fog");
$legend2 = array('health','a little fog','little fog','heavy fog');
$p3->SetLegends($legend2);
$graph->Stroke();

?>