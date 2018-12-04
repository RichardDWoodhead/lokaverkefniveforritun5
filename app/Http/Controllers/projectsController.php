<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project;
use App\comment;   
use App\tag;
use App\project_tags;

class projectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = project::all();
        $tags = tag::all();
        $project_tags = project_tags::all();
        $query = [];
        foreach ($tags as $tag) {
            if(Request($tag->name) == "on"){
                array_push($query, $tag);
            }
        }
        return view('projects/index',compact("projects","tags","query","project_tags"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = tag::all();
        return view('projects/create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags = tag::all();

        request()->validate([
            'title'=>'required|max:255',
            'body'=>'required'
        ]);

        $project = project::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        foreach ($tags as $tag) {
            if(Request("tag".$tag->id)){

                project_tags::create([
                    'project_id' => $project->id,
                    'tag_id' => $tag->id
                ]);
            }
        }

        return redirect($project->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    { 
        $comments = comment::where('project_id',$project->id)->get();
        $project_tags = project_tags::where('project_id',$project->id)->get();
        $tags = [];
        foreach ($project_tags as $project_tag) {
            $ctag = tag::where('id',$project_tag->tag_id)->get();
            array_push($tags, $ctag[0]);
        }
        return view("projects/show",compact("project","comments","tags"));   
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
