<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Mon extends Model
{
	public $table = 'mon';
    public function get_all()
    {
    	$array_mon = DB::select("select*from $this->table join chuyen_nganh on chuyen_nganh.ma_chuyen_nganh = $this->table.ma_chuyen_nganh");
    	return $array_mon;
    }
    public function check_ten_mon()
    {
        $check = DB::select("select count(ten_mon) as dem_ten from mon where ten_mon = '$this->ten_mon'");
        return $check;
    }
    public function insert()
    {
    	DB::insert("insert into $this->table(ten_mon,ma_chuyen_nganh,luong_tung_mon,thoi_gian_dinh_muc) values (?,?,?,?)",[$this->ten_mon,$this->ma_chuyen_nganh,$this->luong_tung_mon,$this->thoi_gian_dinh_muc]);
    }
    public function get_one()
    {
        $array = DB::select("select * from $this->table
            join chuyen_nganh on $this->table.ma_chuyen_nganh = chuyen_nganh.ma_chuyen_nganh
            where ma_mon = ?
            limit 1",[$this->ma_mon]);
        return $array[0];
    }
     public function get_luong_dm()
    {
        $luong_tung_mon = DB::select("select luong_tung_mon from $this->table where ma_mon = ?",[$this->ma_mon]);
        return $luong_tung_mon;
    }

    public function update_mon()
    {
       DB::update("update $this->table set luong_tung_mon=? where ma_mon = ?",[

            $this->luong_tung_mon,
            $this->ma_mon
        ]);

    }
    public function get_all_mon_by_chuyen_nganh()
    {
        $array = DB::select("select * from $this->table
            where ma_chuyen_nganh = ?",[
                $this->ma_chuyen_nganh
            ]);
        return $array;
    }
    public function get_thoi_gian_dinh_muc()
    {
        $get_thoi_gian_dinh_muc =DB::select("select thoi_gian_dinh_muc from mon where ma_mon = $this->ma_mon");
        return $get_thoi_gian_dinh_muc;
    }
}
