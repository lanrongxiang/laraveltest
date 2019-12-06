@extends('layouts.app')


@section('content')
    <div class="container">
        @if (count($projects)>0)
            <div class="card-group">
                @foreach ($projects as $project) 
                    <a href="projects/{{ $project->id }}" class="col-3 my-3">
                        <div class="card">
                            <img src="{{ asset('storage/thumbs/cropped/'.$project->thumbnail )}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title text-center">{{ $project->name }}</h6>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
         @endif
        @include('porjects._createModal')
        
    </div>
@endsection

