@extends('layouts.app')
@section('content')
@if(session()->has('message'))
<div class="w-4/5 m-auto mt-10 pl-2">
    <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4 text-center">
        {{ session()->get('message') }}
    </p>
</div>
@endif
<div class="relative items-center justify-center font-bold mb-10 mt-15  ">
    <div class="lg:flex items-center container flex-wrap mt-12 ">
        @foreach ($projects as $project)

        <!-- Card 1 -->
        <div class="lg:m-5 shadow-md hover:shadow-lg hover:bg-gray-100 rounded-lg bg-white my-12 mx-8 w-100">
            <!-- Card Image -->
            <div>
                <img src="/storage/{{$project->image_path}}" alt="{{$project->title}}" class=" w-96 h-96 overflow-hidden m-5" srcset="">
            </div>
            <!-- Card Content -->
            <div class="p-4">
                <h3 class="font-medium text-gray-600 text-3xl my-2 uppercase">{{$project->title}}</h3>
                <div>
                    <p class="text-justify break-words w-96">{{$project->description}}</p>
                </div>
                <div class="mt-5 mb-5">
                    <a href="/projects/{{$project->id}}" class="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100 mb-3">Read More</a>
                </div>
                <span class="font-bold italic text-gray-800">Created on {{date('jS M Y',strtotime($project->updated_at))}} </span>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection