@extends('layouts.app')

@section('content')
    <h1><p>Admin Area</p></h1>

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <h2>Messages:</h2>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Theme:</th>
                    <th scope="col">Message:</th>
                    <th scope="col">User Name:</th>
                    <th scope="col">User Email:</th>
                    <th scope="col">Path in file:</th>
                    <th scope="col">Created at:</th>
                    <th scope="col">Mark:</th>
                </tr>
                </thead>
                <tbody>
                @if ($messages != NULL)
                    @foreach($messages as $message)
                        <tr>
                            <td><a href="{{ route('mes.show',[$message->id]) }}"> № {{ $message->id }} </a></td>
                            <td>{{ $message->theme }}</td>
                            <td>{{ $message->message }}</td>
                            <td>{{ $message->user->name }}</td>
                            <td>{{ $message->user->email }}</td>
                            <td>{{ 'storage/app/public/upload/'.$message->filename }}</td>
                            <td>{{ $message->created_at }}</td>
                            <td>{{ $message->mark }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection




