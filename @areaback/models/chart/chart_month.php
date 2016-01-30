<?    
require '../../include/config.php';                            
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
$resultline = $dbCon->query($sqlline);
while($row=$resultline->fetch_assoc()) {
//array_push คือการนำค่าที่ได้จาก sql ใส่เข้าไปตัวแปร array


	$datarate = "SELECT sum(crating) as sumrate,month FROM static_rate WHERE month = '".$row[id]."' AND substr(date,1,4) = '$y' group by month";
   	$qdata = $dbCon->query($datarate);
	$redatarate = $qdata->fetch_assoc();
	
	$datarate2 = "SELECT sum(crating) as sumrate,month FROM static_rate WHERE month = '".$row[id]."' AND substr(date,1,4) = '$y2' group by month";
   	$qdata2 = $dbCon->query($datarate2);
	$redatarate2 = $qdata2->fetch_assoc();
	
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
		
		$sqlrate = $dbCon->query("select * from static_rate where DATE_FORMAT(date,'%d') = '$dat' AND DATE_FORMAT(date,'%m') = '$amon' ORDER BY date DESC");
		$rera = $sqlrate->fetch_assoc();
		
		$crating = (int)$rera[crating];
		
		
		array_push($datearray,$i);
		array_push($datar,$crating);
	}
	
	
	
?>
<!--สคริป chart-->
<!--<script type="text/javascript" src="@assets/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
<script src="@assets/highcharts.js"></script>
<script src="@assets/modules/exporting.js"></script>
<!--end สคริป-->
<script>
 $(function () {
        $('#containerrate2').highcharts({
            chart: {
                type: 'line' //รูปแบบของ แผนภูมิ ในที่นี้ให้เป็น line
            },
            title: {
                text: 'สถิติการเข้าชมเว็บไซต์ view จำแนกเป็นเดือน' //
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: ['<?= implode("','", $monthx); //นำตัวแปร array แกน x มาใส่ ในที่นี้คือ เดือน?>']
            },
            yAxis: {
                title: {
                    text: 'จำนวนการเข้าชม (view)'
                },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
            },
            tooltip: {
                enabled: true,
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +'Views';
                }
            },
   legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'top',
                            x: -10,
                            y: 100,
                            borderWidth: 0
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                                name: 'พ.ศ.<? print $y;?>',
                                data: [<?= implode(',', $year1) ?>]
                            },
                            {
                                name: 'พ.ศ.<? print $y-1;?>',
                                data: [<?= implode(',', $year2) ?>]
                            }]
        });
    });
    


/**
 * Dark theme for Highcharts JS
 * @author Torstein Honsi
 */

// Load the fonts
Highcharts.createElement('link', {
   href: '//fonts.googleapis.com/css?family=Unica+One',
   rel: 'stylesheet',
   type: 'text/css'
}, null, document.getElementsByTagName('head')[0]);

Highcharts.theme = {
   colors: ["#2b908f", "#90ee7e", "#f45b5b", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
      "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
   chart: {
      backgroundColor: {
         linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
         stops: [
            [0, '#2a2a2b'],
            [1, '#3e3e40']
         ]
      },
      style: {
         fontFamily: "'Unica One', sans-serif"
      },
      plotBorderColor: '#606063'
   },
   title: {
      style: {
         color: '#E0E0E3',
         textTransform: 'uppercase',
         fontSize: '20px'
      }
   },
   subtitle: {
      style: {
         color: '#E0E0E3',
         textTransform: 'uppercase'
      }
   },
   xAxis: {
      gridLineColor: '#707073',
      labels: {
         style: {
            color: '#E0E0E3'
         }
      },
      lineColor: '#707073',
      minorGridLineColor: '#505053',
      tickColor: '#707073',
      title: {
         style: {
            color: '#A0A0A3'

         }
      }
   },
   yAxis: {
      gridLineColor: '#707073',
      labels: {
         style: {
            color: '#E0E0E3'
         }
      },
      lineColor: '#707073',
      minorGridLineColor: '#505053',
      tickColor: '#707073',
      tickWidth: 1,
      title: {
         style: {
            color: '#A0A0A3'
         }
      }
   },
   tooltip: {
      backgroundColor: 'rgba(0, 0, 0, 0.85)',
      style: {
         color: '#F0F0F0'
      }
   },
   plotOptions: {
      series: {
         dataLabels: {
            color: '#B0B0B3'
         },
         marker: {
            lineColor: '#333'
         }
      },
      boxplot: {
         fillColor: '#505053'
      },
      candlestick: {
         lineColor: 'white'
      },
      errorbar: {
         color: 'white'
      }
   },
   legend: {
      itemStyle: {
         color: '#E0E0E3'
      },
      itemHoverStyle: {
         color: '#FFF'
      },
      itemHiddenStyle: {
         color: '#606063'
      }
   },
   credits: {
      style: {
         color: '#666'
      }
   },
   labels: {
      style: {
         color: '#707073'
      }
   },

   drilldown: {
      activeAxisLabelStyle: {
         color: '#F0F0F3'
      },
      activeDataLabelStyle: {
         color: '#F0F0F3'
      }
   },

   navigation: {
      buttonOptions: {
         symbolStroke: '#DDDDDD',
         theme: {
            fill: '#505053'
         }
      }
   },

   // scroll charts
   rangeSelector: {
      buttonTheme: {
         fill: '#505053',
         stroke: '#000000',
         style: {
            color: '#CCC'
         },
         states: {
            hover: {
               fill: '#707073',
               stroke: '#000000',
               style: {
                  color: 'white'
               }
            },
            select: {
               fill: '#000003',
               stroke: '#000000',
               style: {
                  color: 'white'
               }
            }
         }
      },
      inputBoxBorderColor: '#505053',
      inputStyle: {
         backgroundColor: '#333',
         color: 'silver'
      },
      labelStyle: {
         color: 'silver'
      }
   },

   navigator: {
      handles: {
         backgroundColor: '#666',
         borderColor: '#AAA'
      },
      outlineColor: '#CCC',
      maskFill: 'rgba(255,255,255,0.1)',
      series: {
         color: '#7798BF',
         lineColor: '#A6C7ED'
      },
      xAxis: {
         gridLineColor: '#505053'
      }
   },

   scrollbar: {
      barBackgroundColor: '#808083',
      barBorderColor: '#808083',
      buttonArrowColor: '#CCC',
      buttonBackgroundColor: '#606063',
      buttonBorderColor: '#606063',
      rifleColor: '#FFF',
      trackBackgroundColor: '#404043',
      trackBorderColor: '#404043'
   },

   // special colors for some of the
   legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
   background2: '#505053',
   dataLabelsColor: '#B0B0B3',
   textColor: '#C0C0C0',
   contrastTextColor: '#F0F0F3',
   maskColor: 'rgba(255,255,255,0.3)'
};

// Apply the theme
Highcharts.setOptions(Highcharts.theme);  
</script>

<div id="containerrate2" style="min-width: 320px; height: 380px; margin: 0 auto"></div>







        
        