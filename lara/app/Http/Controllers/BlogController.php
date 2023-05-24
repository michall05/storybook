<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    public function home () {
        //retrieve the posts from Strapi
        $response = Http::withToken(env('STRAPI_API_TOKEN'))->get(env('STRAPI_URL') . '/api/blogs');
        $posts = [];

        if ($response->failed()) {
            if (isset($data['error'])) {
                Log::error('Server error: ' . $data['error']['message']);
            } else {
                Log::error('Request Failed');
            }
        } else {
            //get posts from response
            $posts = $response->json('data');
        }

        return view('home', ['posts' => $posts]);
    }
}
