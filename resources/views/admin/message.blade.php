@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <h4>Message:</h4>
        </div>
        <hr>
        <div class="row justify-content-md-center">
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
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->theme }}</td>
                    <td>{{ $message->message }}</td>
                    <td>{{ $message->user->name }}</td>
                    <td>{{ $message->user->email }}</td>
                    <td>{{ 'storage/app/public/upload/'.$message->filename  }}</td>
                    <td>{{ $message->created_at }}</td>
                    <td>
                        <form action="{{ route('mark') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="id" hidden="true" value = "{{ $message->id }}">
                            <input type="submit" value="Mark Answered">
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

