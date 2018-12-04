@extends('layouts.app')

@section('content')
<div class="container w-50">
	<div class="card">
		<div class="card-body">
				<h1>{{$project->title}}</h1>
		    	<p>{{$project->user->name}}</p>
		    	<br><br>
		    	<h3>{{$project->body}}</h3>
		</div>
		<div class="w-100" style="text-align: right;"> 
			@foreach($tags as $tag)
				<h5 class="w-25 d-inline bg-primary text-white"style="margin-right: 0px; padding: 2px;">{{$tag->name}}</h5>
			@endforeach
		</div>
		
	</div>
   


<br> <br> <br>


<h5>comments</h5>
@auth
	<form method="POST" action="{{$project->path().'/comment'}}">
	    @csrf

	    <div class="form-group ">
	        <div class="">
	            <textarea class="form-control" name="body"></textarea>
	        </div>
	    </div>


	    <div class="form-group">
	        <div class="mr-2">
	            <button type="submit" class="btn btn-primary">
	                {{ __('Comment') }}
	            </button>
	        </div>
	    </div>
	</form>
@endauth
@foreach($comments as $comment)
	<div class="card mb-2">
		<div class="card-body">
			<h4>{{$comment->body}}</h4>
			<h6>{{$comment->user->name}}</h6>
		</div>
	</div>
	
@endforeach

</div>
@endsection
