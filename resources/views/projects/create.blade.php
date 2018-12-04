@extends('layouts.app')

@section('content')
<div class="container">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	@if ($errors->any())
    			<div class="alert alert-danger">
        			<ul>
            			@foreach ($errors->all() as $error)
                			<li>{{ $error }}</li>
            			@endforeach
        			</ul>
    			</div>
			@endif
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="/projects/store">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                               <input name="title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body " class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                            <div class="col-md-6">
                                <textarea name="body"></textarea>
                            </div>
                        </div>


                        <div>
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('post') }}
                                </button>
                            </div>
                        </div>
                        <div class="text-center">
                        	
                        	@foreach($tags as $tag)
                        		<input type="checkbox" id="{{$tag->id}}" name="tag{{$tag->id}}"></input>
                        		<label for="{{$tag->id}}">{{$tag->name}}</label>
                        	@endforeach

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
