<div class="form-group{{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'control-label']) !!}
    {!! Form::number('user_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('fullname') ? 'has-error' : ''}}">
    {!! Form::label('fullname', 'Fullname', ['class' => 'control-label']) !!}
    {!! Form::text('fullname', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('fullname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('cardname') ? 'has-error' : ''}}">
    {!! Form::label('cardname', 'Cardname', ['class' => 'control-label']) !!}
    {!! Form::text('cardname', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('cardname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('city') ? 'has-error' : ''}}">
    {!! Form::label('city', 'City', ['class' => 'control-label']) !!}
    {!! Form::text('city', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('zip') ? 'has-error' : ''}}">
    {!! Form::label('zip', 'Zip', ['class' => 'control-label']) !!}
    {!! Form::text('zip', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('zip', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
    {!! Form::text('address', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('tel') ? 'has-error' : ''}}">
    {!! Form::label('tel', 'Tel', ['class' => 'control-label']) !!}
    {!! Form::text('tel', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('tel', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('adosz') ? 'has-error' : ''}}">
    {!! Form::label('adosz', 'Adosz', ['class' => 'control-label']) !!}
    {!! Form::text('adosz', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('adosz', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
