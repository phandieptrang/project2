<?php
namespace App\Http\Controllers;

use Request;
use App\Model\GiangVien;
use App\Model\ChuyenNganh;
use App\Model\ChamCong;
use App\Model\Mon;
use App\Model\Lop;
use App\Model\Luong;
use Session;

/**
 *
 */
class ChamCongController extends Controller
{
	public function list_cham_cong()
	{
		$cham_cong = new ChamCong();
		$array_cham_cong = $cham_cong->get_list();

		return view('cham_cong.danh_sach_cham_cong',[
			'array_cham_cong'=>$array_cham_cong
		]);
	}
	public function view_cham_cong()
	{
		$chuyen_nganh = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();

		$lop = new Lop();
		$array_lop = $lop->get_all();

		$mon = new Mon();
		$array_mon = $mon->get_all();

		return view('cham_cong.view_cham_cong',[
			'array_lop'=>$array_lop,'array_mon'=>$array_mon,'array_chuyen_nganh'=>$array_chuyen_nganh
		]);
	}
	public function process_cham_cong()
	{
		$cham_cong = new ChamCong();
		$cham_cong->ngay = getdate();
		$cham_cong->ma_mon = Request::get('ma_mon');
		$cham_cong->ma_lop = Request::get('ma_lop');
		$cham_cong->so_gio_lam = Request::get('so_gio_lam');
		$cham_cong->insert();

	}
	public function xac_nhan_tat_ca_cham_cong()
	{
		$chuyen_nganh = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();

		//tinh luong tu cac ban cham cong chua duoc xac nhan
		$luong = new Luong();
		$array_luong = $luong->get_all_luong_tu_cham_cong();

		//vong lap lay ra tung ban ghi trong so cac ban ghi luong duoc lay ra tu bang cham cong ma chua duoc insert vao bang luong
		foreach ($array_luong as $luong1) {

			$luong2 = new Luong();
			$luong2->ma_giang_vien = $luong1->ma_giang_vien;
			$check = $luong2->check_exist();

			//kiem tra ban ghi trong luong
			if ($check[0]->soGV == 0) {
				//insert vao luong
				$luong3 = new Luong();
				$luong3->thang = $luong1->thang;
				$luong3->nam = $luong1->nam;
				$luong3->ma_giang_vien = $luong1->ma_giang_vien;
				$luong3->so_h_lam = $luong1->so_gio_lam;
				$luong3->luong = $luong1->luong;
				$luong3->insert_luong();

				$cham_cong = new ChamCong();
				//update tinh trang xac nhan cham cong thanh da xac nhan
				$cham_cong->update_tat_ca_cham_cong();

			} else {
				//lay tong so h lam hien tai
				$luong4 = new Luong();
				$luong4->ma_giang_vien = $luong1->ma_giang_vien;
				$so_h_lam_cu = $luong4->get_so_h_lam()[0]->so_gio_lam;

				//lay tong so h lam vua xac nhan
				$so_h_lam_moi = $luong1->so_h_lam;

				//lay so tien luong duoc insert vao bang luong tu lan xac nhan truoc trong thang nay
				$luong5 = new Luong();
				$luong5->ma_giang_vien = $luong1->ma_giang_vien;
				$luong_cu = $luong5->get_luong()[0]->luong;

				//lay tong so tien luong vua duoc xac nhan
				$luong_moi = $luong1->luong;

				//update luong theo ma giang vien
				$luong6 = new Luong();
				$luong6->thang = $luong1->thang;
				$luong6->nam = $luong1->nam;
				$luong6->ma_giang_vien = $luong1->ma_giang_vien;
				$luong6->so_h_lam = (int)$so_h_lam_cu +(int)$so_h_lam_moi;
				$luong6->luong = ((int)$luong_cu + ((int)$luong_moi));
				$luong6->update_luong();

				$cham_cong2 = new ChamCong();
				//update tinh trang xac nhan cham cong thanh da xac nhan
				$cham_cong2->update_tat_ca_cham_cong();
			}
		}

		$cham_cong1 = new ChamCong();
		$array_cham_cong = $cham_cong1->get_all();


		return view('cham_cong.xac_nhan_cham_cong',[
			'array_chuyen_nganh'=>$array_chuyen_nganh,
			'array_cham_cong'=>$array_cham_cong
		]);
	}
	public function xac_nhan_cham_cong()
	{
		$chuyen_nganh = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();

		$cham_cong1 = new ChamCong();
		$array_cham_cong = $cham_cong1->get_all();


		return view('cham_cong.xac_nhan_cham_cong',[
			'array_chuyen_nganh'=>$array_chuyen_nganh,
			'array_cham_cong'=>$array_cham_cong
		]);
	}
	public function get_cham_cong_chua_xac_nhan()
	{
		$chuyen_nganh = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();

		$cham_cong = new ChamCong();
		$array_cham_cong = $cham_cong->get_all_chua_xac_nhan();


		return view('cham_cong.xac_nhan_cham_cong',[
			'array_chuyen_nganh'=>$array_chuyen_nganh,
			'array_cham_cong'=>$array_cham_cong
		]);
	}
	public function get_cham_cong_da_xac_nhan()
	{
		$chuyen_nganh = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();

		$cham_cong = new ChamCong();
		$array_cham_cong = $cham_cong->get_all_da_xac_nhan();


		return view('cham_cong.xac_nhan_cham_cong',[
			'array_chuyen_nganh'=>$array_chuyen_nganh,
			'array_cham_cong'=>$array_cham_cong
		]);
	}


	public function get_cham_cong_by_search()
	{
		$chuyen_nganh = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();
		Request::flash();
		$cham_cong = new ChamCong();
		$cham_cong->ngay = Request::get("ngay");
		$cham_cong->ma_mon = Request::get("ma_mon");
		$cham_cong->ma_lop = Request::get("ma_lop");
		$cham_cong->ma_giang_vien = Request::get("ma_giang_vien");
		$cham_cong->ma_chuyen_nganh = Request::get("ma_chuyen_nganh");
		$cham_cong->tinh_trang = Request::get("tinh_trang");
        $array_cham_cong = $cham_cong->get_all_by_search();

		if($cham_cong->checkMaMonInFormSearch()==1){
			$arr=$cham_cong->tinhChamCongVaDinhMuc();
			return view('cham_cong.xac_nhan_cham_cong',[
			'array_chuyen_nganh'=>$array_chuyen_nganh,
			'array_cham_cong'=>$array_cham_cong,
			'array_tinh_cham_cong'=>$arr[0]
			]);
		}
		else{
			return view('cham_cong.xac_nhan_cham_cong',[
			'array_chuyen_nganh'=>$array_chuyen_nganh,
			'array_cham_cong'=>$array_cham_cong
			]);
		}
	}

	public function process_update_cham_cong(){

		$chuyen_nganh = new ChuyenNganh();
		$array_chuyen_nganh = $chuyen_nganh->get_all();

		$inforDate=explode("-",Request::get("ngay"));
		$so_h_lam  =  Request::get('so_h_lam');

		$giang_vien = new GiangVien();
		$giang_vien->ma_giang_vien = Request::get("ma");
		(int)$he_so = $giang_vien->get_he_so();

		$mon = new Mon();
		$mon->ma_mon = Request::get('ma_mon');
		$luong_tung_mon = $mon->get_luong_dm();

		$luong = new Luong();
		$luong->ma_giang_vien = Request::get("ma");
		$check = $luong->check_exist();

		$luong1 = new Luong();
		$luong1->thang = $inforDate[1];
		$luong1->nam = $inforDate[0];
		$luong1->ma_giang_vien = Request::get("ma");
		$luong1->so_h_lam =  $so_h_lam;
        $luong1->luong = ((int)$so_h_lam*(int)$he_so*(int)$luong_tung_mon[0]->luong_tung_mon);

		if ($check[0]->soGV == 0) {

			//insert luong
			$luong1->insert_luong();

			//update tinh trang tinh luong trong bang cham cong
			$cham_cong = new ChamCong();
			$cham_cong->so_h_lam = $so_h_lam ;
			$cham_cong->ma_giang_vien = Request::get("ma");
			$cham_cong->ngay = Request::get("ngay");
			$cham_cong->update_cham_cong();
		}
		else {
			//lay tong so h lam hien tai
			$so_h_lam_cu = $luong->get_so_h_lam()[0]->so_gio_lam;

			//lay so tien luong tinh den hien tai
			$luong_cu = $luong->get_luong()[0]->luong;
			//update luong theo ma giang vien
			$luong2 = new Luong();
			$luong2->thang = $inforDate[1];
			$luong2->nam = $inforDate[0];
			$luong2->ma_giang_vien = Request::get("ma");
			$luong2->so_h_lam = (int)$so_h_lam_cu +(int)$so_h_lam;
			$luong2->luong = ((int)$luong_cu + ((int)($so_h_lam)*(int)($he_so)*(int)$luong_tung_mon[0]->luong_tung_mon));
			$luong2->update_luong();

			//update tinh trang tinh luong trong bang cham cong
			$cham_cong = new ChamCong();
			$cham_cong->so_h_lam = $so_h_lam ;
			$cham_cong->ma_giang_vien = Request::get("ma");
			$cham_cong->ngay = Request::get("ngay");
			$cham_cong->update_cham_cong();
		}
		return redirect()->route('cham_cong.xac_nhan_cham_cong');
	}
}
