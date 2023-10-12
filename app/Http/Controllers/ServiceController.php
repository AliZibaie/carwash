<?php

namespace App\Http\Controllers;

use App\enums\DaysEnum;
use App\Models\Reservation;
use App\Models\Schedule;
use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\User;
use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\s;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $days = DaysEnum::cases();
        $services = Service::all();
        $time = Service::all();
        return view('services.index', compact('services', 'days'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreServiceRequest $request)
    {
    }

    public function fastStore(StoreServiceRequest $request)
    {
        $service_id = (int) $request->validated()['id'];
        $user_id = Auth::user()->getAuthIdentifier();
        dd($request->validated());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $place = (int) $request->validated()['place_id'];
            $service_id = (int) $request->validated()['id'];
            $service = Service::query()->find($service_id);
            $start_at = $request->validated()['time'];
            $start_at = Carbon::parse($start_at);
            $day = $request->validated()['day'];
            $open_at = Schedule::all()->first()->open_at;
            $close_at = Schedule::all()->first()->close_at;
        $days = DaysEnum::cases();
        $services = Service::all();
            $end_at = Carbon::parse($start_at)->addMinutes($service->time_required);
        $code = rand(10000, 100000);
            $reservation = ['start_at'=>$start_at,'end_at'=>$end_at, 'place_id'=>$place, 'code'=>$code];
            $conflictingReservation = Reservation::query()->where(function ($query) use ($start_at, $end_at) {
                $query->whereBetween('start_at', [$start_at, $end_at])
                    ->orWhereBetween('end_at', [$start_at, $end_at]);
                ;
            })->where('day','=', $day,)->where('place_id', '=', $place)->first();
            $is_open = Schedule::query()->where('open_at' ,'>', $start_at, 'AND', 'close_at', '<', $end_at)->get();
//            dd($is_open);
            if ($conflictingReservation){
               return view('services.index', compact('services', 'days'))->with('fail', ' there is a conflict in reservation time');
            }
            Reservation::query()->create($reservation);
            $user_id = Auth::user()->getAuthIdentifier();
            $reservation_id = Reservation::all()->last()->id;
            DB::table('reservation_user')->insert(['reservation_id'=>$reservation_id, 'user_id'=>$user_id]);
        DB::table('service_user')->insert(['service_id'=>$service_id, 'user_id'=>$user_id]);
        return $this->factor($service, $code);
    }

    public function factor($service, $code)
    {
        return view('factor', compact("service", 'code'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
