@extends('master')
@section('content')
<script src="js/statistic.js"></script>
<div class="statistic-container" style="min-height: calc(100vh - 76px - 65px);">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#statistic">
            Statistic
          </a>
        </h4>
      </div>
      <div id="statistic" class="panel-collapse collapse in">
        <div class="panel-body">
          <ul class="nav nav-tabs" id="form-statistic" role="tablist">
            <li class="nav-item active">
              <a class="nav-link " id="statistic-user-tab" data-toggle="tab" href="#statistic-user" role="tab" aria-controls="statistic-user-tab" aria-selected="true" aria-expanded="true">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="statistic-tour-tab" data-toggle="tab" href="#statistic-tour" role="tab" aria-controls="statistic-tour-tab" aria-selected="false">Tours</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="statistic-hotel-tab" data-toggle="tab" href="#statistic-hotel" role="tab" aria-controls="statistic-hotel-tab" aria-selected="false">Hotels</a>
            </li>
          </ul>
          <div class="tab-content" id="form-content">
            <div class="tab-pane fade" id="statistic-user" role="tabpanel" aria-labelledby="statistic-user-tab">
              <table class="function-table">
                <tr>
                  <td class="function-item">
                    <ul>
                      <li>Total Users: {!! $stas_users !!} </li>
                    </ul>
                  </td>
                </tr>
              </table>
            </div>
            <div class="tab-pane fade" id="statistic-tour" role="tabpanel" aria-labelledby="statistic-tour-tab">
              <table class="function-table">
                <tr>
                  <td class="function-item">
                    <ul>
                      <li>Total Tours: {!! $stas_tours !!}</li>
                      <li>Total Price : {!! number_format($stas_tour_price) !!}$</li>
                    </ul>
                  </td>
                </tr>
              </table>
            </div>
            <div class="tab-pane fade" id="statistic-hotel" role="tabpanel" aria-labelledby="statistic-hotel-tab">
              <table class="function-table">
                <tr>
                  <td class="function-item">
                    <ul>
                      <li>Total Hotels: {!! $stas_hotels !!}</li>
                      <li>Total Price: <button class="btn btn-default" onclick="showInfoHotel()" type="button"><i class="glyphicon glyphicon-pencil"></i></button></li>
                      @include('statistic.statistic-total-price')
                    </ul>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
