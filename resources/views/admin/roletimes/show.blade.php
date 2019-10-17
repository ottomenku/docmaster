@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Letöltési jogok</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/roletimes') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
<br/><br/>
<div class="row">
    <div class="col-md-4"><h4>Felhasználó név</h4></div><div class="col-md-8"><h4> {{$roletime->user->name ?? ''}}</h4></div>
</div>
<div class="row">
    <div class="col-md-4"><h4>Letöltési jog</h4></div><div class="col-md-8"><h4>{{$roletime->role->name ?? ''}}</h4></div>
</div>
<div class="row">
    <div class="col-md-4"><h4>Start</h4></div><div class="col-md-8"><h4>{{$roletime->start}}</h4></div>
</div>
<div class="row">
    <div class="col-md-4"><h4>End</h4></div><div class="col-md-8"><h4>{{$roletime->end}}</h4></div>
</div>
<div class="row">
    <div class="col-md-4"><h4>Admin</h4></div><div class="col-md-8"><h4>{{$roletime->admin->name ?? ''}}</h4></div>
</div>
<div class="row">
    <div class="col-md-4"><h4>Feljegyzés</h4></div><div class="col-md-8"><h4>{{$roletime->note ?? ''}}</h4></div>
</div>
<div class="row">
    <div class="col-md-4"><h4>Dátum</h4></div><div class="col-md-8"><h4>{{$roletime->created_at ?? ''}}</h4></div>
</div>
@php
  $payid= $roletime->pay_id ?? ''
@endphp

<div class="row">
    <div class="col-md-4"><h4>Fizetési adatok</h4></div><div class="col-md-8">
        @if($payid!='')
        <h4> <a href="{{ url('/admin/pay/'. $payid) }}" ><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>Fizetési adatok</a></h4>
        @endif
    </div>
</div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
