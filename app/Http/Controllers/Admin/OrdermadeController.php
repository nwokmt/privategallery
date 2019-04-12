<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\User;
use App\Ordermade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Config;

class OrdermadeController extends Controller
{
    public function list()
   {
        $ordermades = Ordermade::orderBy('ordermades.updated_at',"desc")->get();
        return view('admin.ordermade.list', ['ordermades' => $ordermades]);
     }

    public function detail($id)
   {
        $ordermade = Ordermade::where('id',$id)->get();
        //—¿‹à
        $orderMadePrice = Config::get('const.orderMadePrice');
    	return view('admin.ordermade.detail', ['ordermade' => $ordermade["0"],'orderMadePrice' => $orderMadePrice[$ordermade["0"]["type"]]]);

   }
}
