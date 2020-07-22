<?php

namespace App\Http\Controllers;

use App\Author;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthorController extends Controller
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

    public function get()
    {
        $data["status"] = "success";
        $data["result"] = Author::all();

        log::info("data showing");
        return response()->json([$data], 200);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'salt' => 'required',
            'email' => 'required',
            'profile' => 'required'
        ]);

        $data = new Author();

        $data->name = $request->input("name");
        $data->password = hash('md5', $request->input("password"));
        $data->salt = password_hash($request->input("salt"), PASSWORD_BCRYPT);
        $data->email = $request->input("email");
        $data->profile = $request->input("profile");
        $data->save();

        log::info("Data Created");
        return response()->json(["result" => $data], 201);
    }

    public function getById($id)
    {
        $data["status"] = "success";
        $data["result"] = Author::find($id);

        log::info("data getted by id $id");
        return response()
            ->json($data, 200)
            ->header("Content-Type", "application/json");
    }

    public function delete($id)
    {
        $data = Author::find($id);

        if ($data) {
            $data->delete();

            log::info("data deleted");

            $response = response()
                ->json(["status" => "success", "result" => $data], 200)
                ->header("Content-Type", "application/json");

            return $response;
        }
    }

    public function update(Request $request, $id)
    {
        $data = Author::find($id);

        $data->name = $request->input("name");
        $data->password = $request->input("password");
        $data->salt = $request->input("salt");
        $data->email = $request->input("email");
        $data->profile = $request->input("profile");
        $data->save();

        log::info("data updated");

        return response()
            ->json(["result" => $data], 200)
            ->header("Content-Type", "application/json");
    }
}
