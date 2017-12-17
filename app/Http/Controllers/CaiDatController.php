<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CaiDat;

class CaiDatController extends Controller
{
    //

    public function getIndex(){
    	$caidat = CaiDat::all()->first();
    	return view('admin.caidat.caidat',['caidat'=>$caidat]);
    }

    public function postIndex(Request $req){
    	$this->validate($req,
    		[
    			'ten' => 'required',
    			'keywords' => 'required|min:3',
    			'mota' => 'required|min:170|max:180',
    			'diachi' => 'required',
                'mail' => 'required|email',
    			'sdt1' => 'required|min:10|max:11',
    			'sdt2' => 'required|min:10|max:11',
    			'sdt3' => 'required|min:10|max:11',
    			'trangthai' => 'required|numeric'
    		]
    	);
    	return $this->editItem($req,'cd',1);
    }
}
