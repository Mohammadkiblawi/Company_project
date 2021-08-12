@extends('layouts.app')


@section('content')

<div class="flex justify-center">
    <h1 class="text-2xl md:text-5xl mt-10 ">{{__('Add new Project')}}</h1>
</div>
<div class="grid grid-col-5 mt-7">

    <form class="col-start-2 col-span-3 max-w-4xl" method="POST" action="/projects" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div>
            <x-jet-label value="{{__('title')}}" />
            <x-jet-input class="block mt-1 w-full h-10" type="text" name="title" :value="old('title')" autofocus />
        </div>
        <div>
            <x-jet-label value="{{__('Description')}}" />
            <x-jet-input class="block mt-1 w-full h-20" type="textarea" name="description" :value="old('description')" autofocus />
        </div>
        <div class="mt-4">
            <x-jet-label value="{{__('Image')}}" />
            <x-jet-input class="block mt-1 w-full bg-white p-2 " type="file" name="image_path" :value="old('image_path')" required autofocus />
        </div>
        <x-jet-button class="mt-4">
            {{__('Publish')}}
        </x-jet-button>
</div>
@endsection