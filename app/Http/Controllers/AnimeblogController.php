<?php

namespace App\Http\Controllers;

use App\Models\Animeblog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnimeblogController extends Controller
{
    public function index(Animeblog $animeblog)
    {
        return view('annict.index');
    }
    
    public function Anime(Animeblog $animeblog){
        $client = new \GuzzleHttp\Client();
        
        $url = 'https://api.annict.com/v1/works';
        
        $response = $client->request('GET', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.annict.token'),
                ],
            'query' => [
                'sort_watchers_count' => 'desc',
                'page' =>'5',
                'per_page' => '50',
                ],
                    ]);
        $recomenddata = json_decode($response->getBody(), true);    
        return view('annict.anime',[
            'works' => $recomenddata['works']]);
    }

    public function Recommendations(Animeblog $animeblog)
    {
        // Guzzleを使う場合
        $client = new \GuzzleHttp\Client();

        $url = 'https://api.annict.com/v1/works';

        $response = $client->request('GET', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.annict.token'),
            ],
            'query' => [
                'filter_season' => '2023-autumn',
                'fields' => 'id,title', // fieldsパラメータを修正
            ],
        ]);

        $worksData = json_decode($response->getBody(), true);

        return view('annict.recommendations', [
            'works' => $worksData['works'],
        ]);
    }
}
