<?php 
    function has_tags($project,$query,$project_tags){
        foreach ($project_tags as $project_tag) {
            if($project_tag->project_id == $project->id){
                foreach ($query as $cquery) {
                    if($cquery->id == $project_tag->tag_id){
                        return true;
                    }
                }
            }
            
        }
        return false;
    }

?> 



@extends('layouts.app')

@section('content')
<div class="container">

    <form method="GET" action="projects">
        @foreach($tags as $tag)
            <input type="checkbox" id="{{$tag->id}}" name="{{$tag->name}}">
            <label for="{{$tag->id}}">{{$tag->name}}</label>
        @endforeach
        <button type="submit">Search</button>
    </form>

    @foreach($projects as $project)
        @if(has_tags($project,$query,$project_tags))
            <div class="card">
                <a style="text-decoration: none;color:black;" href="{{$project->path()}}">
                    <div class="card-body">
                        <h1 class="card-title">
                            <?=$project->title ?>
                        </h1>
                        <p class="card-text">
                            <?=$project->user->name?>
                        </p>
                    </div>
                </a>
            </div>
        @endif
    @endforeach

</div>
@endsection
