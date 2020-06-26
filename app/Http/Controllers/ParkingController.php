<?php

namespace App\Http\Controllers;

use App\Events\ParkingEmailEvent;
use Illuminate\Http\Request;
use App\AvtoParking;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\User;

class ParkingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //home view
    public function index()
    {
        return view('parking.park');
    }

    // method for storing parking data
    public function store(Request $request)
    {
        $request->validate([
            'carNumber' => 'required|unique:avto_parkings,car_number',
            'contactName' => 'required',
            'contactPhone' => 'required|unique:avto_parkings,phone',
            'vehicleType' => 'required'
        ]);

        $user = auth()->user();
        $email = Auth::user()->email;

        $vehicle_type = $request->get('vehicleType');
        $space_used = $vehicle_type === 'truck' ? AvtoParking::TRUCK : AvtoParking::CAR;

        $parking_occupied = AvtoParking::sum('parking_spots');

        if ($parking_occupied + $space_used > AvtoParking::PARKING_SPOTS) {
            return redirect()->route('home')
                ->with('error', 'Parking is full');
        }

        $create_parking = new AvtoParking([
            'type' => $request->get('vehicleType'),
            'car_number' => $request->get('carNumber'),
            'contact_name' => $request->get('contactName'),
            'vehicle_type' => $request->get('vehicleType'),
            'phone' => $request->get('contactPhone'),
            'parking_spots' => $space_used,
            'user_id' => $user->id
        ]);

        $saved = $create_parking->save();
        if ($saved) {
            //event to send email to user when hes parking
            event(new ParkingEmailEvent($email));

            return redirect()->route('home')
                ->with('info', 'Your park your vehicle successfully');
        } else {
            App::abort(500, 'Something Wrong');
        }
    }

    //method for show all cars/trucks in parking
    public function show_full_parking()
    {
        $all_parking = AvtoParking::all();
        return view('parking.full_parking', compact('all_parking'));
    }

    // view for unpark page
    public function unpark()
    {
        return view('parking.unpark');
    }

    // delete record from db ( update deleted_at)
    public function unpark_vehicle(Request $request)
    {
        $vehicle_number = $request->get('vehicleNumber');
        $vehicle = AvtoParking::select('car_number')
            ->where('car_number', $vehicle_number)
            ->count();

        if ($vehicle == 1) {
            AvtoParking::where('car_number', $vehicle_number)->delete();
        } elseif ($vehicle == 0) {
            return redirect()->route('unpark')
                ->with('error', 'Your vehicle is not in the Parking');
        }
        return redirect()->route('home')
            ->with('success', 'You unpark your vehicle successfully');
    }
}
