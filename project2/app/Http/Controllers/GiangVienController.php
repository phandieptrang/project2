<?php
namespace App\Http\Controllers;

use Request;
use App\Model\GiangVien;
use App\Model\ChuyenNganh;
use App\Model\ChamCong;
use App\Model\Mon;
use App\Model\Lop;

/**
 * 
 */
class GiangVienController extends Controller
{
	public function view_list_he_so()
	{
		$giang_vien = new GiangVien();
		$array_giang_vien = $giang_vien->get_all();

		return view('giang_vien.view_list_he_so',[
			'array_giang_vien'=>$array_giang_vien
		]);
	}
}