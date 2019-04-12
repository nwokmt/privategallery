<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ordermade;
use App\Orderdetail;
use Illuminate\Support\Facades\Config;

class OrdermadeController extends Controller
{

    //��������
    public function order()
    {
        return view('ordermade.form');
    }

    //�����m�F
    public function confirm(Request $request)
    {
        
        //�o���f�[�V�����`�F�b�N
        $this->validate($request, Ordermade::$rules);
        //�J�[�g�̒��g���m�F
        $form = $request->all();
        $ordermade = new Ordermade;
        $ordermade->fill($form);
        //�Z�b�V�����ɓo�^
        session(['ordermade' => $form]);
        //����
        $orderMadePrice = Config::get('const.orderMadePrice');
        return view('ordermade.confirm', ['ordermade' => $ordermade,'orderMadePrice' => $orderMadePrice[$form["type"]]]);
        
    }

    //�����m��
    public function save(Request $request)
    {
        
         $form = session('ordermade');
        //�J�[�g�̒��g�������܂��͒������e���ꍇ
        if(empty($form)){
            return redirect('/');
        }
        $ordermade = new Ordermade;
        unset($form['_token']);
        $ordermade->fill($form);
        $ordermade->save();
        //�o�^��Z�b�V��������폜
        //�o�^��Z�b�V��������폜
        session(['ordermade' => null]);
        return redirect('thanks');
    }

    public function thanks()
   {
        return view('order.thanks');
     }

    public function list()
   {
        //�Z�b�V�����̓��e���擾
        $orders = session('cart');
        return view('cart.list', ['orders' => $orders]);
     }

}
