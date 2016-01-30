<?                                
$monthx = array(); // ตัวแปรแกน x
$year1 = array(); //ตัวแปรแกน y
$year2 = array(); //ตัวแปรแกน y

$datearray = array(); //ตัวแปรแกน y
$datar = array(); //ตัวแปรแกน y

$y = date('Y');
$y2 = $y-1;
//sql สำหรับดึงข้อมูล จาก ฐานข้อมูล
$sqlline = "SELECT line.month, line.value, line.id FROM line";
//จบ sql
$resultline = mysql_query($sqlline);
while($row=mysql_fetch_array($resultline)) {
//array_push คือการนำค่าที่ได้จาก sql ใส่เข้าไปตัวแปร array


	$datarate = "SELECT sum(crating) as sumrate,month FROM static_rate WHERE month = '".$row[id]."' AND substr(date,1,4) = '$y' group by month";
   	$qdata = mysql_query($datarate);
	$redatarate = mysql_fetch_array($qdata);
	
	$datarate2 = "SELECT sum(crating) as sumrate,month FROM static_rate WHERE month = '".$row[id]."' AND substr(date,1,4) = '$y2' group by month";
   	$qdata2 = mysql_query($datarate2);
	$redatarate2 = mysql_fetch_array($qdata2);
	
    $sumrate = 0;
    $sumrate2 = 0;
    $sumrate = (int)$redatarate[sumrate];
    $sumrate2 = (int)$redatarate2[sumrate];
    
 array_push($year1,$sumrate);
 array_push($year2,$sumrate2);
 
 array_push($monthx,$row[month]);
 
}


	$adate = date('j');
	$amon = date('m');
	
	$info = cal_days_in_month( CAL_GREGORIAN , $amon , $y ) ;
	
    for($i=1;$i<=$info;$i++){
		
		$dat = sprintf("%02d", $i);
		
		$sqlrate = mysql_query("select * from static_rate where DATE_FORMAT(date,'%d') = '$dat' AND DATE_FORMAT(date,'%m') = '$amon' ORDER BY date DESC");
		$rera = mysql_fetch_array($sqlrate);
		
		$crating = (int)$rera[crating];
		
		
		array_push($datearray,$i);
		array_push($datar,$crating);
	}
	
	
	
?>

        <script>  
    //-----------------------------------------------------------------
    
    $(function () {
    $('#container2').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Rating View  (<?=$amon."/".$y;?>)'
        },
        subtitle: {
            text: 'Source: Kapongdesign.com'
        },
        xAxis: {
            categories: ['<?= implode("','", $datearray);?>']
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rating (View)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">วันที่ {point.key} /<?=$amon."/".$y;?></span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} View</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Visitor View',
            data: [<?= implode(',', $datar) ?>]

        }]
    });
});
        </script>
 
    <body> 
      <div id="container2" style="min-width: 320px; height: 380px; margin: 0 auto"></div>   
    </body>






        
        