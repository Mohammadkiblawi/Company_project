@extends('layouts.app')
@section('content')
<div class="container text-center flex justify-center ">
    <table class="table-fixed border-separate border-4 p-5 m-10 w-full ">
        <thead>
            <tr>
                <th class=" ">Id</th>
                <th class=" ">Email</th>

            </tr>
        </thead>
        <tbody>
            @foreach($emails as $email)
            <tr>
                <td class="p-10">{{$email->id}}</td>
                <td class="p-10">{{$email->email}}</td>


            </tr>
            @endforeach

        </tbody>
    </table>
</div>



@endsection