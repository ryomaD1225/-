$(document).ready(function(){
	$.ajax({
		url: "../analytics/get_graph.php",
		method: "GET",
		dataType: 'json',
		success: function(data) {
			var len = data.length;
			$('#len').html(len);
			var Student = [];
			var times = [];

			for(var i in data) {
				Student.push("Student " + data[i].student_id);
				console.log(data);
				times.push(data[i].button);
			}

			var chartdata = {
				labels: Student,
				datasets : [
					{
						label: 'Students unknow Score',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: times
					}
				]
			};

			var ctx = document.getElementById('mycanvas').getContext('2d');
			ctx.canvas.height = 50;
			// var ctx = $('#mycanvas')[0].getContext('2d');

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata,
				options: {
					scales: {
						//縦軸の設定
						yAxes: [{
							ticks: {
								//最小値を0にする
								beginAtZero: true
							}
						}]
					}
				}
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
