@extends('master')
@section('content')
<script src="js/customer.js"></script>
<div class="account-settings-container" style="min-height: calc(100vh - 76px - 65px);">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
            Customer List
          </a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse in">
        <div class="panel-body">
          <div class="row">
            <div class="customer-modal" style="margin-top: -15px;">
              <button class="btn btn-primary " data-toggle="modal" data-target="#modalCustomer" style="margin-top: 8px;"><i class="glyphicon glyphicon-plus"></i></button>
                      <!-- Modal -->
              @include('customer.customer-modal')
              <form action="" class="navbar-form navbar-right" method="post">
                <div class="form-group input-group">
                  <input type="text" onkeyup="onCustomerSearch(this)" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
                  </span>
                </div>
              </form>
            </div>
            <div class="table">
              <table id='customer-list' class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Birthday</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Created at</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($customer as $c)
                    <tr position="#" id="tr-customer-{{$c->id}}" data-customer-id="{{$c->id}}" >
                      <td>{{ $c-> id }}</td>
                      <td class='customer-name'>{{ $c->cus_name }}</td>
                      <td class='customer-email'>{{ $c->cus_email }} </td>
                      <td class='customer-password' hidden>{{ $c->cus_password }}</td>
                      <td class='customer-birthday'>{{ $c->cus_birthday }} </td>
                      <td class='customer-address'>{{ $c->cus_address }} </td>
                      <td class='customer-phone'>{{ $c->cus_phone }} </td>
                      <td>{{ $c->created_at }} </td>
                      <td><button class="btn btn-default" onclick="editCustomer(this)" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                          <button class="btn btn-default" id="delCustomer" type="button"><a href="{{route('deleteCustomer',$c->id)}}" class="glyphicon glyphicon-remove" style="color:#404040;"></a></button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
