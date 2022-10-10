<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client;
use Carbon\Carbon;

class TestapiController extends Controller
{
    
    private $api_token = '';
    public function __construct()
    {
        $this->api_token = config('services.sports_api_token.api_token');
    }
    public function index()
    {
        $uri = 'http://api.football-data.org/v2/competitions/BL1/matches';
        $header = array('headers' => array('X-Auth-Token' => $this->api_token));
        $cache_key = 'api.football-data.org/v2/competitions/BL1/matches';
        $matches = '';
        $client = new Client();
        if (Cache::has($cache_key)) {
            $matches = Cache::get($cache_key);
            
            \Log::debug(__LINE__.' '.__METHOD__.' キャッシュあり ');
            \log::debug(print_r($matches,true));
        } else {
            $response = $client->get($uri, $header);
            $body = $response->getBody();
            $body_decoded = json_decode($body,false);
            $matches = $body_decoded->matches;
            //$matches = json_decode($matches, true);
            Cache::put($cache_key, json_encode($matches), 3600);
            \Log::debug(__LINE__.' '.__METHOD__.' キャッシュなし ');
            \log::debug(print_r($matches,true));
            $matches = json_encode($matches);
        }
        // dd($matches);
        // $date = new Carbon('2021-08-14T13:30:00Z');
        // echo $date->format('Y年m月d日 G:i');
        $matches_decoded = json_decode($matches, true);
        //echo '<pre>' .print_r($matches_decoded,true).'</pre>';
        return view('testapi.index', ['matches' => $matches_decoded]);
    }
    
    public function api()
    {
        $uri = 'http://api.football-data.org/v2/competitions/BL1/matches';
        $header = array('headers' => array('X-Auth-Token' => $this->api_token));
        $cache_key = 'api.football-data.org/v2/competitions/BL1/matches';
        $matches = '';
        $client = new Client();
        if (Cache::has($cache_key)) {
            $matches = Cache::get($cache_key);
            
            \Log::debug(__LINE__.' '.__METHOD__.' キャッシュあり ');
            \log::debug(print_r($matches,true));
        } else {
            $response = $client->get($uri, $header);
            $body = $response->getBody();
            $body_decoded = json_decode($body,false);
            $matches = $body_decoded->matches;
            //$matches = json_decode($matches, true);
            Cache::put($cache_key, json_encode($matches), 3600);
            \Log::debug(__LINE__.' '.__METHOD__.' キャッシュなし ');
            \log::debug(print_r($matches,true));
            $matches = json_encode($matches);
        }
        //dd($matches);
        $matches_decoded = json_decode($matches, true);
        //echo '<pre>' .print_r($matches_decoded,true).'</pre>';
        return response()->json($matches);
        
        //view('testapi.index', ['matches' => $matches_decoded]);
    }
}
