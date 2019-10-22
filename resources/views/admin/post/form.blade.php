<div class="form-group{{ $errors->has('postcat_id') ? ' has-error' : ''}}">
    {!! Form::label('postcat_id', 'Kategória: ', ['class' => 'control-label']) !!}
    {!! Form::select('postcat_id', $post['postcat'], ['class' => 'form-control']) !!}
</div>


<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<!--<div class="form-group{{ $errors->has('intro') ? 'has-error' : ''}}">
    {!! Form::label('intro', 'Intro', ['class' => 'control-label']) !!}
    {!! Form::textarea('intro', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('intro', '<p class="help-block">:message</p>') !!}
</div>-->
<div class="form-group{{ $errors->has('text') ? 'has-error' : ''}}">
    {!! Form::label('text', 'Text', ['class' => 'control-label']) !!}
    {!! Form::textarea('text', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
</div>
@php
$pub=$post->pub ?? true;
@endphp
<div class="form-group{{ $errors->has('pub') ? 'has-error' : ''}}">
    {!! Form::label('pub', 'Pub', ['class' => 'control-label']) !!}
    <div class="checkbox">
    <label>{!! Form::radio('pub', '1', $pub) !!} Yes</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('pub', '0',$pub) !!} No</label>
</div>
    {!! $errors->first('pub', '<p class="help-block">:message</p>') !!}
</div>

<input type="hidden" name="user_id" value="{{Auth::user()->id}}" >

<div class="form-group{{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('image', 'Image', ['class' => 'control-label']) !!}
    {!! Form::file('image', null,  ['class' => 'form-control']) !!}
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
@php
     $image=$post->image  ?? 'kep.png' ?? 'file.png'  ;
//$src='/docprev/thumb/'.$prew;
$postimage_path=config('app.postimage_path');
    @endphp
   
    <img id="prewimg" src="{{url($postimage_path.'thumb/'.$image)}}" alt="your image" width="200px"  height="200px"/>
    
    {!! $errors->first('thumb', '<p class="help-block">:message</p>') !!}
</div>
<script>
function imgPrev(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#prewimg').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]);
    }
  }
  
  $("#image").change(function() {
    imgPrev(this);
  });
</script>

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
