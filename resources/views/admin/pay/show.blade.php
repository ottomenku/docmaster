@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Pay {{ $pay->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/pays') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
             @if (Auth::user()->hasRole('superadmin')) 
                        <a href="{{ url('/admin/pays/' . $pay->id . '/edit') }}" title="Edit Pay"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['pays', $pay->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Pay',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
             @endif
                        <br/>
                        <br/> 

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
<tr><th> Felhasználónév </th><td> {{ $pay->user['name'] }} </td></tr>
<tr><th> fizetési adatok </th><td>
        <a href="{{ url('/admin/billingdata/modalshow/' . $pay->billingdata_id) }}" data-remote="false" data-toggle="modal" data-target="#myModal"  class="btn btn-info btn-sm">
            <i class="fa fa-eye" aria-hidden="true"></i
        </a> 
</td></tr>
<tr><th>Csomagnév </th><td> {{ $pay->order_id }} </td></tr>
<tr><th>Tipus </th><td> {{ $pay->type }} </td></tr>
<tr><th> Befizetett összeg </th><td> {{ $pay->total }} </td></tr>
<tr><th> Letöltési jog  </th><td> {{ $roletime->role->name}} </td></tr>
<tr><th> Letöltési jog napk </th><td> {{ $pay->days}} </td></tr>
<tr><th> Letöltési jog start </th><td> {{ $roletime->start }} </td></tr>
<tr><th> Letöltési jog vége </th><td> {{ $roletime->end}} </td></tr>
 <tr><th>Fizetési dátum </th><td> {{ $pay->created_at }} </td></tr>
 <tr><th> Jegyzet</th><td> {{ $pay->note }} </td></tr>

 
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
