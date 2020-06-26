@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header" style="text-align: center;">Unpark your vehicle</div>
                </div>
                <br>
                <div>
                    <div id="app">
                        @include('flash-message')
                        @yield('content')
                    </div>

                    {{-- form to store user data--}}
                    <form method="POST" action="{{route('unpark_vehicle')}}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="vehicleNumber"
                                   placeholder="Write your vehicle number">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure to wanna unpark this vehicle ?')">Unpark
                            </button>
                            <div><a href="{{ URL::previous() }}" class="btn btn-outline-primary">Go Back</a></div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
