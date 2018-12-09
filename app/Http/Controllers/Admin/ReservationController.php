<?php

namespace App\Http\Controllers\Admin;

use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Toastrr, Input, Redirect; 

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
    	return view('admin.reservation.index' , compact('reservations'));
    }

    public function status($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();
        Toastr::success('Reservation successfully confirmed', 'Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function destory($id)
    {
        Reservation::find($id)->delete();
        Toastr::success('Reservation successfully deleted', 'Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}