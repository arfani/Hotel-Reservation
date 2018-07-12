<!-- pop up with The Modal -->
  <div class="modal fade" id="reservation-modal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title">Title</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <!-- <form method="post" action="#" id="reservation-modal-form"> -->
          <input type="hidden" name="id" value="">
        <div class="modal-body">
          <div class="container">
          <div class="row">
                <div class="col-xs-6">
                  <h4>Data of Guest</h4>
                <div id="guest-data">
                  Name  : <span id="guest-name"></span><br />
                  Id-numb  : <span id="guest-id"></span><br /><br />
                  dll... <br />
                  Date from  : <span id="guest-date-from"></span><br />
                  Count of day  : <span id="guest-cod"></span>
                </div>
                <div id="guest-voucher">
                  Username  : <span id="voucher-username"></span><br />
                  Password  : <span id="voucher-password"></span><br />
                  Active  : <span id="voucher-active"></span>
                </div>
                </div>
                <div class="col-xs-6">
                  <div id="frame-qrcode">
                  <h4>Scan your voucher</h4>
                  <div id="voucher-qrcode"></div>
                  <div class="alert alert-success alert-dismissable d-none" id="reservation-alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Status : <span id="reservation-status"></span>
                  </div>
                </div>

                </div>


          </div>
          </div>
      </div> <!-- End of Modal Body -->

        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="button" class="btn btn-primary" value="Save" id="reservation-save"/>
        </div>
      <!-- </form> -->

      </div>
    </div>
  </div>
