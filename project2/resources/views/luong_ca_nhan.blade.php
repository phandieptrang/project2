<!DOCTYPE HTML>
<html>
<head>
	<title>Bảng lương</title>
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
			title: "Lương tháng {{$luong->thang}} của tất cả giảng viên năm {{$luong->nam}} ",
		@endforeach
	},
	data: [{
		type: "column",
		// yValueFormatString: "#,##0.0#"%"",
		dataPoints: [
			@foreach($array_luong as $luong)
				{ label:"{{$luong->ten_dang_nhap}}", y: {{$luong->luong}} },
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
	<br><br><br><br>
<div id="chartContainer" style="height: 600px; width: 100%;float: left;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>
