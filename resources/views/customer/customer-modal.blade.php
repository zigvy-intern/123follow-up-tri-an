<div id="modalCustomer" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myCustomerLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-user" id="customer-modal-text">Register</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <form method="post" id="insert-customer-form" >
            <div class="form-group">
              <input type="hidden" name="id">
            </div>
            <div class="form-group">
              <label>Customer Name</label>
              <input class="form-control" name="cus_name" id="cus_name" placeholder="Your name" type="text">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input class="form-control" name="cus_email" id="cus_email" placeholder="Your email" type="email">
            </div>
            <div class="form-group">
              <label>Password </label>
              <input class="form-control" name="cus_password" id="cus_password" placeholder="Your Password" type="password">
            </div>
            <div class="form-group">
              <label>Address</label>
              <input class="form-control" name="cus_address" id="cus_address" placeholder="Your Address" type="text">
            </div>
            <div class="form-group">
              <label>Number Phone</label>
              <input class="form-control" name="cus_phone" id="cus_phone" placeholder="Your Number Phone" type="text">
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="submitCustomer()" name="register" id="register" class="btn btn-primary"> Register </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
