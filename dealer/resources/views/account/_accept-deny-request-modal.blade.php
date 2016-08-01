<div class="modal fade" id="acceptDenyRequestModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="acceptDenyRequestLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" 
            data-dismiss="modal" 
            aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="acceptDenyRequestLabel">Response to friend request</h4>
        </div>
        <div class="modal-body add-partner-form">
          <div class="row add-partner-input">
            <div class="col-md-2 col-sm-2 col-xs-12"></div>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <h3 class="text-center">Will you accept this request?</h3>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger"
            ng-click="requestResponse('deny')">
            Deny
          </button>
          <button type="button" class="btn btn-primary"
            ng-click="acceptDenyResponse('accept')">
            Accept
          </button>
        </div>
      </div>
    </div>
  </div>
