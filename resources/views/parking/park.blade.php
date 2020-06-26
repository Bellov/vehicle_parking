@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header" style="text-align: center;">Park your vehicle</div>
                </div>
                <br>
                <div>
                    {{-- show errors from validate method--}}
                    @if($errors->any())
                        <div class="alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- form to store user data--}}
                    <form method="POST" action="{{route('parking.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="carNumber">Car Number</label>
                            <input type="text" class="form-control" name="carNumber">
                        </div>
                        <div class="form-group">
                            <label for="contactName">Contact Name</label>
                            <input type="text" class="form-control" name="contactName">
                        </div>
                        <div class="form-group">
                            <label for="contactPhone">Contact Phone</label>
                            <input type="number" class="form-control" name="contactPhone">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="vehicleType">Vehicle Type</label>
                                <select name="vehicleType" class="form-control">
                                    <option>car</option>
                                    <option>truck</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Park</button>
                            <div><a href="{{ URL::previous() }}" class="btn btn-outline-primary">Go Back</a></div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
