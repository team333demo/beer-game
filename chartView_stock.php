<!DOCTYPE html>
<html style="height: 100%">
   <head>
       <meta charset="utf-8">
   </head>
   <body style="height: 100%; margin: 0">
        <?php
        $tid = 1;
        require_once("chartModel.php");
        $result = factory($tid);
        $counter = 0;
        while ($rs = mysqli_fetch_assoc($result)) {
            $period[$counter] = $rs['period'];
            if ($rs['stock'] > 0) {
                $fstock[$counter] = $rs['stock'];
            } else {
                $fstock[$counter] = 0;
            }
            $counter++;
        }
        $p = json_encode($period);
        $fs = json_encode($fstock);

        $result = distributor($tid);
        $counter = 0;
        while ($rs = mysqli_fetch_assoc($result)) {
            if ($rs['stock'] > 0) {
                $dstock[$counter] = $rs['stock'];
            } else {
                $dstock[$counter] = 0;
            }
            $counter++;
        }
        $ds = json_encode($dstock);

        $result = wholesaler($tid);
        $counter = 0;
        while ($rs = mysqli_fetch_assoc($result)) {
            if ($rs['stock'] > 0) {
                $wstock[$counter] = $rs['stock'];
            } else {
                $wstock[$counter] = 0;
            }
            $counter++;
        }
        $ws = json_encode($wstock);

        $result = retailer($tid);
        $counter = 0;
        while ($rs = mysqli_fetch_assoc($result)) {
            if ($rs['stock'] > 0) {
                $rstock[$counter] = $rs['stock'];
            } else {
                $rstock[$counter] = 0;
            }
            $counter++;
        }
        $res = json_encode($rstock);
        ?>
       <div id="container" style="height: 100%"></div>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/echarts.min.js"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts-gl/echarts-gl.min.js"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts-stat/ecStat.min.js"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/extension/dataTool.min.js"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/china.js"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/world.js"></script>
       <script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=ZUONbpqGBsYGXNIYHicvbAbM"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/extension/bmap.min.js"></script>
       <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/simplex.js"></script>
       <script type="text/javascript">
var dom = document.getElementById("container");
var myChart = echarts.init(dom, 'light');
var app = {};
option = null;
option = {
    title: {
        text: '庫存統計圖表'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['factory','distributor','wholesaler','retailer']
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        }
    },
    xAxis: {
        name: "period",
        type: 'category',
        boundaryGap: false,
        data: <?php echo $p; ?>//['0','1','2','3','4','5','6']
    },
    yAxis: {
        name: "數量",
        type: 'value'
    },
    series: [
        {
            name:'factory',
            type:'line',
            lineStyle: {
                normal: {
                    width: 5
                }
            },
            data:<?php echo $fs; ?>//[0,120, 132, 101]
        },
        {
            name:'distributor',
            type:'line',
            lineStyle: {
                normal: {
                    width: 5
                }
            },
            data:<?php echo $ds; ?>//[0,220, 182, 191]
        },
        {
            name:'wholesaler',
            type:'line',
            lineStyle: {
                normal: {
                    width: 5
                }
            },
            data:<?php echo $ws; ?>//[0,150, 232, 201]
        },
        {
            name:'retailer',
            type:'line',
            lineStyle: {
                normal: {
                    width: 5
                }
            },
            data:<?php echo $res; ?>//[0,320, 332, 301]
        }
    ]
};
;
window.onload = myChart.resize;
window.onresize = myChart.resize;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
       </script>
   </body>
</html>