@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header text-center">
                        <div class="d-flex align-items-center">
                            <h5 class="mx-auto w-100">Dashboard</h5>
                        </div>
                    </div>

                    <div id="app">
                        @include('flash-message')
                        @yield('content')
                    </div>
                    <button type="button" class="btn btn-disabled" disabled>
                        <h1>Free parking spots <span
                                class="badge badge-info">{{$parking_space}}</span></h1>
                    </button>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <a class="btn btn-info" href="{{route('parking.index')}}">Park vehicle</a>
                    <a type="button" class="btn btn-danger" href="{{route('unpark')}}">Unpark vehicle</a>
                    <a type="button" class="btn btn-info" href="{{route('full_parking')}}">Show parking</a>
                </div>
            </div>
        </div>
    </div>
@endsection
