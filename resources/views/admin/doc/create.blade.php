@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create New Doc</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/doc') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <span id="message">message</span>
                        <span id="uploaded_image"></span>

                        <form>
                                @csrf
                                <input type="file" name="prewfile" class="image2" required>
                                <input type="submit" name="submit2" class="submit2" value="Submit">
                            </form>




                     

                   
                        {!! Form::open(['url' => '/admin/doc', 'class' => 'form-horizontal', 'files' => true]) !!}

                      
                      
                        @include ('admin.doc.form', ['formMode' => 'create'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>


            $(function() {
                $('.submit2').on('click', function() {
                    var token = $('meta[name="csrf-token"]').attr('content');
                    var file_data = $('.image2').prop('files')[0];
                    if(file_data != undefined) {
                        var form_data = new FormData();                  
                        form_data.append('prewfile', file_data);
                        form_data.append(' _token', token);
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('prewupload') }}",
                            contentType: false,
                            processData: false,
                            data: form_data,
                            success:function(response) {
                                if(response == 'success') {
                                    $("#message").html(response.message);
                                } else if(response == 'false') {
                                    $("#message").html(response.message);
                                } else {
                                    $("#message").html(response.message);
                                }
         
                                $('.image').val('');
                            }
                    
                                }).fail(function( xhr, status, errorThrown ) {
                                    $("#message").html('valami gond történt afeltöltéskor.');
                                  //  console.log( "Error: "   errorThrown );
                                  //  console.log( "Status: "   status );
                                  //  console.dir( xhr.responseText);
                                });
                      
                    }
                    return false;
                });
            });


/*
             data = new FormData();
            function onChangeHandler(event) {
            data.append('prewfile', event.target.files[0]);
            }

            function saveFile() {
            
            $.ajax({
            type:"POST",
            data:data,
            contentType: false,
            processData: false,
            url: "{{ route('prewupload') }}",
            success:function(response) {
            $("#message").html(response);
            }
            });
            }
          



        $(document).ready(function(){

            $('#prewuploadform').on('submit', function(event){
             event.preventDefault();
             $.ajax({
              url:"{{ route('prewupload') }}",
              method:"POST",
              data:new FormData(this),
              dataType:'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success:function(data)
              {
                if (data.data.uploaded) {
                    console.log(data.data.status);
                    $('#message').html(data.message);
                }else{
                    console.log("image was not uploaded");
                }

            }).fail(function( xhr, status, errorThrown ) {
                alert( "Sorry, there was a problem!" );
                console.log( "Error: "   errorThrown );
                console.log( "Status: "   status );
                console.dir( xhr.responseText);
            }).always(function() {

             //  $('#message').css('display', 'block');
            //   $('#message').html(data.message);
             //  $('#message').addClass(data.class_name);
             //  $('#uploaded_image').html(data.uploaded_image);
              }
             })
            });
           
           });*/
           </script>
   
@endsection
