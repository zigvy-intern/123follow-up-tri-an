@extends('master')
@section('content')
<!-- First Container -->
<div class="container">
  <!-- Third Container (Grid) -->
  <div class="container-fluid bg-3 text-center">
    <h1>Hot Tours</h1>
    <h3> Far far away, behind the word mountains,<br> far from the countries Viet Nam<h3><br>
    <div class="row">
      @foreach($tour as $to)
      <div class="col-sm-4">
        <img src="source/img/{{$to->tour_image}}" class="img-responsive" style="width:100%" alt="Image">
          <div class="caption">
            <h2>{{$to->tour_name}}</h2>
            <span>Price: ${{number_format($to->tour_price)}}</span><br>
            <button type="submit" value="Detail" class="btn btn-info" href="#">Detail</button>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
