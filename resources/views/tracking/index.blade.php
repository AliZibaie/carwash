{{--@dd($reserved, $service)--}}
@extends('layouts.main')
@section('title','services')
@section('content')
   @if($reserved && $service)
       <div class="card lg:card-side bg-base-100 shadow-xl mb-32 mt-8 p-24">
           <figure><img class="w-full h-full" src="{{ URL::asset("img/$service->name")}}.jpg" alt="{{$service->name}}"/></figure>
           <div class="card-body">
               <h2 class="card-title">{{$service->name}}</h2>
               <p>price : {{$service->price}}</p>
               <a class="link link-success" href="{{route('tracking.factor')}}">your factor</a>
               <div class="card-actions justify-end">
                   <form action="{{route('tracking.destroy', $service)}}" method="post" class="flex justify-between w-1/4" >
                       @csrf
                       <button class="btn btn-error">Delete</button>
                       <a class="btn btn-primary" href="{{route('tracking.edit', $service)}}">Edit Time</a>
                   </form>
               </div>
           </div>
       </div>
   @else
       <p class="py-64 flex justify-center items-center text-2xl">there is no reservation yet!</p>
   @endif
@endsection

