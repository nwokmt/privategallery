<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\User;
use App\Order;
use App\Orderdetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\facades\Auth;

class OrderController extends Controller
{
    public function list()
   {
        $orders = Order::orderBy('orders.updated_at',"desc")->get();
        return view('admin.order.list', ['orders' => $orders]);
     }

    public function detail($id)
   {
        $order = Order::where('id',$id)->get();

    	$orderdetail = Orderdetail::where('order_id',$id)->orderBy('id',"asc")->get();
        $items = array();
        $total = 0;
        foreach($orderdetail as $v){
            $item =  Item::where('id',$v->item_id)->get();
            $items[] = $item["0"];
            $total = $total + $item["0"]->price;
        }
    	return view('admin.order.detail', ['order' => $order["0"],'items' => $items,'total' => $total]);

   }
}
