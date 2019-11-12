@php
$inputclass= 'form-control' ;
$errorclass= 'form-group' ;
$errorpclass= 'help-block' ;
@endphp

@foreach($data['form']['inputs'] as as $colname=>$input)

<div class="form-group {{ $errors->has('daytype_id') ? 'has-error' : ''}}">
    {!! Form::number('role_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] :
    ['class' => '{{$inputclass}}']) !!}
    @switch($input['type'])
    @case('select')
    <div class="col-md-6">
        {!! Form::select('role_id', $data[$colname]['selectlist'], $data[$colname]['active'] ?? null, ['class' =>
        '{{$inputclass}}', 'required' => 'required']) !!}
    </div>
    @break
    @case('text')
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => '{{$inputclass}}', 'required' => 'required'] :
    ['class' => 'form-control']) !!}
    @break
    @case('number')
    {!! Form::label('role_id', 'Jogosultság', ['class' => 'col-md-4 control-label']) !!}
    @break
    @endswitch
    {!! $errors->first('role_id', '<p class="{{$errorpclass}}">:message</p>') !!}
</div>
@endforeach

<div class="form-group">
    <input dusk="save" class="btn btn-primary" type="submit" value="Mentés">
</div>