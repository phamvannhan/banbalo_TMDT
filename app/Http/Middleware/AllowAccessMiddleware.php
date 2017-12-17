<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AllowAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        if(Auth::guard('nguoidung')->check()){
            $nd = Auth::guard('nguoidung')->user();
            switch ($type) {
                case 'cm':
        
                case 'cd':
            
                case 'sli':
                   
                case 'ncc':
                  
                case 'qlqc':
                   
                case 'qc':

                case 'kh':
                   
                case 'bl':
                   
                case 'nd':
                    if($nd->chucvu == 1) return $next($request);
                    return back();
                    break;
                case 'lsp':

                case 'tk':

                case 'ctpn':
                  
                case 'pn':
                    if($nd->chucvu == 1 || $nd->chucvu == 2) return $next($request);
                    return back();
                    break;
                
                case 'sp': 

                case 'ctdh': 

                case 'dh':
                    if($nd->chucvu == 1 || $nd->chucvu == 2) return $next($request);
                    return back();
                    break;
                
                case 'pro':
                    if($nd->chucvu == 1 || $nd->chucvu == 0 || $nd->chucvu == 2) return $next($request);
                    return back();
                    break;    
            }
            return $next($request);
        }
        return redirect('admin/login.html');
    }
}
