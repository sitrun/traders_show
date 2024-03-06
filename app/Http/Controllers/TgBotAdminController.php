<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Price;
use App\Models\TgbotWorkers;
use App\Models\Transaction;
use App\Models\Tgbot_post;
use App\Models\Tgbot_options;
use App\Models\Tgbot_text;



use Illuminate\Http\Request;
use Illuminate\View\View;

class TgBotAdminController extends Controller
{

	//Запрос главной страницы со статистикой
	public function main_page(Request $request) {
		$auth_token = $request->cookie('auth_ok');
		if ($auth_token != '$2y$10$AzadNOJWhScpfdljgJHm0u4jVXQL6BYokusqkSxpw6.6ysBYlGRSu'){
			return view('bot_admin_auth');
		};

		$statistic = collect([
			'count_users'=> User::count(),
			'count_admins'=> TgbotWorkers::count(),
			'count_paid'=> Transaction::where('status','=','paid')->count(),
			'count_aside'=> Transaction::where('status','=','paid')->count(),
			'count_posts'=> Tgbot_post::count(),

		]);
		return view('bot_admin', ['stat' => $statistic]);
	}

    //Ajax сортировщик запросов по пунктам меню
	public function main_menu(Request $request)
	{
		$type = $request->type;
		
		switch ($type){
		    case 'list_users':
		    	$this->bot_list_users($type);
		    break;
		    case '':
		        
		    break;
		    case '':
		        
		    break;
		    
		}
		
		return $type;
	}

	//Список пользователь Ajax
	public function bot_list_users($type) {

	    // Запрашиваем список пользователей
		// Возвращаем шаблон
		//['name' => 'James'];
		$data = '';
		return 'вошел в функцию';
	    return view('tgbot.list_users', $data);
//		return response()->json(['success' => true,
//		                         'data' => view('tgbot.list_users', $data),
//		                         '_s' => 'ok_'. $type]);
	}

	//Тестовыый вывод через коллекции
	public function test_view( ){


		$model_texts = new Tgbot_text();
		$collection = $model_texts->get();
//		return view('tgbot.direct_templates.list_users', ['data' => $collection]);
		return view('tgbot.direct_templates.test_view', ['data' => $collection]);



		//Запросить через коллекцию тарифы как посты
		$model_worker = new TgbotWorkers();
		//$collection = $model_price->get();
//		$collection = $model_price->where('active', '=', 1)->get();
		$collection = $model_worker->get();
//		$multiplied = $collection->map(function ($item, $key) {
//			dd($item);
//			if ($item->discount_percent and $item->discount_percent > 0
//				and $item->discount_findate
//			){

				//$item->discount_percent = "Скидка " . $item->discount_percent . "% до "
//				                          . $item->discount_findate->timezone('Europe/Moscow')->format('d.m.Y H:i');
//			}
//			return $item;
//		});

		return view('tgbot.direct_templates.test_view', ['data' => $collection]);


		return true;
		//Запросить через коллекцию тарифы как посты
		$model_users = new User();
		$collection = $model_users->all();
//		$collection = $model_users->get();
		//		$collection = $model_price->where('active', '=', 1)->get();
		//		dd($collection);

		//		$data = $collection;
		return view('tgbot.direct_templates.test_view', ['data' => $collection]);
		//		return view('messages_all_crypto', ['data' => top_crypto::all()]);
	}

	//Тариф через коллекции
	public function tariffs_view( ){

		//Запросить через коллекцию тарифы как посты
		$model_price = new Price();
		//$collection = $model_price->get();
		$collection = $model_price->where('active', '=', 1)->get();
		return view('tgbot.direct_templates.tariffs', ['data' => $collection]);
		//		return view('messages_all_crypto', ['data' => top_crypto::all()]);
	}

	//Список пользователей через коллекции
	public function list_users_view( ){

		$model_users = new User();
		$collection = $model_users->get()->sortBy([['id','desc']]);
		return view('tgbot.direct_templates.list_users', ['data' => $collection]);
	}

	//Список работников через коллекции
	public function list_workers_view( ){

		$model_worker = new TgbotWorkers();
		$collection = $model_worker->get();
		return view('tgbot.direct_templates.list_workers', ['data' => $collection]);
	}

	//Список платежей через коллекции
	public function payments_view( ) {

		$model_trans = new Transaction();
//		$collection  = $model_trans->get();
		$collection  = $model_trans->where( 'status', 'paid' )->get()->sortBy([['payment_date','desc']]);
		return view( 'tgbot.direct_templates.payments', [ 'data' => $collection ] );

	}

	//Параметры через коллекции и запросы
	public function params_view( ){

		$coll_trial_days = Tgbot_options::where('name_option','count_trial_days_new_user')->get();

		$model_texts = new Tgbot_text();
		$coll_bot_texts = $model_texts->get();

		
		return view('tgbot.direct_templates.params', ['trial_days' => $coll_trial_days->first(),
				'bot_texts' => $coll_bot_texts
			]);
	}

	//Действия с тарифами Ajax
	public function bot_actions( Request $request ) {
		$type = $request->type;
		$message_ok = 'Действие успешно выполнено';
		$no_actions = '';

		switch ($type){
		    case 'tariff_off':
			    Price::find($request->id)->update(['switch_active' => 0]);
			    $message_ok = 'Тариф отключен';
		    break;
		    case 'tariff_on':
			    Price::find($request->id)->update(['switch_active' => 1]);
			    $message_ok = 'Тариф Включен';
		    break;
		    case 'tariff_soft_delete':
			    Price::find($request->id)->update(['active' => 0]);
			    $message_ok = 'Тариф Удален';
		    break;

			case 'change_role':
				//$no_actions = '_no_action';
				$role_id = $request->input('sform.new_role');
				TgbotWorkers::find($request->id)->update(['role' => $role_id]);
				$message_ok = 'Роль изменена';
				break;

			case 'save_bot_text':
				$new_message = $request->input('sform.bot_text');
				Tgbot_text::find($request->id)->update(['message' => $new_message]);
				$message_ok = "Новый текст под id {$request->id} сохранен";
				break;

			default:
				$no_actions = '_no_action';
			break;

		}

		return response()->json(['success' => 1, '_text' => $message_ok, '_s' => 'ok_'. $type . $no_actions]);
	}



}
