<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Post;

class PostController extends Controller
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
        // $data["status"] = "success";
        $data["result"] = Post::all();

        log::info("data showing");
        return response()->json([$data], 200);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'tags' => 'required',
            'status' => 'required',
            'author_id' => 'required'
        ]);

        $data = new Post();

        $data->title = $request->input("title");
        $data->content = $request->input("content");
        $data->tags = $request->input("tags");
        $data->status = $request->input("status");
        $data->author_id = $request->input("author");
        $data->save();

        log::info("Data Created");
        return response()->json(["result" => $data], 201);
    }

    public function getById($id)
    {
        // $data["status"] = "success";
        $data = Post::find($id);

        if (!$data) {
            return response()->json(["message" => "$id not found!"], 404);
        }
        log::info("data getted by id $id");
        return response()
            ->json(["result" => $data], 200)
            ->header("Content-Type", "application/json");
    }

    public function delete($id)
    {
        $data = Post::find($id);

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
        $data = Post::find($id);

        $data->title = $request->input("title");
        $data->content = $request->input("content");
        $data->tags = $request->input("salt");
        $data->status = $request->input("status");
        $data->author_id = $request->input("author_id");
        $data->save();

        log::info("data updated");

        return response()
            ->json(["result" => $data], 200)
            ->header("Content-Type", "application/json");
    }

    public function relAuthor()
    {
        $data = Post::with(array("author" => function ($query) {
            $query->select();
        }))->get();

        return response()->json(["result" => $data], 200);
    }

    public function relAuthorById($id)
    {
        // $byId = Post::find($id);
        $data = Post::where("id", $id)->with(array("author" => function ($query) {
            $query->select();
        }))->get();

        return response()->json(["result" => $data], 200);
    }
}
