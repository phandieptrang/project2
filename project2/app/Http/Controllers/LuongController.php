<?php
namespace App\Http\Controllers;

use Request;
use App\Model\Luong;

/**
 * 
 */
// cái này t mới làm này
class LuongController extends Controller
{
	public function view_chart_luong()
	{
		$luong = new Luong();
		$array_luong = $luong->view_all_by_year();

		return view('luong_trung_binh',[
			'array_luong'=>$array_luong
		]);
	}
	public function view_chart_luong_ca_nhan()
	{
		$luong = new Luong();
		$array_luong = $luong->luong_ca_nhan();

		return view('luong_ca_nhan',[
			'array_luong'=>$array_luong
		]);
	}
}