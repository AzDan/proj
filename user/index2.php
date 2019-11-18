<!DOCTYPE html>
<html>
<head>
<title>Creating Dynamic Data Graph using PHP and Chart.js</title>
<style type="text/css">
BODY {
    width: 550PX;
}

#chart-container {
    width: 220%;
    height:100%;
    border: 1px solid black;
}
#pie-container{
    width:220%;
    height:100%;
    border: 1px solid black;
}
</style>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/Chart.min.js"></script>


</head>
<body>
    <div id="chart-container">
        <canvas id="graphCanvas" height = "280" width = "500"></canvas>
    </div>
    <br>
    <br>
    <div id = "pie-container">
        <canvas id="graphCanvas2" height = "280" width = "500"></canvas>
    </div>
    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    var val = {
                            "1":   "Permission",
                            "2":   "Glass work",
                            "3":  "Whitewash",
                            "4":   "Misc.",
                            "5":   "Gym",
                            "6":   "Insect",
                            "7":   "Construction",
                            "8":   "WaterCooler",
                            "9":   "Fan Regulator",
                            "10":  "Leakage",
                            "11":  "Sanitary",
                            "12":  "WaterTank",
                            "13":  "Switchboard",
                            "14":  "LED,CFL",
                            "15":  "Tubelight",
                            "16":  "Fire Ex",
                            "17":  "Geyser",
                            "18":  "cleaning",
                            "19":  "AC"

                    }
                    //console.log(val);
                    //console.log(data);
                    var val2 = {}
                    for (var i in data){
                        if(data[i].Labels in val2){
                            val2[data[i].Labels] += 1;
                        }
                        else {
                            val2[data[i].Labels] = 1;
                        }
                    }
                    console.log(val);               
                    var type = [];
                    var count = [];
                    for(var i in val){
                        type.push(val[i]);
                        count.push(val2[i]);
                    }     
                    console.log(type);
                    console.log(count);
                    // var  = [];
                    // var marks = [];

                    // for (var i in data) {
                    //     name.push(data[i].student_name);
                    //     marks.push(data[i].marks);
                    // }

                    var chartdata = {
                        labels: type,
                        datasets: [
                            {
                                label: 'Complaints Number',
                                backgroundColor: ['#e06a55','#e37e36','#ebcc1e','#a0eb1e','#0acc68','#12dba5','#0dcad4','#097db3','#740cc9','#e80cf7','#b30b59','#c9102f','#e3c646','#b6d411','#74e324','#0ecfa2','#1088eb','#a027e6','#9e0566'],
                                borderColor: '#000000',
                                hoverBackgroundColor: '#CCCCCC',    
                                hoverBorderColor: '#666666',
                                data: count,
                                borderWidth:2,
                                barPercentage: 0.5
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");
                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        options: {
                          responsive: true,
                          maintainAspectRatio: false
                        }
                    });
                    var graphTarget2 = $("#graphCanvas2");
                    var barGraph2 = new Chart(graphTarget2, {
                        type: 'doughnut',
                        data: chartdata,
                        options: {
                          responsive: true,
                          maintainAspectRatio: false
                        }
                    });
                });
            }
        }
        </script>

</body>
</html>