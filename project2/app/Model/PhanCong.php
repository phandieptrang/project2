<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class PhanCong extends Model
{
	public $table = 'phan_cong';
    public function get_all()
    {
    	$array_phan_cong = DB::select("select*from $this->table join mon on mon.ma_mon = $this->table.ma_mon join lop on lop.ma_lop = $this->table.ma_lop join giang_vien on giang_vien.ma_giang_vien = $this->table.ma_giang_vien");
    	return $array_phan_cong;
    }
    public function check_exist()
    {
        $check = DB::select("select count(ma_giang_vien) as checkGV from phan_cong where ma_mon = $this->ma_mon and ma_lop = $this->ma_lop");
        return $check;
    }
    public function check_thoi_gian_dm()
    {
        $check_thoi_gian_dm = DB::select("select count(ma_giang_vien)from phan_cong where ma_giang_vien= $this->ma_giang_vien and ma_mon = $this->ma_mon and ma_lop = $this->ma_lop and thoi_gian_dinh_muc_mon not");
    }
    public function insert()
    {
    	DB::insert("insert into $this->table(ma_giang_vien,ma_mon,ma_lop,thoi_gian_dinh_muc_mon) values (?,?,?,?)",[$this->ma_giang_vien,$this->ma_mon,$this->ma_lop,$this->thoi_gian_dinh_muc_mon]);
    }
    public function get_one()
    {
        $array = DB::select("select*from $this->table where ma_giang_vien=? limit 1",[
            $this->ma_giang_vien
        ]);
        return $array[0];
    }
    public function get_thoi_gian_dinh_muc_mon()
    {
        $check_exist = DB::select("select count(ma_giang_vien) as check_exist from phan_cong where ma_giang_vien = $this->ma_giang_vien and ma_mon = $this->ma_mon and ma_lop = $this->ma_lop");
        $thoi_gian_dinh_muc_mon = DB::select("select thoi_gian_dinh_muc_mon from phan_cong where ma_giang_vien = $this->ma_giang_vien and ma_mon = $this->ma_mon and ma_lop = $this->ma_lop");
        if(count($thoi_gian_dinh_muc_mon)==0){
            return "Không có bản phân công !";
        }else{
            return $thoi_gian_dinh_muc_mon[0]->thoi_gian_dinh_muc_mon;
        }
    }
    public function update_phan_cong()
    {
        DB::update("update $this->table set ma_giang_vien=?,thoi_gian_dinh_muc_mon=? where ma_mon = ? and ma_lop=?",[
            $this->ma_giang_vien,
            $this->thoi_gian_dinh_muc_mon,
            $this->ma_mon,
            $this->ma_lop
        ]);
    }

}
