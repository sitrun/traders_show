<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Forex;
use App\Models\Top_crypto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $user = Auth::user();
	    $forex = Forex::all();
	    $top20 = Top_crypto::all();
	    $user_id = $user->id;
	    $user_info = $user;

	    $orders_db = new Orders;
    	$orders = $orders_db->where('userid', $user_id)->get();

    	//Обработка
	    $orders_treat = $orders->map(function ($item, $key) {
		    $item->cur = $item->cur == 'none' ? null : $item->cur;
		    $item->lot = $item->lot == 'none' ? null : $item->lot;
		    $item->paire = $item->paire == 'none' ? null : $item->paire;
		    $item->pips = $item->pips == 'none' ? null : $item->pips;

		    $item->bay_on = (float)$item->bay_on;
		    $item->risk = (float)$item->risk;
		    $item->risk_money = (float)$item->risk_money;
		    $item->credit = (float)$item->credit;
		    $item->tp_money = (float)$item->tp_money;
		    $item->tp_price = (float)$item->tp_price;
		    $item->volume = (float)$item->volume;

		    $item->open = (int)$item->open;
		    $item->stop = (int)$item->stop;
		    $item->dep = (int)$item->dep;
		    $item->multiplier = (int)$item->multiplier;


		    return $item;
	    });

	    //Отдача для web
    	/*return view('calc', [ 'data' => array(
		    'orders' => $orders,
		    'user_info' => $user_info,
		    'user_id' => $user_id,
		    'forex' => $forex,
		    'top20' => $top20
    	) ]);*/

	    return response()->json(['success' => true, 'data' => array(
		    'orders' => $orders_treat,
		    'user_info' => $user_info,
		    'user_id' => $user_id,
		    'forex' => $forex,
		    'top20' => $top20
	    ), '_s' => 'ok_user_all_orders']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

	    //return response()->json(['success' => true, 'data' => 'Order success saved', '_s' => 'ok_save_order', '_text' => 'Ордер успешно сохранен']);

	    //Сохраняет модель
	    $user = $request->user();
//	    $user = Auth::user();

	    //$orders_db = new Orders;

	    $date_die_input = $request->input('date_die');
	    $die_date = '';
        $die_time = '';
	    if($date_die_input == 'rc_24'){
		    $die_date = Carbon::now()->format('d.m.Y');
		    $die_time = Carbon::now()->format('H:i');
        }
//	    return printf($die_time);
//		return $die_time;

	    //Выделение времени и даты из полной даты
	    //$orders_db->create($request->input);

	    $request->merge([
	    	'userid' => $user->id,
//	    	'time_die' => $die_time,
//	    	'date_die' => $die_date,
	    ]);
	    //dd($request->input());
	    $orders_db = Orders::create($request->input());

	    /*$orders_db->userid = $request->input('user_id');
	    $orders_db->market = $request->input('market');
	    $orders_db->date = $request->input('date');
	    $orders_db->time = $request->input('time');
	    $orders_db->dep = $request->input('dep');
	    $orders_db->risk = $request->input('risk');
	    $orders_db->paire = $request->input('paire');
	    $orders_db->symbol = $request->input('symbol');
	    $orders_db->open = $request->input('open');
	    $orders_db->stop = $request->input('stop');
	    $orders_db->pips = $request->input('pips');
	    //!!! изменение поля
	    $orders_db->volume = $request->input('valume');
	    $orders_db->bay_on = $request->input('bay_on');
	    $orders_db->tp_price = $request->input('tp_price');
	    $orders_db->risk_money = $request->input('risk_money');
	    $orders_db->cur = $request->input('cur');
	    $orders_db->credit = $request->input('credit');
	    $orders_db->lot = $request->input('lot');
	    $orders_db->tp_money = $request->input('tp_money');
	    $orders_db->multiplier = $request->input('multiplier');
	    $orders_db->status = $request->input('status');
	    $orders_db->type_order = $request->input('type_order');
	    $orders_db->save_mode = $request->input('mode');
	    //!! расчитываются
	    $orders_db->time_die = $die_date;
	    $orders_db->date_die = $die_time;

	    $orders_db->style_trade = $request->input('style_trade');

	    $orders_db->save();*/

	    //return redirect()->route('contact-data-one', $id)->with('success','Сообщение было обновлено!');

	    //Выводит вид с новымми параметрами (удачное / неудачное сохранение)
	    return response()->json(['success' => true, 'data' => $orders_db, '_s' => 'ok_save_order']);
	    //	    return "{'_s': 'ok_save_order', '_text': 'Ордер успешно сохранен ' }";
	    //return view('inc.messages', ['order_id' => $orders_db->id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @param  $id
     * @param  $status
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
	    $status = false;
    	if ($request->route()->named('update_order_loss')) {

		    //Для web сохранения
		    //		    $orders->where('id', $id)
		    //		           ->update(['status' => 'loss']);
		    //return redirect()->route('calc')->with('success','Ордер id '.$id.' успешно обновлен статус на loss!');

		    $orders->update(['status' => 'loss']);
		    return response()->json(['success' => true, 'data' => $orders, '_s' => 'ok_save_order_loss']);
	    }
	    if ($request->route()->named('update_order_profit')) {

		    //Для web сохранения
//		    $orders->where('id', $id)
//		           ->update(['status' => 'profit']);
//		    return redirect()->route('calc')->with('success','Ордер id '.$id.' успешно обновлен статус на profit!');

		    $orders->update(['status' => 'profit']);
		    return response()->json(['success' => true, 'data' => $orders, '_s' => 'ok_save_order_profit']);
	    }


	    return response()->json(['success' => false, 'error' => 'Неудачное обновление ордера', '_s' => 'no_update_order']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //Удаление ордеров из БД
	    $result = $orders->delete();
//	    $result = $orders::find($id)->delete();

	    if (!$result) {
		    //return response('Неудачное удаление ордера', 501);
		    return response()->json(['success' => false, 'error' => 'Неудачное удаление ордера', '_s' => 'no_del_order']);
	    }

//	    return redirect()->route('calc')->with('success','Ордер id '.$id.' успешно удален!');
	    return response()->json(['success' => true, 'data' => [], '_s' => 'ok_del_order']);


    }
}
