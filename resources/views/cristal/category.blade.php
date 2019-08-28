@extends('cristal.frame')
@section('content')
    <!-- Blog Section -->
    <section id="blog" class="section">
        <!-- Container Starts -->
@php
$items=$data['list'] ?? [];
@endphp
   <div class="container">
            <div class="section-header" style="background-color:white;">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s"><span>{{$data['catname']}}</span></h2>
           </div>
            <div class="row">
@foreach($items  as $item)
     
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 blog-item" >
                    <!-- Blog Item Starts -->
                    <div class="blog-item-wrapper wow fadeInUp" data-wow-delay="0.3s">
                        <div class="blog-item-img">
                            <a href="single-post.html">
                                <img src="img/blog/img1.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog-item-text" style="padding:5px;overflow: hidden;">
                        <center><img src="/docprev/thumb/{{$item['prev']}}" height="200px" width="200px"> </center>
                            <h3> {{$item['name']}}</h3> 
                            <p>
                                    {{Str::limit($item['note'] , 100)}}
                            </p>

                        <a href="http://localhost:8000/download/{{$item['id']}}"" class="btn btn-common" style="color:white;"
                        data-remote="false" data-toggle="modal" data-target="#myModal"><i class="lnr lnr-download"></i> Letöltés</a>
                        </div>
                    </div> 
                </div>
                    <!-- Blog Item Wrapper Ends-->
            
@endforeach
   
            </div>
    </section>
    <!-- Default bootstrap modal example -->
    <div class="modal fade bd-example-modal-lg " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>



    @endsection