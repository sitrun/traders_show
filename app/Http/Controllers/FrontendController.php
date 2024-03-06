<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    //
	//
	public function index( Request $request){

		$fullUrl = $request->getRequestUri();
//		$fullUrl = $request->fullUrl();
//		dd($request->getRequestUri());

		//$response = Http::get('https://srs.myrusakov.ru/');

		$response = Http::baseUrl('http://localhost:5777')->get($fullUrl)->where('path', '.*');
//		$response = Http::get('http://localhost:5777' . $fullUrl);
//		$response = Http::baseUrl('http://localhost:5777')->get($request->fullUrl());

		return $response->body();
	}

	function filterHeaders($headers) {
		$allowedHeaders = ['accept', 'content-type'];

		return array_filter($headers, function($key) use ($allowedHeaders) {
			return in_array(strtolower($key), $allowedHeaders);
		}, ARRAY_FILTER_USE_KEY);
	}

	//
	public function index_power(Request $request ){

		$fullUrl = $request->getRequestUri();
		// create request according to our needs. we could add
		// custom logic such as auth flow, caching mechanism, etc
		$resp = Http::withOptions([
			'base_uri' => 'http://localhost:5777',
		])->get($fullUrl);

		// recreate response object to be passed to actual caller
		// according to our needs.
		return response($resp->getBody()->getContents(), $resp->getStatusCode())
			->withHeaders($resp->getHeaders());
			//->withHeaders(filterHeaders($resp->getHeaders()));



	}
}
