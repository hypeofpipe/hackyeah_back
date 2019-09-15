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
                        <tr class="text-center align-middle">
                            <th>ID</th>
                            <th>Image</th>
                            <th>Type of trash</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $trash)
                            <tr class="text-center">
                                <td>{{$trash->id}}</td>
                                <td>
                                    <a href="{{ url('/uploads/')}}/{{$trash->image_path}}" target="_blank">
                                        <img style="width: 40px; height: 40px;" src="{{ url('/uploads/')}}/{{$trash->image_path}}" class="img-thumbnail" alt="{{$trash->id}}">
                                    </a>
                                </td>
                                <td>{{$trash->category->name}}</td>
                                <td>
                                    <a href="https://www.google.com/maps/place/{{$trash->location}}" target="_blank">
                                        {{$trash->location}}
                                    </a>
                                </td>
                                <td>
                                    <div class="col-md-2" style="max-width: inherit;">
                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="danger" data-on="Polluted" data-off="Clean" data-offstyle="success">
                                    </div>
                                </td>
                                <td>{{$trash->created_at->format('d/m/Y H:i:s')}}</td>
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
