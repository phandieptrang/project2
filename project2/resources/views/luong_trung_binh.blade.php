<!DOCTYPE HTML>
<html>
<head>
    <title>Thống kê lương</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/boostrap.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}"/>
<script>
window.onload = function () {

var options = {
	animationEnabled: true,
	title: {
			text: ""
	},
	axisY: {
		title: "Lương (VND)",
		// suffix: "%",
		includeZero: false
	},
	axisX: {
		// title: "Tháng"
		@foreach($array_luong as $luong)
			title: "Biểu đồ thể hiện trung bình lương hàng tháng của tất cả giảng viên năm {{$luong->nam}} ",
		@endforeach
	},
	data: [{
		type: "column",
		// yValueFormatString: "#,##0.0#"%"",
		dataPoints: [
			@foreach($array_luong as $luong)
				{ label:"Tháng {{$luong->thang}}", y: {{$luong->luong}} },
			@endforeach

		]
	}]
};
$("#chartContainer").CanvasJSChart(options);

}
</script>
</head>
<body>
    @include('menu')
	<br><br><br>
	<a href="/project2/public/giao_vu/thong_ke_luong_ca_nhan">
		<button style="height: 40px;width: 15%;color: white;background:black;border-radius: 5px">
			Lương chi tiết tháng này >>>
		</button>
	</a>
	<br><br><br><br>
<div id="chartContainer" style="height: 550px; width: 90%;float:left;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>
