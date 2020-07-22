<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    protected function generate(Request $request)
    {
        $key = "example_key";
        $payload = [
            'iss' => "lumen-jwt",
            'sub' => $request->input('name'),
            'lat' => time(),
            'exp' => time()
        ];

        $jwt = JWT::encode($payload, $key);
        // $decode = JWT::decode($jwt, $key, array('h5256'));

        Log::info("generating...");
        return response()->json(["token" => $jwt]);
    }

    public function auth(Request $request)
    {
        return $this->generate($request);

        // return abort(401);
    }
}
