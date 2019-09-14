@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Requests</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Type of trash</th>
                            <th>Location</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $trash)
                            <tr>
                                <td>{{$trash->id}}</td>
<!--                                <td>{{$trash->image_path}}</td>-->
<!--                                <td>{{$trash->category()}}</td>-->
                                <td>{{$trash->location}}</td>
                                <td>{{$trash->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
