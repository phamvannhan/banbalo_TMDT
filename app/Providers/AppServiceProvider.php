<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\ChuyenMuc;
use App\CaiDat;
use View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $dscm = ChuyenMuc::orderBy('vitri')->get();
        View::share('dscm',$dscm);
        $info = CaiDat::select('sdt1','sdt2','sdt3','diachi','mail')->get()->first();
        View::share('info',$info);
        Schema::defaultStringLength(191); 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
