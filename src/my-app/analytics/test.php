
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/example.css">
</head>
<body>
<header>
<p>
<a>キシバサキ</a>
</p>
<nav class="">
    <ul>
        <li class=""><a href="">ヘルプ</a></li>
        <li class=""><a href="">ログアウト</a></li>
        <li class="" style="border-radius: 50%;"><img src="../asset/img/<?php echo $file_name;?>" ></li>
        <li><a href="../st_reg.php">生徒登録</a></li>
        <li><a href="../tc_reg.php">教師登録</a></li>
    </ul>
</nav>
</header>


<canvas id="myChart"></canvas>
<canvas id="mycanvas"></canvas>
<!-- 生徒数を表示する -->
<p>現在の生徒数は
<h1 id="len"></h1>
</p>名です。

<script src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/moment.js"></script>
<script type="text/javascript" src="../js/Chart.js"></script>
<script type="text/javascript" src="../js/app.js"></script>
<script type="text/javascript" src="../js/chartjs-plugin-streaming.js"></script>
<script>

var ctx = document.getElementById('myChart').getContext('2d');
ctx.canvas.height = 80;
var chart = new Chart(ctx, {
    type: 'line',               // 'line', 'bar', 'bubble' and 'scatter' types are supported
    data: {
        datasets: [{
            data: [],            // empty at the beggining
            label: 'Unknowグラフ',
        }]
    },
    options: {
        scales: {
            xAxes: [{
                type: 'realtime', // x axis will auto-scroll from right to left
            }],
            yAxes: [
        {
          ticks: {
            beginAtZero: true,
            min: 0,
            max: 50
          }
        }
      ]
        },
        plugins: {
            streaming: {            
                duration: 20000,    
                refresh: 1000,      
                delay: 1000,        
                frameRate: 30,      
                pause: false,       

                onRefresh: function(chart) {
                    chart.data.datasets[0].data.push({
                        x: Date.now(),
                        y: get_data()
                    });
                }
            }
        }
    }
});
//初期値0
let a = 0;
function get_data(){
    //get.phpの数字を取りに行く
    $.ajax({
		url: "get_students_id.php",
        method: "POST",
    })
    .done(function(data){
        //成功したら初期値をその数字に変更する
        a = data;
        $('#len').html(data);
    });
    //数字を返す
    return a;
}

</script>
</body>
</html>
