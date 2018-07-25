<!-- pop up with The Modal -->
  <div class="modal animated bounceIn" id="qrcode-modal">
    <div class="modal-dialog modal-dialog-centered modal">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Title</h4>
          <span class="la-timer dark text-danger float-right ml-4 d-none" id="loader-img-hotspot">
            <div></div>
          </span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group text-center">
              <div id="qrcode-text" class="font-weight-bold">
              <span class="mr-3">Username :<span id="qrcode-uname"></span></span>
              <span>Password :<span id="qrcode-pwd"></span></span>
            </div>
            <div class="" id="qrcode"></div>
            </div>
      </div> <!-- End of Modal Body -->

        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="button" class="btn btn-danger w-100" value="Close" id="qrcode-close" />
        </div>

      </div>
    </div>
  </div>
