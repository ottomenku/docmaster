
@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Billingdata {{ $billingdata->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/billingdata') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                      
                        <br/>
                        <br/>


                        @include('admin.billingdata.modalshow')
 
                    </div>
                </div>
            </div>
        </div>
    </div>
 
@endsection
