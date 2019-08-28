
start: <input type="text" name="start" id="datepicker" value="{{$data['start']}}" >
end: <input type="text"  name="end" id="datepicker2" value="{{$data['end']}}"><br/><br/>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
        {!! Form::label('user_id', 'Felhasználó', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          
            {!! Form::select('user_id', $data['users'], null, ['class' => 'form-control',]) !!}
            
             {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
<div class="form-group{{ $errors->has('note') ? 'has-error' : ''}}">
        {!! Form::label('note', 'Megjegyzés', ['class' => 'control-label']) !!}
        {!! Form::text('note', null, ('' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
        {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
    </div>

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
