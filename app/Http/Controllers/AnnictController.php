<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class AnnictController extends Controller
{
    public function index()
    {
        return view('annict.index');
    }

    public function recommend(Request $request)
    {
        $api_key = "ここにあなたのAnnict APIキーを入力";
        $user_id = 123; // あなたのAnnictユーザーIDを入力

        // Annict APIからユーザーの視聴履歴を取得
        $api_url = "https://api.annict.com/v1/me/works?access_token=$api_key";
        $response = Http::get($api_url);
        $watched_anime = $response->json();

        // 視聴履歴がない場合はダミーデータを使用
        if (empty($watched_anime)) {
            $watched_anime = [
                ['title' => 'Dummy Anime 1'],
                ['title' => 'Dummy Anime 2'],
                ['title' => 'Dummy Anime 3']
            ];
        }

        // 視聴履歴からランダムにアニメを選択
        $random_anime = $watched_anime[array_rand($watched_anime)]['title'];

        // ユーザーの名前と好きなジャンルを取得
        $name = $request->input('name');
        $genre = $request->input('genre');

        // 結果をビューに渡す
        return view('annict.recommend', compact('name', 'genre', 'random_anime'));
    }
    public function search(Request $request)
    {
        $api_key=Config::get('service.annict.access_token');
        $keyword =$request->input('keyword');
        $api_url ="https://api.annict.com/v1/works?access_token=$api_key$filter_title=$keyword";
        $response = Http::get($api_url);
        $search_results = $response->json();
        
        return view('anict.search', compact('keyword','search_results'));
    }
    
    public function tagSearch(Request $request)
    {
        $api_key = Config::get('service/annict.api_token');
        
        $tag = $request->input('tag');
        
        $api_url ="https://api.annict.com/v1/work?access_token=$api_key&filter_tags=$tag";
        $response = Http::get($api_url);
        $tag_search_results = $response->json();
        
        return view('annict.tag_search', compact('tag', 'tag_search_results'));
    }
}
