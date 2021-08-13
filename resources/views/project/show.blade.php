@extends('layouts.app')
@section('content')

<div class="p-10 flex justify-center ">
    <!--Card 1-->
    <div class="rounded overflow-hidden shadow-lg max-w-3xl">
        <img class="w-full" src="/storage/{{$project->image_path}}" alt="{{$project->title}}">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{$project->title}}</div>
            <p class="text-gray-700 text-base">
                {{$project->description}}
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Created on {{date('jS M Y',strtotime($project->updated_at))}}</span>
        </div>
        @if(Auth::user()->role==1)
        <a href="/projects/{{$project->id}}/edit" class="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100 mb-3">Edit</a>
        <form class="inline-block" action="{{route('projects.destroy',$project->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100 mb-3" type="submit" onclick="return confirm('Are you sure you want to delete this Project? this will delete your post permanently.')">
                <i class="fa fa-trash">
                </i>
            </button>
        </form>
        @endif
    </div>
</div>



@endsection