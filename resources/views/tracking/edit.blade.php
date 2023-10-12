@extends('layouts.main')
@section('title','services')
@section('content')
<form action="{{route('tracking.update', $reserve_id)}}" method="post" class="flex flex-col space-y-6 px-12 items-center mt-32 mb-56">
    @csrf
    <input name="time" type="datetime-local" class="w-1/3" value="{{$time}}">
    <div class="flex justify-between w-1/3">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('tracking.index')}}" class="btn btn-success">Back</a>
    </div>
</form>
@endsection

