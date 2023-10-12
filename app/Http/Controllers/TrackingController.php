<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->getAuthIdentifier();
        $user = User::find($user_id);
        $reserve_id = DB::table('reservation_user')->select('reservation_id')->where('user_id', '=', $user_id);
        $service_id = DB::table('service_user')->select('service_id')->where('user_id', '=', $user_id);
        $reserved = Reservation::find($reserve_id);
        $service = Service::find($service_id);
        return view('tracking.index', compact('service', 'reserved'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::find($id);
        return view('tracking.edit', compact("service"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('tracking.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $id)
    {
        $user_id = Auth::user()->getAuthIdentifier();
        $reserve_id = DB::table('reservation_user')->select('reservation_id')->where('user_id', '=', $user_id);
        Reservation::query()->delete($reserve_id);
        $service_id = DB::table('service_user')->select('service_id')->where('user_id', '=', $user_id);
        $user = User::find($user_id);
        $user->reservations()->detach();
        $user->services()->detach();
        return Inertia::render('Dashboard');
    }
}
