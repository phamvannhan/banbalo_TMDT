<?php
namespace App;
use Illuminate\Http\Request;
class GioHang{
    public $dssp;
    public $soluong = 0;
    public $tonggia = 0;

    public function __construct($oldcart){
        if($oldcart){
            $this->dssp = $oldcart->dssp;
            $this->soluong = $oldcart->soluong;
            $this->tonggia = $oldcart->tonggia;
        }
    }

    public function add($sp, $id, $soluong){
        $storeitem = ['soluong'=>0,'dongia'=>($sp->dongia-(($sp->dongia*$sp->khuyenmai)/100)),'sp'=>$sp];
        if($this->dssp){
            if(array_key_exists($id, $this->dssp)){
                $storeitem = $this->dssp[$id];
            }
        }
        $storeitem['soluong'] += $soluong;
        $this->dssp[$id] = $storeitem;
        $this->soluong += $soluong;
        $this->tonggia += ($storeitem['dongia']*$soluong);
    }

    public function remove($id, $soluong, $thanhtien){
        if($this->dssp){
            unset($this->dssp[$id]);
            $this->soluong -= $soluong;
            $this->tonggia -= $thanhtien;
        }
    }
}

?>