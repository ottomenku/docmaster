@php
//$howtos=$data['howto'] ?? [];
$howcats=$data['howcat'] ?? [];
@endphp
<div class="container">
  <div class="section-header">
    <br />
    <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Kisvállalati
      <span>Tudástár</span></h2>
    <hr class="lines wow zoomIn" data-wow-delay="0.3s">
    <p class="section-subtitle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">Lorem ipsum dolor sit
      amet, consectetuer adipiscing elit, sed diam nonummy <br> nibh euismod tincidunt ut laoreet dolore magna.</p>
  </div>
  <div class="row">
    <div class="container mt-3">
      <div class="col-md-11 offset-md-1">
        <ul class="nav nav-tabs">
            
          @foreach($howcats as $howcat)
          <li class="nav-item">
            <a class="nav-link " data-toggle="tab" href="#howcat{{$howcat->id}}">{{$howcat->name}}</a>
          </li>
          @endforeach
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            
          @foreach($howcats as $howcat)
          
          <div id="howcat{{$howcat->id}}" class="container tab-pane fade"><br>
            <div class="row">
            <!-- <div id="home" class="container tab-pane active "><br> -->
            @foreach($howcat->howto as $howto)
            <div class="col-md-4" onclick="#howcat{{$howto->id}}">{{$howto->name}}</div>      
            @endforeach
          </div> </div>
          @endforeach
        
      </div>
    </div>
  </div>
</div>