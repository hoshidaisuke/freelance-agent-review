<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Agent;
use App\Area;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $area_id = $request->area;
        $feature = $request->feature;
        $fee = $request->fee;
        $query = Agent::query();

        $posts = Post::all();


        // エリア
        if(isset($area_id) && $area_id !== '0') {
            $area = Area::findOrFail($area_id);
            $query = $area->agent();
        }

        // 特徴
        if(isset($feature)) {
            for($i = 0; $i < count($feature); $i++){
                if(!empty($feature[$i] === 'welfare')) {
                    $query->where('welfare', '=', '1');
                }
                if(!empty($feature[$i] === 'remote')) {
                    $query->where('remote', '=', '1');
                }
                if(!empty($feature[$i] === 'site')) {
                    $query->where('site', '=', '1');
                }
                if(!empty($feature[$i] === 'highprice')) {
                    $query->where('highprice', '=', '1');
                }
                if(!empty($feature[$i] === 'margin')) {
                    $query->where('margin', '=', '1');
                }
            }
        }
                
        // 平均単価
        if(isset($fee)) {
            $query->whereIn('fee_id', $fee);
        }

        $agents = $query->get();


        return view('index',[
            'agents' => $agents,
            'area_id' => $area_id,
            'posts' => $posts,
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
            'content' => 'required|max:510',    
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
        $Area = new Area;
        $posts = Post::orderBy('id', 'desc');
        $posts = $posts->where('agent_id', $id)->paginate(5);
        $areas = $agent->area()->get();


        $user = new User;

        return view('agent.index',[
            'agent' => $agent,
            'posts' => $posts,
            'user' => $user,
            'areas' => $areas,
            'Area' => $Area,
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
