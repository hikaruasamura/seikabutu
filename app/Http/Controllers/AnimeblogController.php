<?php

namespace App\Http\Controllers;
use App\Models\Animeblog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnimeblogController extends Controller
{
    public function index(Animeblog $animeblog){
        return view('animeblogs.index')->with(['animeblogs' => $animeblog->get()]);
    }
    
    public function recommendAnime(){
        $apiKey = config('services.annict.key');
        $response = Http::withHeaders([
            'Authorization' => "Bearer $apiKey",
            ])->get('https://api.annict.com/v1/me/recommendations');
            
            $animes = $response->json();
            
            
            if (isset($animes['errors'])) {
        $errors = $animes['errors'];

        // エラータイプによって異なる処理を行う
        foreach ($errors as $error) {
            switch ($error['type']) {
                case 'invalid_params':
                    // パラメータに不備がある場合の処理
                    // 開発者向けのエラーメッセージをログに出力
                    \Log::error('Annict API エラー: ' . $error['developer_message']);
                    // ユーザー向けのエラーメッセージを表示するか、リダイレクトするなど
                    return view('error', ['message' => $error['message']]);
                    break;

                // 他のエラータイプに対する処理を追加できる

                default:
                    // 未知のエラータイプの場合のデフォルト処理
                    // ログに出力してユーザーに一般的なエラーメッセージを表示するなど
                    \Log::error('Annict API 未知のエラータイプ: ' . json_encode($error));
                    return view('error', ['message' => 'Annict API からエラーが返されました。']);
            }
        }
    }
    　　　　dd($animes);
            return view('/annict/recommendations', ['animes' => $animes]);
    }
}
