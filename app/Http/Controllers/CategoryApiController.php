<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryApiController extends Controller
{
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function show(Category $category)
	{
		//Выводим посты по переданной категории
		$post_collect = $category->posts();
		$collection = $post_collect->get();
		$collection = $collection->sortByDesc('id');
		//	    dd($posts->count());

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


		return response()->json(['success' => true, 'data' => $all_posts, '_s' => 'ok_category_news_posts']);
	}
}
