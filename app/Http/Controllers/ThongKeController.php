<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\DonHang;
use App\ChiTietDonHang;
use DB;
use Excel;

class ThongKeController extends Controller
{
    //
	public $chart = null;
	public $arr = array();

    private function toArray($arr = array(), $asType = '', $asSum = ''){
    	$arrSum = array();
    	$arrType = array();
    	if($asSum == 'DoanhThu'){
    		foreach ($arr as $key => $value) {
    			array_push($arrSum, $value->DoanhThu);
    		}
    	}elseif($asSum == 'SoLuong'){
    		foreach ($arr as $key => $value) {
    			array_push($arrSum, $value->SoLuong);
    		}
    	}
    	
    	if($asType == 'NGAY'){
    		foreach ($arr as $key => $value) {
    			array_push($arrType, $value->NGAY);
    		}
    	}elseif($asType == 'THANG'){
    		foreach ($arr as $key => $value) {
    			array_push($arrType, $value->THANG);
    		}
    	}elseif($asType == 'NAM'){
    		foreach ($arr as $key => $value) {
    			array_push($arrType, $value->NAM);
    		}
    	}elseif($asType == 'SanPham'){
    		foreach ($arr as $key => $value) {
    			array_push($arrType, $value->SanPham);
    		}
    	}
    	
    	return array($arrType, $arrSum);
    }

    private function getNew(){
    	$num_newbl = 0;
    	$num_newkh = 0;
    	$num_newdh = 0;
    	$num_newpn = 0;

    	$sql_count_bl = "SELECT COUNT(id) as SoLuong FROM binhluan WHERE DATE(NOW()) = DATE(created_at)";
    	$num_newbl = $this->toArray(DB::select($sql_count_bl),'','SoLuong')[1][0];

    	$sql_count_kh = "SELECT COUNT(id) as SoLuong FROM khachhang WHERE DATE(NOW()) = DATE(created_at)";
    	$num_newkh = $this->toArray(DB::select($sql_count_kh),'','SoLuong')[1][0];

    	$sql_count_pn = "SELECT COUNT(id) as SoLuong FROM phieunhap WHERE DATE(NOW()) = DATE(created_at)";
    	$num_newpn = $this->toArray(DB::select($sql_count_pn),'','SoLuong')[1][0];

    	$sql_count_dh = "SELECT COUNT(id) as SoLuong FROM donhang WHERE trangthai = 0";
    	$num_newdh = $this->toArray(DB::select($sql_count_dh),'','SoLuong')[1][0];

    	return array($num_newbl,$num_newkh,$num_newdh,$num_newpn);
    }

	private function getData($type, $time,$dk){
		$sql_time  = '';
		$sum = '';
		$table = '';
		$asSum = '';
		$whereTime = '';
		$whereTime2 = '';
		$whereIn = '';
		$gettype = '';
		$asType = '';
		$groupBySP = '';
		$orderBy = '';

		if($time == 'day'){
			$sql_time = 'DAY(created_at)';
			$asType = "NGAY";

			$whereTime2 = ' AND MONTH(created_at) = '.$dk;				
		}elseif($time == 'month'){
			$sql_time = 'MONTH(created_at)';
			$asType = "THANG";

			$whereTime2 = ' AND YEAR(created_at) = '.$dk;
		}elseif($time == 'year'){
			$sql_time = 'YEAR(created_at)';
			$asType = "NAM";
		}

		if($type == 'doanhthu'){
			$sum = "SUM(tonggia)";
			$table = "donhang";
			$asSum = "DoanhThu";
			$whereTime = "trangthai = 2";
			$gettype = $sql_time;

		}elseif($type == 'sanpham'){
			$sum = "SUM(soluong)";
			$table = "chitietdonhang";
			$asSum = "SoLuong";
			$whereTime2 = '';
			$whereIn = "id_dh IN (SELECT id FROM donhang WHERE trangthai = 2)";
			$gettype = "id_sp";
			$asType = "SanPham";
			$groupBySP = 'id_sp, ';
			$orderBy = " ORDER BY  ".$asSum." DESC LIMIT 5";

		}
							
		$sql =  "SELECT ".$gettype." as ".$asType.", ".$sum." as ".$asSum." FROM ".$table." WHERE ".$whereTime.$whereTime2.$whereIn." GROUP BY ".$groupBySP.$sql_time.$orderBy;

		return $this->toArray(DB::select($sql),$asType,$asSum);

	}


    public function getThongKe(Request $req){
    	$title = "THỐNG KÊ DOANH THU";
    	$type = 'THÁNG';
    	$label = "TỔNG GIÁ (VNĐ)";

    	if($req->type && $req->time){
 			if($req->type == 'sanpham'){
    			$title = "THỐNG KÊ SẢN PHẨM";
    			$label = "SỐ LƯỢNG";
    		}

    		if($req->time == 'day'){
    			$type = 'NGÀY';
    		}elseif($req->time == 'year'){
    			$type = 'NĂM';
    		}

    		$this->arr = $this->getData($req->type,$req->time,$req->dieukien);
			$this->chart = Charts::create('line', 'highcharts')
			             ->title($title)
			             ->elementLabel($label)
			             ->labels($this->arr[0])
			             ->values($this->arr[1])
			             ->responsive(true);
	
    	}else{
    		$this->arr = $this->getData('doanhthu','month','2017');
    		$this->chart = Charts::create('line', 'highcharts')
			             ->title($title)
			             ->elementLabel($label)
			             ->labels($this->arr[0])
			             ->values($this->arr[1])
			             ->responsive(true);
    	}    	
    	$num_new = $this->getNew();
    	return view('admin.tk.thongke',['chart'=>$this->chart,'num_new'=>$num_new,'arr'=>$this->arr,'title'=>$title,'type'=>$type,'label'=>$label]);
 	
    }

    public function exportFile(Request $req){

    	$file = Excel::create('ThongKe', function($excel) use ($req){
		    $excel->sheet('Excel sheet', function($sheet) use ($req){
		        $sheet->loadView('admin.tk.ExportThongKe',['noun'=>$req->noun,'val'=>$req->val,'title'=>$req->title,'type'=>$req->type,'label'=>$req->label]);
		    });
		})->export('xlsx');

    }
}
