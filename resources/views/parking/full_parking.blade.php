@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Parking</div>
                    <table class="table">

                        <thead>

                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">carNumber</th>
                            <th scope="col">carType</th>
                            <th scope="col">ownerName</th>
                            <th scope="col">ownerPhone</th>
                            <th scope="col">ownerEmail</th>
                            <th scope="col">date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_parking as $parking)
                            <tr>
                                <td>{{$parking->id}}</td>
                                <td>{{$parking->car_number}}</td>
                                <td>{{$parking->vehicle_type}}</td>
                                <td>{{$parking->user->name}}</td>
                                <td>{{$parking->phone}}</td>
                                <td>{{$parking->user->email}}</td>
                                <td>{{$parking->created_at->format('d.m.Y')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <div><a href="{{ URL::previous() }}" class="btn btn-outline-primary">Go Back</a></div>
                </div>

            </div>
        </div>
    </div>
@endsection

