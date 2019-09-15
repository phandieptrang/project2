<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 *
 */
class ChamCong extends Model
{
	public $table = 'cham_cong';
	public function get_all()
	{
		$array_cham_cong = DB::select("select*from cham_cong join lop on lop.ma_lop = cham_cong.ma_lop join giang_vien on giang_vien.ma_giang_vien = cham_cong.ma_giang_vien join mon on mon.ma_mon = cham_cong.ma_mon ORDER by ngay desc ");
		return $array_cham_cong;
	}
    public function get_all_chua_xac_nhan()
    {
        $array_cham_cong = DB::select("select*from cham_cong join lop on lop.ma_lop = cham_cong.ma_lop join giang_vien on giang_vien.ma_giang_vien = cham_cong.ma_giang_vien join mon on mon.ma_mon = cham_cong.ma_mon where tinh_trang = 0 ORDER by ngay desc ");
        return $array_cham_cong;
    }
    public function get_all_da_xac_nhan()
    {
        $array_cham_cong = DB::select("select*from cham_cong join lop on lop.ma_lop = cham_cong.ma_lop  join giang_vien on giang_vien.ma_giang_vien = cham_cong.ma_giang_vien join mon on mon.ma_mon = cham_cong.ma_mon where tinh_trang = 1 ORDER by ngay desc ");
        return $array_cham_cong;
    }
    public function get_list()
    {
        $array_cham_cong = DB::select("select*from cham_cong join giang_vien on giang_vien.ma_giang_vien = cham_cong.ma_giang_vien join mon on mon.ma_mon = cham_cong.ma_mon join lop on lop.ma_lop = cham_cong.ma_lop ORDER by ngay desc");
        return $array_cham_cong;
    }
	public function get_all_by_search()
	{
		$array_cham_cong = DB::select("select*from cham_cong join giang_vien on giang_vien.ma_giang_vien = cham_cong.ma_giang_vien join mon on mon.ma_mon = cham_cong.ma_mon join lop on lop.ma_lop = cham_cong.ma_lop where cham_cong.ma_mon like '%$this->ma_mon%' and cham_cong.ma_lop like '%$this->ma_lop%' and ngay like '%$this->ngay%' and giang_vien.ma_giang_vien like '%$this->ma_giang_vien%' and giang_vien.ma_chuyen_nganh like '%$this->ma_chuyen_nganh%' and tinh_trang like '%$this->tinh_trang%' ORDER by ngay desc");
        // dd($array_cham_cong);
		return $array_cham_cong;
	}
	public function insert()
    {
    	DB::insert("insert into $this->table(ngay, ma_giang_vien, ma_mon, ma_lop,so_h_lam) values (?,?,?,?,?)",
    		[
    			$this->ngay,
    			$this->ma_giang_vien,
    			$this->ma_mon,
				$this->ma_lop,
				$this->so_h_lam
    		]);
    }
    public function update_cham_cong()
    {
    	DB::update("update $this->table set so_h_lam = ?,tinh_trang = 1 where ma_giang_vien = ? and ngay = ? and tinh_trang = 0",[
            $this->so_h_lam,
            $this->ma_giang_vien,
            $this->ngay
        ]);
    }
      public function update_tat_ca_cham_cong()
    {
        DB::update("update $this->table set tinh_trang = 1 where month(ngay) = month(now())");
    }
    public function checkMaMonInFormSearch(){
    	$arr=DB::select("select count(DISTINCT ma_mon) as countMaMon from cham_cong where cham_cong.ma_mon like '%$this->ma_mon%' and cham_cong.ma_lop like '%$this->ma_lop%' and ngay like '%$this->ngay%' ");
    	return $arr[0]->countMaMon;
    }
    public function tinhChamCongVaDinhMuc(){
    	$arr=DB::select("select SUM(so_h_lam) as soHLam,ten_mon,thoi_gian_dinh_muc as thoigiandinhmuc,ma_giang_vien,ma_lop from cham_cong inner join mon on mon.ma_mon = cham_cong.ma_mon where cham_cong.ma_mon = $this->ma_mon and ma_lop = $this->ma_lop and ma_giang_vien like '%$this->ma_giang_vien%'");
    	return $arr;
    }
    public function get_sum_so_h_lam()
    {
        $arr = DB::select("select if(sum(so_h_lam) is null,0,sum(so_h_lam)) as tongsohlam from cham_cong where ma_giang_vien = $this->ma_giang_vien and ma_mon = $this->ma_mon and ma_lop = $this->ma_lop");
        // dd($arr);
        return $arr;
    }
    public function get_so_h_lam_da_xac_nhan()
    {
        $arr = DB::select("select if(sum(so_h_lam) is null,0,sum(so_h_lam)) as giodaxacnhan from cham_cong where tinh_trang = 1 and ma_giang_vien = $this->ma_giang_vien and ma_mon = $this->ma_mon and ma_lop = $this->ma_lop");
        return $arr;
    }
    public function get_so_h_lam_chua_xac_nhan()
    {
        $arr = DB::select("select if(sum(so_h_lam) is null,0,sum(so_h_lam)) as giodaxacnhan from cham_cong where tinh_trang = 0 and ma_giang_vien = $this->ma_giang_vien and ma_mon = $this->ma_mon and ma_lop = $this->ma_lop");
        return $arr;
    }
}
