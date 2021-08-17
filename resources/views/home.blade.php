@extends('layouts.app')
@section('content')

<div>
    <div class="relative items-center justify-center font-bold mb-10 mt-10">
        <!-- Header Text-->
        <h1 class="text-center text-4xl font-bold p-4 text-gray-400">{{__('Welcome to Our Company Website')}}</h1>
        <div class="background-image grid grid-cols-1 m-auto">
            <div class="flex text-gray-100 pt-10">
                <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                    <h1 class="sm:text-gray-400 text-5xl uppercase fontbold text-shadow-md pb-14">
                        {{__('See Our Recent Projects')}}
                    </h1>
                    <a href="/projects" class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                        {{__('View Recent Projects')}}</a>
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>
@if(Auth::user()->role==2)
<footer>
    <form method="POST" action="/users">
        @csrf

        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">

        <h1 class=" text-center text-4xl font-bold p-4 text-gray-400">{{__('Subscribe for latest news')}} </h1>
        <div class=" flex flex-wrap -mx-3 mb-6 justify-center">
            <div class="w-3/4 px-3 mt-10">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    {{__(' E-mail')}}
                </label>
                <input name="email" class="  appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email">

            </div>
        </div>

        <div class="md:flex md:items-center ">
            <div class="md:w-1/3 text-center ">
                <button class="  shadow bg-blue-400 hover:bg-blue-200 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    {{__('Subscribe')}}
                </button>
            </div>
    </form>




</footer>

@endif
<!-- Footer -->
<div class="mt-10 bottom-0 text-center py-10">
    <h4 class="text-sm font-semibold text-gray-600 "> &COPY; 2021 K.I.B.S</h4>
</div>
@endsection