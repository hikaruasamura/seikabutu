<?php

namespace App\Http\Controllers;
use App\Models\Animeblog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnimeblogController extends Controller
{
    public function index(Animeblog $animeblog)
{
    $client = new \GuzzleHttp\Client();
       
    $url = 'https://api.annict.com/v1/works';
       
    try {
        $response = $client->request('GET', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.annict.key'),
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        // レスポンス内に 'work' キーが存在するか確認
        if (isset($data['work'])) {
            $work = $data['work'];

            return view('recommendations')->with([
                'work' => $work,
            ]);
        } else {
            return view('error', ['message' => 'Annict API からの無効なレスポンス形式']);
        }
    } catch (\GuzzleHttp\Exception\ClientException $e) {
        // GuzzleHttp クライアント例外の処理、例: ネットワークエラー
        return view('error', ['message' => 'Annict API への接続に失敗しました']);
    }
}

}
