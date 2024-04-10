<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index()
    {
        $url = "https://www.reinfolib.mlit.go.jp/ex-api/external/XIT001?year=2015&area=13";

        $response = Http::withHeaders([
            "Ocp-Apim-Subscription-Key" => "3bd5b3c5ba5d4d1d8b04703622709715"
        ])->get($url);

        $str = $response->json();

        var_dump($response->json());
        //アクセスした後データの確認。
        //HTTPステータスに問題がなければそのままデータを返す、
        //問題があれば空の配列を返す。
        if ($response->ok() === TRUE) {
            return mb_convert_encoding($response->json(), "UTF-8", "auto");
            // return $response->json();
            return response()->json(
                [],
                200,
                [],
                JSON_UNESCAPED_UNICODE
            );
        } else {
            return array();
        }
    }
}
