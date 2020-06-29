<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Agent;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = $request->sort;
        if($sort === '1') {
        } else {
        }
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        $agents = Agent::all();

        return view('index',[
            'posts' => $posts,
            'agents' => $agents,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',    
            'content' => 'required|max:255',    
        ]);
        $agents = new Agent;
        $agent = $agents::where('name', $request->agent_id)->first();
        $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'agent_id' => $request->agent_id,
            'review' => $request->review,
        ]);
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agent = Agent::findOrFail($id);
        $posts = Post::query();
        $posts = $posts->where('agent_id', $id)->get();

        $user = new User;

        return view('agent.index',[
            'agent' => $agent,
            'posts' => $posts,
            'user' => $user,
        ]);
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
