<div id="modalBookTour" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myBookTourLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-user" id="book-tour-modal-text">Book New Tour</h4>
      </div>
      <div class="modal-body">
        <div class="row" style="text-align:left;">
          <form method="POST" id="insert-book-tour-form">
            <div class="form-group">
              <input type="hidden" name="id">
            </div>
            <div class="form-group col-md-6">
              <h3>Your Name</h3>
              <input type="text" class="form-control" name="book_cus_name" id="book_cus_name">
            </div>
            <div class="form-group col-md-6">
              <h3>Choose your Tour</h3>
              <select class="form-control" name="book_choose_tour" id="book_choose_tour">
                <option>Choose..</option>
                @foreach($tour as $tou)
                  <option value="{{$tou->id}}" data-price="{{$tou->tour_price}}">{{$tou->tour_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <h3>Email</h3>
              <input type="email" class="form-control" name="book_tour_email" id="book_tour_email">
            </div>
            <div class="form-group col-md-6">
              <h3>Number Phone</h3>
              <input type="text" class="form-control" name="book_tour_phone" id="book_tour_phone">
            </div>
            <div class="form-group col-md-6">
              <h3>Address</h3>
              <input type="text" class="form-control" name="book_tour_address" id="book_tour_address">
            </div>
            <div class="form-group col-md-6">
              <h3>Day Order</h3>
              <input type="datetime-local" class="form-control" name="book_tour_time" id="book_tour_time">
            </div>
            <div class="form-group col-md-3">
              <h3>Tour Price</h3>
              <input type="text" class="form-control" name="book_tour_price" id="book_tour_price">
            </div>
            <div class="form-group col-md-3">
              <h3>Members</h3>
              <select type="text" name="book_tour_member" id="book_tour_member" class="form-control">
                <option value="1" data-number="1">1</option>
                <option value="2" data-number="2">2</option>
                <option value="3" data-number="3">3</option>
                <option value="4" data-number="4">4</option>
                <option value="5" data-number="5">5</option>
                <option value="6" data-number="6">6</option>
                <option value="7" data-number="7">7</option>
                <option value="8" data-number="8">8</option>
                <option value="9" data-number="9">9</option>
                <option value="10" data-number="10">10</option>
                <option value="11" data-number="11">11</option>
                <option value="12" data-number="12">12</option>
                <option value="13" data-number="13">13</option>
                <option value="14" data-number="14">14</option>
                <option value="15" data-number="15">15</option>
                <option value="16" data-number="16">16</option>
                <option value="17" data-number="17">17</option>
                <option value="18" data-number="18">18</option>
                <option value="19" data-number="19">19</option>
                <option value="20" data-number="20">20</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <h3><b>Total Price</b></h3>
              <b><input class="form-control" name="book_tour_totalPrice" id="book_tour_totalPrice"></input></b>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="submitBookTour()" name="bookTour" id="bookTour" class="btn btn-primary">Confirm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
