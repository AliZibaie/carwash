@extends('layouts.main')
@section('title','services')
@section('content')
    <div class="grid-cols-1 sm:grid md:grid-cols-3 mb-8">
        @foreach($services as $service)

            <div
                class="mx-3 mt-6 flex flex-col rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
                    <img
                        class="rounded-t-lg w-full h-1/2"
                        src="{{ URL::asset("img/$service->name")}}.jpg"
                        alt="{{$service->name}} pic" >

                <div class="px-6 py-0 text-center mt-4 mb-0">
                    <h5
                        class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                        {{$service->name}}
                    </h5>
                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                        price : {{$service->price}}
                    </p>
                    <p class="mb-0 text-base text-neutral-600 dark:text-neutral-200">
                        time : {{$service->time_required}}
                    </p>
                </div>
                <div
                    class="mt-auto border-t-2 border-neutral-100 px-6 py-3 text-center dark:border-neutral-600 dark:text-neutral-50 flex justify-between">
                    <form action="{{route('services.fast.create', $service->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary" name="id" value="{{$service->id}}">
                            Fast Reserve
                        </button>
                    </form>
                    <button type="button" class="btn btn-warning" onclick="my_modal_{{$service->id}}.showModal()">Manual
                        Reserve
                    </button>
                    <dialog id="my_modal_{{$service->id}}" class="modal">
                        <div class="modal-box space-y-4">
                            <h3 class="font-bold ">choose day and the time</h3>
                            <form action="{{route('services.store', $service->id)}}" method="post" class="flex flex-col items-start space-y-4">
                                @csrf
                                <select class="select select-success w-full max-w-xs " name="day">
                                    <option disabled selected>Pick a day</option>
                                    @foreach($days as $day)
                                        <option value="{{$day->name}}">{{$day->name}}</option>
                                    @endforeach
                                </select>
                                <select class="select select-success w-full max-w-xs" name="station">
                                    <option disabled selected>Pick a station</option>
                                    @foreach($stations as $station)
                                        <option value="{{$station->name}}">{{$station->name}}</option>
                                    @endforeach
                                </select>
                                <input type="time" name="time" class="text-black">
                                <div class="modal-action self-end">
                                    <button type="submit" class="btn btn-success" name="id" value="{{$service->id}}">
                                        Set Time
                                    </button>
                                </div>
                            </form>
                        </div>

                    </dialog>
                </div>
            </div>
        @endforeach
        @error('time')
        <p class="text-red-700 mx-auto my-4 text-center text-xl w-96">{{$message}}</p>
        @enderror
        @if(isset($success))
            <p class="text-green-700 mx-auto my-4 text-center text-xl w-96"> {{$success}}</p>
        @elseif(isset($fail))
            <p class="text-red-700 mx-auto my-4 text-center text-xl w-96">{{$fail}}</p>
        @endif
    </div>

@endsection
