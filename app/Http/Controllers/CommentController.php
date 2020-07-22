<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Comment;

class CommentController extends Controller
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
        $data["result"] = Comment::all();

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

        $data = new Comment();

        $data->content = $request->input("content");
        $data->status = $request->input("status");
        $data->email = $request->input("email");
        $data->author_id = $request->input("author");
        $data->url = $request->input("url");
        $data->post_id = $request->input("post_id");
        $data->save();

        log::info("Data Created");
        return response()->json(["result" => $data], 201);
    }

    public function getById($id)
    {
        $data["status"] = "success";
        $data["result"] = Comment::find($id);

        log::info("data getted by id $id");
        return response()
            ->json($data, 200)
            ->header("Content-Type", "application/json");
    }

    public function delete($id)
    {
        $data = Comment::find($id);

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

        $data->content = $request->input("content");
        $data->status = $request->input("status");
        $data->author_id = $request->input("author_id");
        $data->email = $request->input("email");
        $data->url = $request->input("url");
        $data->post_id = $request->input("post_id");
        $data->save();

        log::info("data updated");

        return response()
            ->json(["result" => $data], 200)
            ->header("Content-Type", "application/json");
    }

    public function allTable()
    {
        $data = Comment::with(array(
            "author" => function ($query) {
                $query->select();
            }
        ))->with(array(
            "post" => function ($query) {
                $query->select();
            }
        ))->get();

        return response()->json(["results" => $data]);
    }
}
