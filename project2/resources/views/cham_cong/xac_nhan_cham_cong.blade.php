<!DOCTYPE html>
<html>
<head>
    {{-- @php
     dd(Request::old("chuyen_nganh"));
    @endphp --}}
	<title>Xác Nhận Chấm Công</title>
	<link rel = "icon" type = "image/png" href = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAkFBMVEX///8SYoYAW4Ht8/YAWH/09/mhusmGrL5elqsAVn9Si6YAXYIPYIUAWH76/P33+vvi6+/G1t/a5evU4OccZ4ksbY8AUXtqlKs+d5Wows9biqRwmrC6z9hMfpqXtMTL2eF6ore/09w3cpKzydWlwM2PscFSg56LsMBfjaeDprt/rL9RjadEf5p2nbEka4tulq44PgBXAAAKXklEQVR4nO2d6ZqiOhCGOwH0OEkDAiruu6Mz6tz/3Z1EbVGEkLWFfvL+nknzSWpJUik+PiwWi8VisVgsFovFYrFYLBaLxWKxXAl8o8N7UWB0fI4nGLaMDr9YOCbH53mEGR6ae4vh2G2/XWGrn8xMTaRw5H7WQKGL8cEzMvZ8CgGsgcIOwHhs4jEmKwhqohBgNAh1DxwMe0RgXRQCDEeR5nG3CQI1UgiAO53rHNZZ4IvAGinE7nGpb9RogDComULyLKu1rsAY71wM6qcQwN5Gi0S/O70LrJdCgJKthtjvX51oLRUCmPxWfh6vdUagtgoBwqqJstNOHgXWTiFxqWqxPxwjDGqtkDzSPpYfLd5DDOquEMOdbOynThSA2isE4HPXlYoa/jqF+bHqqRC46URCorfpoZehaqqQpDdD4cDobJPXN1hbhQCdZ4KL4nABCt5gfRWSpxV6Mj8a5J1o3RUSiQf+wOh3dyUCa6yQrPvHvItif/KQajdHIU1v+CR6w4Io0QSFJGqM5hxRw9meywXWXCF2d8tKieGh2Ik2QiHJ4I7risAYjXGZCTZB4SX2swKjP9+X+piGKCQSW+WPGCx3FQIboBCgpPQZvaJUu3kKAcYlsd953q9orkJ6rFEUGMPcfkWDFdJjjdd1f1SSajdSIQmM+1zs9+OyVLuZCum6f/kYGIPu6GW/ouEKAUwfYn/A4UQbp5BIvMd+Z8MtsEkKs9jPTrUbrJAea9CnLduv+AEKL+t+P87vav8khST2L9aDqky00QpJ7Id8YbCxCoGYvJoo7As/tQD4/VVffncq5DkEBcLp5N21iWSZPhKfe7wC8UjukEcz0ZhnGSQBSri3XA0Ttnv8SQo3GK7UqwJ04bVSwSDAI3AqfoBljmCt299gMOq+W9UTfnfE3vcUBCWLmphgRqzT38DVtjYmmKHP32A0rdoqfw90YatjpmIwqEUULCBYlx50CoDO9TPBO/58r+pvSBSc1dAEM1TzG2qCZgr/tREeVPwNqq8JZjgK+Q3sHeprghkkv5GTiGHKOImrE5L5TW2jYAF+PBbZMLzSCBPMCA8cR4NPNMQEM5yZkL9pjglmeCL+BuPR+7djhPGX3P4GgTFPaVH94PQ3mJig9ptv3wTJb6olNtEEM6i/qRKImmiCGd5wypaIkrHC5YU6EExY/oYsldpNNcEMhr8hJrhprglmRGX+BqP9pOZrQU6c1qoo+KPk1HATzCj0N3C1bb4J3gmWo9yWON2z/wkmmBEPnvxNMxNRNtHjegqdT3EjE1Em4WwF71Fw9oNMMMO5+ZufZ4J3rv4G4/3yp5lgxnwA3PPix0TBIqLD7u0maHg7qPvH7B/wqi/p/FmbfIDocDSayTjtv5X/5m9P5g4vJ2Sd4Zo8vg4PnV+V/+i/frox9Pf97p76UmBszRufoMuh0EVJy4g3927npxgNzOysdfcQcCkECJs4o8zOwDEamYiI6yOZITwKPxn3eBTIkjYzZzDBJqV5L987pI9w0izx+SADuynz0p443uw6Pq9CkjsW3ONR4GWzRvMmadi+1UdyztLLAmekr3cXcaIvG26op7EmKDp9FYByv0M6UXcTTX/fn+wKit7QWdtG4vzeGUxEIZGY6klvynaFtZWurXeZBQjMUvoIEv07XnEenOgzGOuI/cEwfZghIu/wYiui/TteCdvlpzMY7JWN3Zs9jS+okN7hVZQYnVgVRBiq1nE7h+fxRRWSX1kp9vvzAWaer2G4UyqBiha5KnoxO7w8AlZwB8VO9BmkEvvn//JRSPgdXkohZd0BPcqv0Hc9nZGVWHCOLqGQ7hzJFVzzln/JFiP6JNV+GUx8llLkYn+45S3hk4v9XistMAGZd0gf4TgUfoBowV8zhCViv9MuHF9SIUYr0b6duXOKKonC6/7wUHwVSW6WAjqRhJYC/stZU6XE/IV9NvN/JXetJN/hRaLALTmJ+kuS6FfvA94pL36UVyjSu4vZ96lUosA9vPWu9PdTUEhmxYnPHZSn2mwgZ+y/7VfIKyy0w6vEAU+eLF54+QViNeu548x6DAtQeYfX+46V/1+mePYusVcd+8NDwjJxNYVEYmXsV7twgXpV/izbr5BXWDpLLxqnzHV/wJFqsyWeF0x/VrDhI66Q3VUFp4zYL+VEc+MDVqM+4kQrfkB1hQCvSr/XUVIZJCixqB/RFX+YVg6vPEsBnUgl24Bc1aQcEsvub3uzVfXvp+Ed0q2NwthPfICeG5Y09hdIDA88N6q0KKSx/0WiP99ru5WPn/oR3X9AZpT4Qo9CuhTIuQN/qfWmM0xbufRmPuD7AXXYIQXjwVPsD3j2K0SAuT3/CW/fBk3vkLJ7CIyymSiDp16E/vDIO0E0KnyI/c5WixN9BiX32B+0OJzoDV2zlHKP/eFJNtVmgr5iP/kB+TNBje/wEvupO4gHWlsNPIx/PeALF1xO9IZehbh3cD66ipkoC7TrfsRl+xXF6Jyl4GIrm6mZxi1X4LQt2PxG6zsENDCuTAqk+4yC/0HzOwQSna0EEbXxTw6FQq27hEHIYFcpQqe6rq2biL1EIbC7Xx+QwYn9mVR/OMyfH0UsUQiEx7EfFn/HQgudX1z7yvG+b+bvk5UlTVNEensKgfu8xx/hwUiTOZjeCtgDxqcQVMaH/CcPTgtqtxXsZuV61Z3YJXBXItfEvLVuf3MxwewPcDaCFqDzS+yOit/V62/gOVf8rNnf4A57F7KISKe/KShFdDYa15QiJvjwK7d1+Rtigt3XHUjqb/SMD9zeUqrYwZm5Wn7lnAneIf5GT6O+/l72mhjxNxokwqS0zDISaylcDO4r1DgG3VR1ImGX1feJ7+MBTCBQuyammt/gio/peKr+xk1Vb2qGi47KaRmoyqOCyVEl+MubYIaKv4FlRxwP+PORtETc0VJm7K2BnETsplx1h8TfyBmjqgneCZYrGX+DIdf3rD54z1xecFNt91L8+Jf4wh/hRchrIk5L4FMCN7AOE8wIF6L5DRQqogrWomEJ9jXf8nNmHaGJJOrE/Xnlh5+eBSbaL0t7Q4H8ht8EM4TyGzctSHRVCbo93okkYoIZDvsLc4/095GR633xX778Bp7lan6dGZ+/0W6CGeGJx9/I51HBmieF+9RvghnO70p3IGOCd/zurtIS3KMBE8xwhqiisRUQ3014wA8rvnOF+5xf/pQmWPZYW1SwJ32z4Abb3yDXfJtvn+Vv4FH9prvH8Def52/pMUzym5IZBEc68ih/WHaLoXP8pu6Kzu/CJSONglrGpzuZRX+g/+/bGpw6rYL1FOzli3zkifev+Q3qfGeb72ByzvsbspTRmunnr7y5ve9t8+3Hx6f1FIaanbi3fV4yiu7ZayB6zG8YH1OV5cnf4L7u9gA8PPgbYoIG0ozl8UsihO/52IWzufkbvSaYEY2u+Y2bvKvTfjChR3AY7k3NIOeyZOzznVwbwZ8fycrf4FfDiL9x+5qirCTRIBG9tieEv0nf/bGL0HD3wyB+e++6n9f90GKxWCwWi8VisVgsFovFYrFYLBbLu/gfAE3EALexiuQAAAAASUVORK5CYII=">
	<meta charset='utf-8' />
	<link href="{{asset('css/core/main.css')}}" rel='stylesheet' />
	<link href="{{asset('css/daygrid/main.css')}}"  rel='stylesheet' />
	<link href="{{asset('css/list/main.css')}}" rel='stylesheet' />
	<script src="{{asset('js/core/main.js')}}"></script>
	<script src="{{asset('js/interaction/main.js')}}"></script>
	<script src="{{asset('js/daygrid/main.js')}}"></script>
	<script src="{{asset('js/list/main.js')}}"></script>
	<script src="{{asset('js/google-calendar/main.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('css/boostrap.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}"/>
	<script src="{{asset('js/jquery.js')}}"></script>

	<style>

		table {
		  font-family: arial, sans-serif; */
		  border-collapse: collapse;
		}

		td, th {
		  border: 1px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even) {
		  background-color: #dddddd;
		}
	  body {
	    margin: 40px 10px;
	    padding: 0;
	    font-size: 14px;
	  }

	  #loading {
	    display: none;
	    position: absolute;
	    top: 10px;
	    right: 10px;
	  }

	  #calendar {
	    max-width: 400px;
	    margin: 0 auto;
      }
	   .btn{
	   	width: 15%;
	   	height: 30px;
	   	color: white;
	   	background: black;
	   	border-radius: 5px
	   }
	   .btn1{
	   	width: 20%;
	   	height: 30px;
	   	color: white;
	   	background: black;
	   	border-radius: 5px
	   }
	</style>
</head>
<body>
    @include('menu')
		<h1 align="center">Xác Nhận Chấm Công</h1>
		<div style="height: 100%;width: 100%">
			<div style="height: 100%;width:30%;float: left">
				<form action="{{route('cham_cong.get_cham_cong_by_search')}}" >
				<div >
					<div class="form-group">
						<label>Chọn Ngành</label>
						<select id="chuyen_nganh" name="ma_chuyen_nganh" class="form-control">
							<option value="">--Chọn Chuyên Ngành--</option>
							@foreach($array_chuyen_nganh as $chuyen_nganh)
								<option value="{{$chuyen_nganh->ma_chuyen_nganh}}">
									{{$chuyen_nganh->ten_chuyen_nganh}}
								</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Chọn Môn</label>
						<select id="mon" class="form-control" name="ma_mon">
							<option value="">--Chọn Môn--</option>

						</select>
					</div>
					<div class="form-group">
						<label>Chọn Lớp</label>
						<select id="lop" class="form-control" name="ma_lop">
							<option value="">--Chọn Lớp--</option>

						</select>
					</div>
					<div class="form-group">
						<label>Chọn Giảng Viên</label>
						<select id="giang_vien" class="form-control" name="ma_giang_vien">
							<option value="">--Chọn Giảng Viên--</option>

						</select>
					</div>
					<div class="form-group">
						<label>Tình Trạng</label>
						<select id="tinh_trang" class="form-control" name="tinh_trang">
                            <option value="">--Chọn tình trạng--</option>
							<option value="0" selected="selected">Chưa xác nhận</option>
							<option value="1">Đã xác nhận</option>
						</select>
					</div>
				</div>
				<div >

					<div id='loading'>loading...</div>

					<div id='calendar'>
						<input class="form-control" type="text" name="ngay" id="ngay" pattern="[0-9-]+" maxlength="10" placeholder="yyyy-mm-dd">
					</div>

					<div class="form-group" id="button">
						<button type="submit" class="btn1"> Search</button>
					</div>

				</div>
				</form>
			</div>

			<h3 align="center">Bảng Chấm Công</h3>
				<div id="" style="height: 100%;width:70%;float: left ; text-align: center">
				<a href="{{route('cham_cong.xac_nhan_tat_ca_cham_cong')}}">
					<input class="btn" align="center" type="button"value="Xác nhận tất cả" style="float:left;margin-left: 50px;color: white;background: black">
				</a>
				<a href="{{route('cham_cong.get_cham_cong_chua_xac_nhan')}}">
					<input class="btn" align="center" type="button"value="Chưa xác nhận" style="float:right;margin-right: 5%;color: white;background: black">
				</a>
				<a href="{{route('cham_cong.get_cham_cong_da_xac_nhan')}}">
					<input class="btn" align="center" type="button"value="Đã xác nhận" style="float:right;margin-left: 100px;color: white;background: black;margin-right: 5px ">
				</a>
				<br><br>
			<center>
				@if(isset($array_tinh_cham_cong) && $array_tinh_cham_cong!=null && $array_tinh_cham_cong->soHLam!=null)
					<div id="so_h_dm_mon" style="float: right;margin-right: 200px">
						<h4 style="color: red">
							Môn : {{$array_tinh_cham_cong->ten_mon}} /
							Số giờ đã chấm công :{{$array_tinh_cham_cong->soHLam}} h /
							Số giờ định mức môn :{{$array_tinh_cham_cong->thoigiandinhmuc}} h
						</h4>
					</div>
				@endif

				<div style="width: 100%;float: left;">
					<table border="1" width="90%" align="center">
						<tr style="background: lightgray">
							<th style="width: 20%">Ngày</th>
							<th style="width: 10%">Lớp</th>
							<th style="width: 20%">Môn</th>
							<th style="width: 12%">Số giờ làm</th>
							<th style="width: 18%">Giảng viên</th>
							<th>Tình trạng</th>
						</tr>
					</table>
				</div>
				<div style="height: 400px;width:90%;overflow: auto;float: center;">
					<table  border="1" width="100%" align="center">
					@foreach($array_cham_cong as $cham_cong)
						<tr>
							<td style="width: 20%">
								<?php
									echo date('D', strtotime($cham_cong->ngay));
								?>/
								<?php
									echo date('d', strtotime($cham_cong->ngay));
								?>/
								<?php
									echo date('m', strtotime($cham_cong->ngay));
								?>/
								<?php
									echo date('Y', strtotime($cham_cong->ngay));
								?>
							</td>
							<td style="width: 10%">{{$cham_cong->ten_lop}}</td>
							<td style="width: 20%">{{$cham_cong->ten_mon}}</td>
							<td style="width: 12%;text-align: center;">
								<?php if ($cham_cong->tinh_trang == 1): ?>
									{{$cham_cong->so_h_lam}}
								<?php else: ?>
									<input type="text" class="form-control so_h_lam" value="{{$cham_cong->so_h_lam}}" data-href="{{route('cham_cong.process_update_cham_cong',['ma'=> $cham_cong->ma_giang_vien,'ngay'=>$cham_cong->ngay,'ma_mon'=>$cham_cong->ma_mon])}}">
								<?php endif ?>

							</td>
							<td style="width: 18%">{{$cham_cong->ten_giang_vien}}</td>
							<td style="width: 20%;text-align: center;">
								<?php if ($cham_cong->tinh_trang == 1): ?>
									<img src="https://icon-library.net/images/check-icon-png/check-icon-png-14.jpg" height="20px" width="20px">
								<?php else: ?>
									<a href="{{route('cham_cong.process_update_cham_cong',['ma'=> $cham_cong->ma_giang_vien,'ngay'=>$cham_cong->ngay,'ma_mon'=>$cham_cong->ma_mon,'so_h_lam'=>$cham_cong->so_h_lam])}}">
										<img src="https://cdn2.iconfinder.com/data/icons/color-svg-vector-icons-part-2/512/erase_delete_remove_wipe_out-512.png" height="20px" width="20px">
									</a>
								<?php endif ?>
							</td>
						</tr>

					@endforeach
				</table>
			</div>
		</center>
			</div>
		</div>
</body>
{{-- <pre>
@php
	var_dump(Session::get("_old_input"));
@endphp
</pre> --}}
<!-- search -->
<script src="{{asset('js/select2.js')}}"></script>
<script type="text/javascript">
	   	$(document).ready(function() {
	   		$(".so_h_lam").change(function(){
	   			var confirm2;
	   			confirm2=confirm("Chắc chắn thay đổi số giờ làm?");
	   			if(confirm2){
	   				var href=this.getAttribute("data-href");
	   				href=href+"&so_h_lam="+this.value;
	   				window.location.href=href;
	   			}
	   		})

			$("#chuyen_nganh").select2();
			$("#chuyen_nganh").change(function(){
				$('#mon').val(null).trigger('change');
				$('#lop').val(null).trigger('change');
			})
			$('#mon').select2({
				ajax: {
				    url: '{{ route('phan_cong.get_mon_by_chuyen_nganh') }}',
				    dataType: 'json',
				    data: function () {
				        return {
				            ma_chuyen_nganh: $("#chuyen_nganh").val()
				        }
				    },
				    processResults: function (data) {
				      	return {
							results: $.map(data, function (item) {
								return {
									text: item.ten_mon,
									id: item.ma_mon
								}

							})
						};
				    }
				}

			});
			$('#lop').select2({
				ajax: {
				    url: '{{ route('phan_cong.get_lop_by_chuyen_nganh') }}',
				    dataType: 'json',
				    data: function () {
				        return {
				            ma_chuyen_nganh: $("#chuyen_nganh").val()
				        }
				    },
				    processResults: function (data) {
				      	return {
							results: $.map(data, function (item) {
								return {
									text: item.ten_lop,
									id: item.ma_lop
								}
							})
						};
				    }
				},

			});
			$('#giang_vien').select2({
				ajax: {
				    url: '{{ route('phan_cong.get_giang_vien_by_chuyen_nganh') }}',
				    dataType: 'json',
				    data: function () {
				        return {
				            ma_chuyen_nganh: $("#chuyen_nganh").val()
				        }
				    },
				    processResults: function (data) {
				      	return {
							results: $.map(data, function (item) {
								return {
									text: item.ten_giang_vien,
									id: item.ma_giang_vien
								}
							})
						};
				    }
				},

			});

		});
		$(document).ready(function () {
			$("#chuyen_nganh").val("{{Session::get('_old_input')['ma_chuyen_nganh']}}").trigger("change");
			// $("#mon").val(11).trigger("select2:select");

			$.ajax({
				type: "get",
				url: "{{ route('phan_cong.get_mon_by_chuyen_nganh') }}",
				data: {"ma_chuyen_nganh":$("#chuyen_nganh").val()},
				success: function (response) {
					for (let index = 0; index < response.length; index++) {
						// console.log(response[index].ma_mon);
						if(response[index].ma_mon=="{{Session::get('_old_input')['ma_mon']}}"){
							// console.log(response[index]);
							var newOption = new Option(response[index].ten_mon,response[index].ma_mon, true, true);
							$('#mon').append(newOption).trigger('change');
						}

					}

				}
			});

			$.ajax({
				type: "get",
				url: "{{ route('phan_cong.get_lop_by_chuyen_nganh') }}",
				data: {"ma_chuyen_nganh":$("#chuyen_nganh").val()},
				success: function (response) {
					for (let index = 0; index < response.length; index++) {
						if(response[index].ma_lop=="{{Session::get('_old_input')['ma_lop']}}"){
							var newOption = new Option(response[index].ten_lop,response[index].ma_lop, true, true);
							$('#lop').append(newOption).trigger('change');
						}

					}

				}
			});


			$.ajax({
				type: "get",
				url: "{{ route('phan_cong.get_giang_vien_by_chuyen_nganh') }}",
				data: {"ma_chuyen_nganh":$("#chuyen_nganh").val()},
				success: function (response) {
					for (let index = 0; index < response.length; index++) {
						// console.log(response[index].ma_giang_vien);
						if(response[index].ma_giang_vien=="{{Session::get('_old_input')['ma_giang_vien']}}"){
							var newOption = new Option(response[index].ten_giang_vien,response[index].ma_giang_vien, true, true);
							$('#giang_vien').append(newOption).trigger('change');
						}

					}

				}
			});
			$("#tinh_trang").val("{{Session::get('_old_input')['tinh_trang']}}");
			$("#ngay").val("{{Session::get('_old_input')['ngay']}}");
			// $("#mon").select2({
			// 	ajax: {
			// 	    url: '{{ route('phan_cong.get_mon_by_chuyen_nganh') }}',
			// 	    dataType: 'json',
			// 	    data: function () {
			// 	        return {
			// 	            ma_chuyen_nganh: $("#chuyen_nganh").val()
			// 	        }
			// 	    },
			// 	    processResults: function (data) {
			// 			console.log("vao");
			// 	      	return {
			// 				results: $.map(data, function (item) {
			// 					if(item.ten_mon==11){
			// 						return {
			// 							text: item.ten_mon,
			// 							id: item.ma_mon,
			// 							selected:true
			// 						}
			// 					}
			// 					else{
			// 						return {
			// 							text: item.ten_mon,
			// 							id: item.ma_mon,
			// 							selected:true
			// 						}
			// 					}

			// 				})
			// 			};
			// 	    }
			// 	}
			// });
			// $('#mon').val(11).trigger('select2');
		})
</script>

<!-- calendar -->
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

      plugins: [ 'interaction', 'dayGrid', 'googleCalendar' ],

      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listYear'
      },

      displayEventTime: false, // don't show the time column in list view

      // THIS KEY WON'T WORK IN PRODUCTION!!!
      // To make your own Google API key, follow the directions here:
      // http://fullcalendar.io/docs/google_calendar/
      googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',


      dateClick: function(date) {

      	document.getElementById('ngay').value = date.dateStr;

      },

      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      }

    });

    calendar.render();
  });
 </script>
<!-- update -->
 <script>
</script>
</html>
