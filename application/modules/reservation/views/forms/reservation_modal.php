<!-- pop up with The Modal -->
  <div class="modal fade" id="reservation-modal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content bg-info">

        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title font-weight-bold mr-auto">
            BOOKING
          </h3>
          <span class="ml-auto font-weight-bold">
            No. <u><span id="no-booking"></span></u>
          </span>
          <span class="la-timer dark text-danger float-right ml-4 d-none" id="loader-img-reservation">
            <div></div>
          </span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
          <input type="hidden" name="id" value="">
        <div class="modal-body">
          <div class="container">
          <div class="row">
                <div id="confirm-data" class="col-sm-6 rounded">
                  <!-- <h4>Guest Data</h4> -->
                <div id="guest-data">
                  KTP/Passport  : <span id="guest-id"></span><br />
                  Name  : <span id="guest-name"></span><br />
                  Gender  : <span id="guest-gender"></span><br />
                  Date of Birth  : <span id="guest-birth"></span><br />
                  Phone  : <span id="guest-phone"></span><br />
                  Email  : <span id="guest-email"></span><br />
                  Address  : <span id="guest-address"></span><br />
                  <hr />
                  Night  : <span id="guest-night"></span><br />
                  Arrival date  : <span id="guest-arrival-date"></span><br />
                  Departure date  : <span id="guest-departure-date"></span><br />
                  Room type  : <span id="guest-room-type"></span><br />
                  Room number  : <span id="guest-room-numb"></span><br />
                  Adult  : <span id="guest-adult"></span><br />
                  Child  : <span id="guest-child"></span><br />
                </div>
                </div>
                <div id="confirm-qr" class="col-sm-6">
                  <div id="frame-qrcode" class="bg-light">
                  <h4>Scan your voucher</h4>
                  <div id="voucher-qrcode"></div>
                  <div id="guest-voucher">
                    Username  : <span id="voucher-username"></span><br />
                    Password  : <span id="voucher-password"></span><br />
                    Uptime  : <span id="voucher-uptime"></span>
                  </div>
                  <div>DNS Name : <span id="dns-name">192.168.100.1</span></div>
                </div>
                </div>
                <div class="col-sm-12">
                  <div class="alert alert-warning alert-dismissable mt-2" id="reservation-alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <span id="reservation-status"></span>
                  </div>
                </div>
          </div>
          </div>
      </div> <!-- End of Modal Body -->

        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="form-group font-weight-bold">
            <input class="form-inline btn btn-primary font-weight-bold" value="Confirm" id="reservation-save" readonly/>
            <input class="form-inline btn btn-danger font-weight-bold" value="Create New" id="reservation-new" readonly/>
          </div>
        </div>

      </div>
    </div>
  </div>
