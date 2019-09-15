<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 *
 */
class Luong extends Model
{
	public $table = 'luong';
	public function get_all_luong_tu_cham_cong()
	{
		$array_luong = DB::select("select month(ngay) as thang, year(ngay) as nam, ma_giang_vien,sum(so_h_day)as so_h_lam,sum(thanh_tien) as luong from (select ngay,giang_vien.ma_giang_vien, mon.ma_mon,lop.ma_lop,sum(so_h_lam) as so_h_day,giang_vien.he_so,mon.luong_tung_mon, (sum(so_h_lam)*giang_vien.he_so*mon.luong_tung_mon) as thanh_tien from cham_cong JOIN giang_vien on giang_vien.ma_giang_vien = cham_cong.ma_giang_vien join mon on mon.ma_mon = cham_cong.ma_mon join lop on lop.ma_lop = cham_cong.ma_lop WHERE tinh_trang = 0 and month(ngay) = month(now()) and year(ngay) = year(now()) GROUP by ma_mon,ma_lop,ma_giang_vien)a GROUP by ma_giang_vien");
		return $array_luong;
	}
	public function view_all_by_year()
	{
		$array_luong = DB::select("select nam,thang,(sum(luong)/COUNT(ma_giang_vien)) as luong from luong where nam = (select max(nam)from luong) GROUP by thang ORDER by thang asc");
		return $array_luong;
	}
	public function luong_ca_nhan()
	{
		$array_luong = DB::select("select thang,nam,ten_dang_nhap,luong from luong join giang_vien on giang_vien.ma_giang_vien = luong.ma_giang_vien where nam = year(now()) and thang = month(now())");
		return $array_luong;
	}
	public function get_so_h_lam()
	{
		$so_h_lam = DB::select("select so_gio_lam from luong where ma_giang_vien = ? and thang = month(now()) and nam = year(now())",[
			$this->ma_giang_vien
		]);
		return $so_h_lam;
	}
	public function get_luong()
	{
		$luong = DB::select("select luong from luong where ma_giang_vien = ? and thang = month(now()) and nam = year(now())",[$this->ma_giang_vien]);
		return $luong;
	}
	public function insert_luong()
	{
		DB::insert("insert into luong values(?,?,?,?,?)",[
			$this->thang,
			$this->nam,
			$this->ma_giang_vien,
			$this->so_h_lam,
			$this->luong
		]);
	}
	public function check_exist()
	{
		$check = DB::select("select count(ma_giang_vien) as soGV from luong where thang = month(now()) and nam = year(now()) and ma_giang_vien = ?",[$this->ma_giang_vien]);
		return $check;
	}
	public function update_luong()
	{
		DB::update("update luong set so_gio_lam = ?, luong = ? where ma_giang_vien =? and thang = ? and nam = ?",[
			$this->so_h_lam,
			$this->luong,
			$this->ma_giang_vien,
			$this->thang,
			$this->nam
		]);
	}
}
