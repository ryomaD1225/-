<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
</head>
 <body>
<div id="real-time-line" class="epoch" style="height: 500px"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="/js/d3.v3.min.js"></script>
<script src="/js/epoch.min.js"></script>
<script src="/js/data.js"></script>
<script>
    
$(function() {
    var data = new RealTimeData(2);

    var chart = $('#real-time-line').epoch({
        type: 'time.line',
        data: data.history(),
        axes: ['left', 'bottom', 'right']
    });

    setInterval(function() { chart.push(data.next()); }, 1000);
    chart.push(data.next());
});
</script>



</body>
</html>