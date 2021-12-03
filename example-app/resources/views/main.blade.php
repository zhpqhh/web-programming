@extends('home')

@section('mainContent')
    <div>
        <div class="text-center" style="margin-top: 2%">
            <img src="{{asset('asa.png')}}" style="margin-right: 10%" class="rounded" height="200" width="200">
            <img src="{{asset('asa.png')}}" style="margin-right: 10%" class="rounded" height="200" width="200">
            <img src="{{asset('asa.png')}}" class="rounded" height="200" width="200">
        </div>
        <button type="button" class="btn btn-light" style="margin-left: 27%; margin-top: 0.2%; height: 40px; " >Заказать</button>
        <button type="button" class="btn btn-light" style="margin-left: 16%; margin-top: 0.2%; height: 40px; " >Заказать</button>
        <button type="button" class="btn btn-light" style="margin-left: 16%; margin-top: 0.2%; height: 40px; " >Заказать</button>
        <div style="margin-top: 0.7%">
            <input height="60"  style="margin-left: 24%">
            <input height="60" width="140" style="margin-left: 10.5%">
            <input height="60" width="140" style="margin-left: 10.5%">
        </div>
        <div class="btn-group" style="margin-left: 27%; margin-top: 0.2%">
            <a href="#" class="btn btn">+</a>
            <a href="#" class="btn btn">-</a>
        </div>
        <div class="btn-group" style="margin-left: 17%; margin-top: 0.2%">
            <a href="#" class="btn btn">+</a>
            <a href="#" class="btn btn">-</a>
        </div>
        <div class="btn-group" style="margin-left: 17%; margin-top: 0.2%">
            <a href="#" class="btn btn">+</a>
            <a href="#" class="btn btn">-</a>
        </div>
    </div>
@stop
