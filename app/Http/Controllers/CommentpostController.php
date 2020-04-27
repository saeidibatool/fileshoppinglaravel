<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            // 'comment' => 'string',
            // 'user_id' => 'unique:users,id',
            // 'rate'=>'required',
        ]);

        $id = $request['user_id'];

        $post = Post::find($request['post_id']);
        //===== comment =========
        if($request->comment){
            $comment = new Comment;
            $comment->user_id = $id;
            $comment->comment = $request['comment'];
            $comment->status = '0';
            $post->comments()->save($comment);
            return back()->with('success','ذخیره  نظر شما انجام شد');

        }
       
        //==== rating ===========
        elseif($request['rate']){
            $rating = new \willvincent\Rateable\Rating;
            $rating->rating = $request->rate;
            $rating->user_id = $id;
            $post->ratings()->save($rating);
            return back()->with('success','ذخیره  امتیاز شما انجام شد');

        }
        elseif($request->comment && $request['rate']){

            $comment = new Comment();
            $comment->user_id = $id;
            $comment->comment = $request['comment'];
            $comment->status = '0';
            $post->comments()->save($comment);

            $rating = new \willvincent\Rateable\Rating;
            $rating->rating = $request->rate;
            $rating->user_id = $id;
            $post->ratings()->save($rating);

            return back()->with('success','ذخیره  نظروامتیاز شما انجام شد');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
