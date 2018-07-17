<!-- pop up with The Modal -->
  <div class="modal fade" id="reservation-modal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title">
            Confirmation data
          </h2>
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
                <div class="col-sm-6 bg-light">
                  <h4>Data of Guest</h4>
                <div id="guest-data">
                  Name  : <span id="guest-name"></span><br />
                  Id-numb  : <span id="guest-id"></span><br />
                  dll... <br /><br />
                  Date from  : <span id="guest-date-from"></span><br />
                  Count of day  : <span id="guest-cod"></span>
                </div>
                <div id="guest-voucher">
                  Username  : <span id="voucher-username"></span><br />
                  Password  : <span id="voucher-password"></span><br />
                  Active  : <span id="voucher-active"></span>
                </div>
                </div>
                <div class="col-sm-6 bg-light">
                  <div id="frame-qrcode" class="d-none">
                  <h4>Scan your voucher</h4>
                  <div id="voucher-qrcode"></div>
                  <div>DNS Name : <span id="dns-name">arfani.hotspot.net</span></div>
                </div>

                </div>
                <div class="col-sm-12">
                  <div class="alert alert-success alert-dismissable mt-2 d-none" id="reservation-alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Status : <span id="reservation-status"></span>
                  </div>
                </div>
          </div>
          </div>
      </div> <!-- End of Modal Body -->

        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="form-group">
            <input class="form-inline btn btn-primary" value="Confirm" id="reservation-save" readonly/>
            <input class="form-inline btn btn-danger" value="Create New" id="reservation-new" readonly/>
          </div>
        </div>

      </div>
    </div>
  </div>
