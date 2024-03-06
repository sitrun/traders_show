<?php

namespace App\Http\Controllers;

use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
	    $model_post = new Post;
	    $collection = $model_post->with('users_stated')->get();
//	    $collection = $model_post->all();
	    $collection = $collection->sortByDesc('id');
	    
	    $all_posts = array();

	    $buf = $collection;
	    foreach ( $buf as $post_item ) {

		    $post_info = array();
		    $post_info['id'] = $post_item->id;
		    $post_info['post_name'] = $post_item->post_name;
		    $post_info['content'] = $post_item->content;
		    $post_info['short_desc'] = $post_item->short_desc;
		    $post_info['public_start'] = $post_item->public_start;
		    $post_info['policy_view'] = $post_item->policy_view;

		    $post_info['policy_comments'] = $post_item->policy_comments;
		    $post_info['tags'] = explode(',', $post_item->tags);

		    $post_info['avg_rate'] = (int)$post_item->users_stated()->avg('votes') ?? 0;

		    $post_info['cover_img'] = '';
		    $mediaItems  = $post_item->getMedia('post_cover_image');

		    if ($mediaItems->first()) {
			    $post_info['cover_img'] = $mediaItems->first()->getUrl();
		    }

		    $all_posts[] = $post_info;
        }


	    return response()->json(['success' => true, 'data' => $all_posts, '_s' => 'ok_posts']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//		return 'Это мы создаем пост!';

	    //Показать пустую форму редактирования поста (для создания поста)
	    return view('posts.edit');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
    public function store(StorePostRequest $request)
    {
	    //Заполняем поля БД из запроса

	    //$request = $request->validated();
	    //Прошли валидацию
	    //dd($request);

	    //Заменить на
	    //Сделать предобработку отдельных полей в модели
	    //	    $post_db = Post::create($request->all());
//	    return http_redirect()->route('posts.post', $post_db);

	    $post_db = new Post();

	    $post_db->category_id = 1; //пока задаем категорию "Новости" news
	    $post_db->post_name = $request->input('post_name');
	    $post_db->content = $request->input('content');
	    $post_db->short_desc = Str::limit(strip_tags($request->input('content'), 112));

	    $post_db->tags = trim($request->input('tags'),'\"');

	    //Дата-строка объект
	    $post_db->public_start =  Carbon::parse($request->input('public_start'));
	    $post_db->policy_view = $request->input('policy_view');
	    $post_db->policy_comments = $request->input('policy_comments');

	    $post_db->save();

	    if (!empty($request->input('cover_img'))) {
		    //Добавить ссылку на изображение
		    $url = $request->input('cover_img');
		    $post_db
			    ->addMediaFromUrl($url)
			    ->toMediaCollection('post_cover_image');

	    }

	    //Добавление картинки через файл
	    if ($request->hasFile('cover_img_file')) {
//		    $save_path_img_cover = $request->file('cover_img_file')->path();

		    //Добавление картинки к модели
		    $post_db
			    ->addMedia($request->file('cover_img_file'))
			    ->toMediaCollection('post_cover_image');
	    }
	    
	    //Ответ фронтенду
	    $post_frontend = array();
	    $post_frontend['id'] = $post_db->id;
	    $post_frontend['post_name'] = $post_db->post_name;
	    $post_frontend['public_start'] = $post_db->public_start;
	    $post_frontend['policy_view'] = $post_db->policy_view;
	    $post_frontend['policy_comments'] = $post_db->policy_comments;
	    $post_frontend['content'] = $post_db->content;
	    $post_frontend['tags'] = explode(',', $post_db->tags);
	    $post_frontend['isNew'] = true;

        //Итоговая ссылка на изображение
	    $post_frontend['cover_img'] = '';
	    if (!empty($request->input('cover_img')) or $request->hasFile('cover_img_file')) {

		    $post_frontend['cover_img'] = $post_db->getMedia('post_cover_image')[0]->getUrl();
	    }

	    //Отредактирован нужный пост
	    return response()->json(['success' => true, 'data' => $post_frontend, '_s' => 'ok_post_saved']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        //Показать выбранный пост
	    $post_item = $post;
	    $post_info = array();
	    $post_info['id'] = $post_item->id;
	    $post_info['post_name'] = $post_item->post_name;
	    $post_info['content'] = $post_item->content;
	    $post_info['short_desc'] = $post_item->short_desc;
	    $post_info['public_start'] = $post_item->public_start;
	    $post_info['policy_view'] = $post_item->policy_view;

	    $post_info['policy_comments'] = $post_item->policy_comments;
	    $post_info['tags'] = explode(',', $post_item->tags);

	    $post_info['cover_img'] = '';
	    $mediaItems  = $post_item->getMedia('post_cover_image');

	    if ($mediaItems->first()) {
		    $post_info['cover_img'] = $mediaItems->first()->getUrl();
	    }

        //Получить рейтинг статьи если есть
	    $post_info['user_rate'] = null;
	    $current_user_id = 10;

	    if (!$post->users_stated()->where('user_id',$current_user_id)->first()) {

		    $post_info['user_rate'] = $post->users_stated()->where('user_id',$current_user_id)->first()->states->votes;
	    }


	    return response()->json(['success' => true, 'data' => $post_info, '_s' => 'ok_post']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
	    return 'А Это мы РЕДАКТИРУЕМ пост!';

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //Отредактировать пост
	    //$upd_post = Post::find($post->id);

	    //Упростить обновление записей
//	    $post->update($request->all());
//	    return http_redirect()->route('posts.post', $post_db);

	    $upd_post = $post;
	    if ($request->input('post_name')) {
		    $upd_post->post_name = $request->input('post_name');
	    }

	    if ($request->input('content')) {
		    $upd_post->content = $request->input('content');
		    $upd_post->short_desc = Str::limit(strip_tags($request->input('content'), 112));
	    }

		//Пока сохраняем картинку в виде ссылки == далее через медиа либрари
	    if ($request->input('cover_img')) {
		    $upd_post->cover_img = $request->input( 'cover_img' );
	    }

	    if (!empty($request->input('cover_img'))) {

			$upd_post->clearMediaCollection('post_cover_image');

		    //Добавить ссылку на изображение
		    $url = $request->input('cover_img');
		    $upd_post
			    ->addMediaFromUrl($url)
			    ->toMediaCollection('post_cover_image');

	    }

	    //Добавление картинки через файл
	    if ($request->hasFile('cover_img_file')) {
		    //		    $save_path_img_cover = $request->file('cover_img_file')->path();

		    $upd_post->clearMediaCollection('post_cover_image');
		    //Добавление картинки к модели
		    $upd_post
			    ->addMedia($request->file('cover_img_file'))
			    ->toMediaCollection('post_cover_image');
	    }

	    //Теги строка с запятыми
	    if ($request->input('tags')) {
		    $upd_post->tags = $request->input( 'tags' );
	    }

	    //Дата-строка объект
	    if ($request->input('public_start')) {
//		    $upd_post->public_start = $request->input('public_start');
		    $upd_post->public_start =  Carbon::parse($request->input('public_start'));
	    }
	    if ($request->input('policy_view')) {
		    $upd_post->policy_view = $request->input('policy_view');
	    }
	    if ($request->input('policy_comments')) {
		    $upd_post->policy_comments = $request->input('policy_comments');
	    }

	    $status = 'ok_post_edited';

	    if ($request->has('user_rate')) {
		    $rate = (int)$request->input('user_rate');
		    //Пока задаем пользователя по умолчанию
		    $user_id = $request->input('user_id', 10) ;
		    $post->users_stated()->detach($user_id);
		    $post->users_stated()->attach($user_id, ['votes' => $rate]);

		    //$post->users_stated()->sync([$user_id => ['votes' => $rate]]);

		    $status = 'ok_post_add_rate';
	    }

	    $upd_post->save();

		//Подготавливаем информацию для фронта
	    $post_item = $upd_post;

	    $post_info = array();
	    $post_info['id'] = $post_item->id;
	    $post_info['post_name'] = $post_item->post_name;
	    $post_info['content'] = $post_item->content;
	    $post_info['short_desc'] = $post_item->short_desc;
	    $post_info['public_start'] = $post_item->public_start;
	    $post_info['policy_view'] = $post_item->policy_view;

	    $post_info['policy_comments'] = $post_item->policy_comments;
	    $post_info['tags'] = explode(',', $post_item->tags);

	    $post_info['cover_img'] = '';
	    $mediaItems  = $post_item->getMedia('post_cover_image');

	    if ($mediaItems->first()) {
		    $post_info['cover_img'] = $mediaItems->first()->getUrl();
	    }

	    //Отредактирован нужный пост
	    return response()->json(['success' => true, 'data' => $post_info, '_s' => $status ]);
    }

    /*
    public function update(Request $request, $id)
{
    $project = Project::findOrFail($id);
    $project->name = $request->name;
    $project->description = $request->description;

    $post->save();
}
    */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
    	//Удаление поста
	    Post::find($post->id)->delete();

	    return response()->json(['success' => true, 'data' => 'Пост id = '. $post->id .' удален', '_s' => 'ok_post_deleted']);
    }

    /**
     * Получае расширение файла из base64
     * */
	//
	public function get_img_base64($image_64){

		//Пока сохраняем картинку в виде ссылки == далее через медиа либрари
		//	    $save_path_img_cover = $this->get_img_base64($request->input('cover_img'));
	    $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
	    $replace = substr($image_64, 0, strpos($image_64, ',')+1);
	    $image = str_replace($replace, '', $image_64);


	    $image = str_replace(' ', '+', $image);
	    $imageName = Str::random(10).'.'.$extension;
	    $pathImg = 'img/' . $imageName;
	    Storage::disk('public')->put($pathImg, base64_decode($image));

        return $pathImg;
    }

}
