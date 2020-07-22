<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
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

    public function index($age)
    {
        $data["status"] = "success";
        $data["age"] = $age;
        return response($content = $data, $status = 200)
            ->header("Content-Type", "application/json")
            ->header("Author", "iman");
    }

    public function create(Request $request)
    {
        $data["status"] = "success created";
        $data["result"] = [
            "name" => $request->input("name"),
            "class" => $request->input("class")
        ];
        return response($content = $data, $status = 201)
            ->header("Content-Type", "application/json")
            ->header("Author", "iman");
    }

    //
}
