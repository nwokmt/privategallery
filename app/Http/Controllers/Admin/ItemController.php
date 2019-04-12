<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\User;
use Illuminate\Support\facades\Auth;

class ItemController extends Controller
{

    public function add()
    {
        $item = new Item;
        return view('admin.item.form', ['item' => $item]);
    }

    public function edit($id)
    {
    	$item = Item::find($id);
        return view('admin.item.form', ['item' => $item]);
    }

    public function delete($id)
    {
    	Item::where('id','=',$id)->delete();
        return redirect('admin/item');
    }

    public function save(Request $request)
    {
        $this->validate($request, Item::$rules);
        $item = new Item;
        $form = $request->all();
        unset($form['_token']);

        if(isset($form["id"]) && !empty($form["id"])){
            $item = Item::firstOrNew(['id' => $form["id"]]);
        }
        $item->fill($form);
        $item->save();
        
        return redirect('admin/item');
    }

    public function list()
   {
        $items = Item::orderBy('updated_at',"desc")->get();
        return view('admin.item.list', ['items' => $items]);
     }

    public function detail($id)
   {
	$item = Item::find($id);
	return view('admin.item.detail', ['item' => $item]);

     }
}
