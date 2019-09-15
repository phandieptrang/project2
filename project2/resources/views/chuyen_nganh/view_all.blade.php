<!DOCTYPE html>
<html>
<head>
	<title>Chuyên ngành</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/boostrap.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}"/>
	<script src="{{asset('js/jquery.js')}}"></script>
	<style type="text/css">
		a{
			text-decoration: none;
		}
		button{
	   	width: 15%;
	   	height: 40px;
	   	color: white;
	   	background: black;
	   	border-radius: 5px
	   }
	   table {
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 90%;
		}

		td, th {
		  border: 1px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even) {
		  background-color: #dddddd;
		}
	</style>
</head>
<body>
    @include('menu')

	<center>
	<h1>Danh sách chuyên ngành</h1>
	<div style="width: 100%">
	<table width="100%" border="1">
		<caption>
			<button style="background: black;height: 30px">
				<a style="color: white; text-decoration:none;cursor: pointer;" href="{{route('chuyen_nganh.view_insert')}}">
					Thêm Chuyên Ngành
				</a>
			</button>
		</caption>
		<tr style="background: lightgray">
			<th style="width: 30%">STT</th>
			<th style="width: 70%">Tên chuyên ngành</th>
		</tr>
		</table>
	</div>
	<div  style="height: 440px;width:100%;overflow: auto">
		<table width="90%" border="1">
		@foreach ($array_chuyen_nganh as $chuyen_nganh)
			<tr>
				<td style="width: 30%">{{$chuyen_nganh->ma_chuyen_nganh}}</td>
				<td style="width: 70%">{{$chuyen_nganh->ten_chuyen_nganh}}</td>
			</tr>
		@endforeach
	</table>
</div>
</center>
</body>
</html>
