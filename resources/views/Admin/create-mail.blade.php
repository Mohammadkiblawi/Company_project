@extends('layouts.app')
@section('content')

@if(session()->has('message'))
<div class="w-4/5 m-auto mt-10 pl-2">
    <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4 text-center">
        {{ session()->get('message') }}
    </p>
</div>
@endif

<div class="flex justify-center">
    <h1 class="text-2xl md:text-5xl mt-10 ">{{__('Send Emails')}}</h1>
</div>
<div class="grid grid-col-5 mt-7">

    <form class="col-start-2 col-span-3 max-w-4xl" method="POST" action="/send-mail" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div>
            <x-jet-label value="{{__('title')}}" />
            <x-jet-input class="block mt-1 w-full h-10" type="text" name="title" :value="old('title')" autofocus />
        </div>
        <div>
            <x-jet-label value="{{__('Message')}}" />
            <x-jet-input class="block mt-1 w-full h-20" type="textarea" name="message" :value="old('message')" autofocus />
        </div>

        <x-jet-button class="mt-4">
            {{__('Send')}}
        </x-jet-button>
</div>
@endsection