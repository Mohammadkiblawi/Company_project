@extends('layouts.app')
@section('content')

<div class="flex justify-center">
    <h1 class="text-2xl md:text-5xl mt-10 ">{{__('Edit Project')}}</h1>
</div>
<div class="grid grid-col-5 mt-7">

    <form class="col-start-2 col-span-3 max-w-4xl" method="POST" action="/projects/{{$project->id}}" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('PUT')
        <div>
            <x-jet-label value="{{__('title')}}" />
            <x-jet-input class="block mt-1 w-full h-10" type="text" name="title" value="{{$project->title}}" autofocus />
        </div>
        <div>
            <x-jet-label value="{{__('Description')}}" />
            <x-jet-input class="block mt-1 w-full h-20" type="textarea" name="description" value="{{$project->description}}" autofocus />
        </div>
        <div class="mt-4">
            <x-jet-label value="{{__('Image')}}" />
            <x-jet-input class="block mt-1 w-full bg-white p-2 " type="file" name="image_path" value="{{$project->image_path}}" autofocus />
        </div>
        <x-jet-button class="mt-4">
            {{__('Save')}}
        </x-jet-button>
</div>
@endsection