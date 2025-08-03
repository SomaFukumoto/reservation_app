<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Staff;
use App\Models\Reservation;

use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        $menus = Menu::all();
        $staffs = Staff::all();
        return view('reservations.create', compact('menus', 'staffs'));
    }

    public function store(Request $request)
    {



        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'reservation_at' => 'required|date|after:now',
            'staff_id' => 'required|exists:staffs,id',
        ]);


        Reservation::create([
            'user_id' => auth()->id(),
            'menu_id' => $request->menu_id,
            'staff_id' => $request->staff_id,
            'reservation_at' => $request->reservation_at,
            'status' => 'pending',
        ]);

        return redirect()->route('reservations.index');
    }

    public function index()
    {
    $reservations = Reservation::with(['user', 'menu', 'staff'])
    ->where('user_id', auth()->id())
    ->get();

    return view('reservations.index', compact('reservations'));
}


    public function cancel(Reservation $reservation)
{
    if (auth()->id() !== $reservation->user_id) {
        abort(403);
    }

    $reservation->status = 'canceled';
    $reservation->save();

    return redirect()->route('reservations.index');
}




}
