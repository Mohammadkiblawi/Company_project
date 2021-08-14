@extends('layouts.app')
@section('content')
<div class="container text-center flex justify-center ">
    <table class="table-fixed border-separate border-4 p-5 m-10 w-full ">
        <thead>
            <tr>
                <th class=" ">Id</th>
                <th class="">Name</th>
                <th class=" ">Email</th>

            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="p-10">{{$user->id}}</td>
                <td class="p-10">{{$user->name}}</td>
                <td class="p-10">{{$user->email}}</td>


            </tr>
            @endforeach

        </tbody>
    </table>
</div>



@endsection