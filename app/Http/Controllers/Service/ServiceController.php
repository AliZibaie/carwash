<?php

namespace App\Http\Controllers\Service;

use App\enums\DaysEnum;
use App\enums\StationsEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Reservation;
use App\Models\Schedule;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $days = DaysEnum::cases();
        $services = Service::all();
        $stations = StationsEnum::cases();
        return view('services.index', compact('services', 'days', 'stations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreServiceRequest $request)
    {
        //
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
        $place =  $request->validated()['station'];
            $service_id = (int) $request->validated()['id'];
            $service = Service::query()->find($service_id);
            $start_at = $request->validated()['time'];
            $start_at = Carbon::parse($start_at);
            $day = $request->validated()['day'];
            $open_at = Schedule::all()->first()->open_at;
            $close_at = Schedule::all()->first()->close_at;
        $days = DaysEnum::cases();
        $stations = StationsEnum::cases();
        $services = Service::all();
            $end_at = Carbon::parse($start_at)->addMinutes($service->time_required);
        $code = Random::generate(10, '0-9');
            $reservation = ['start_at'=>$start_at,'end_at'=>$end_at, 'station'=>$place, 'code'=>$code, 'day'=>$day, 'service'=>$service];
        if (self::conflictExist($start_at, $end_at, $day, $place)){
            return view('services.index', compact('services', 'days', 'stations'))->with('fail', ' there is a conflict in reservation time');
        }
            Reservation::query()->create($reservation);
            $user_id = Auth::user()->getAuthIdentifier();
            $reservation_id = Reservation::all()->last()->id;
            DB::table('reservation_user')->insert(['reservation_id'=>$reservation_id, 'user_id'=>$user_id]);
        DB::table('service_user')->insert(['service_id'=>$service_id, 'user_id'=>$user_id]);
        return $this->factor($reservation);
    }

    public static function conflictExist($start_time, $end_time, $day, $place)
    {
        return Reservation::query()->where(function ($query) use ($start_time, $end_time) {
            $query->whereBetween('start_at', [$start_time, $end_time])
                ->orWhereBetween('end_at', [$start_time, $end_time]);
        })->where('day','=', $day,)->where('station', '=', $place)->first();
//        $is_open = Schedule::query()->where('open_at' ,'>', $start_at, 'AND', 'close_at', '<', $end_time)->get();

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

    public function factor($factor)
    {
        return view('tracking.factor', compact('factor'));
    }
}
