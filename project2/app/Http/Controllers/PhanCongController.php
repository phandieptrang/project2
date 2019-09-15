<?php
namespace App\Http\Controllers;

use Request;
use App\Model\ChuyenNganh;
use App\Model\Mon;
use App\Model\GiangVien;
use App\Model\Lop;
use App\Model\PhanCong;
use App\Model\ChamCong;
use DB;
use Session;
/**
 *
 */
class PhanCongController extends Controller
{
	private $folder = 'phan_cong';

	public function view_all()
	{
		$phan_cong = new PhanCong();
		$array_phan_cong = $phan_cong->get_all();
		return view("$this->folder.view_all",[
			'array_phan_cong' => $array_phan_cong
		]);
	}

	public function view_insert()
	{
		$chuyen_nganh = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();

		return view("$this->folder.view_insert",[
			'array_chuyen_nganh' => $array_chuyen_nganh
		]);
	}
	public function ajax_view_insert()
	{
		$giang_vien = new GiangVien();
		$giang_vien->ma_giang_vien = Request::get("ma_giang_vien");
		$ten_giang_vien = $giang_vien->get_one()[0]->ten_giang_vien	;

		$phan_cong = new PhanCong();
		$phan_cong->ma_giang_vien = Request::get("ma_giang_vien");
		$phan_cong->ma_mon = Request::get('ma_mon');
		// dd(Request::get('ma_mon'));
		$phan_cong->ma_lop = Request::get('ma_lop');
		// dd($phan_cong->get_thoi_gian_dinh_muc_mon());
		$thoi_gian_dinh_muc_mon = $phan_cong->get_thoi_gian_dinh_muc_mon();

		$cham_cong = new ChamCong();
		$cham_cong->ma_giang_vien = Request::get('ma_giang_vien');
		$cham_cong->ma_lop = Request::get('ma_lop');
		$cham_cong->ma_mon = Request::get('ma_mon');
		$sum_so_h_lam = $cham_cong->get_sum_so_h_lam()[0]->tongsohlam;


		$so_h_lam_da_xac_nhan = $cham_cong->get_so_h_lam_da_xac_nhan()[0]->giodaxacnhan;

		$so_h_lam_chua_xac_nhan = $cham_cong->get_so_h_lam_chua_xac_nhan()[0]->giodaxacnhan;
		// return $so_h_lam_da_xac_nhan;

		$arrayResult=[$ten_giang_vien,$thoi_gian_dinh_muc_mon,$sum_so_h_lam,$so_h_lam_da_xac_nhan,$so_h_lam_chua_xac_nhan];

		return $arrayResult;
	}
	public function get_mon_by_chuyen_nganh()
	{
		$mon = new Mon();
		$mon->ma_chuyen_nganh = Request::get('ma_chuyen_nganh');
		$array_mon = $mon->get_all_mon_by_chuyen_nganh();

		return $array_mon;
	}

	public function get_lop_by_chuyen_nganh()
	{
		$lop = new Lop();
		$lop->ma_chuyen_nganh = Request::get('ma_chuyen_nganh');
		$array_lop = $lop->get_all_lop_by_chuyen_nganh();
		return $array_lop;
	}

	public function get_giang_vien_by_chuyen_nganh()
	{
		$giang_vien = new GiangVien();
		$giang_vien->ma_chuyen_nganh = Request::get('ma_chuyen_nganh');
		$array_giang_vien = $giang_vien->get_all_giang_vien_by_chuyen_nganh();

		return $array_giang_vien;
	}

	public function process_insert()
	{
		$chuyen_nganh = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();

		$phan_cong = new PhanCong();
		$phan_cong->ma_chuyen_nganh = Request::get('ma_chuyen_nganh');
		$phan_cong->ma_lop = Request::get('ma_lop');
		$phan_cong->ma_mon = Request::get('ma_mon');
		$phan_cong->ma_giang_vien = Request::get('ma_giang_vien');
		$phan_cong->thoi_gian_dinh_muc_mon = Request::get('thoi_gian_dinh_muc_mon');

		$mon = new Mon();
		$mon->ma_mon = Request::get('ma_mon');
		$thoi_gian_dinh_muc = $mon->get_thoi_gian_dinh_muc();

		$thoi_gian_dinh_muc_mon = Request::get('thoi_gian_dinh_muc_mon');

		$check = $phan_cong->check_exist();
		if((int)$check[0]->checkGV == 0){
			if((int)$thoi_gian_dinh_muc[0]->thoi_gian_dinh_muc >= (int)$thoi_gian_dinh_muc_mon){
				$phan_cong->insert();
				return redirect()->route('phan_cong.view_all');
			}else{
				$check_thoi_gian = -1;
				return view('phan_cong.view_insert',['check_thoi_gian'=>$check_thoi_gian,'array_chuyen_nganh'=>$array_chuyen_nganh]);
			}
		}else{
			return view('phan_cong.view_insert',['check'=>$check,'array_chuyen_nganh'=>$array_chuyen_nganh]);
		}
	}
}
