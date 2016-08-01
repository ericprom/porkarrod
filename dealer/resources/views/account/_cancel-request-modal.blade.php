<div class="modal fade" id="cancelRequestModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="cancelRequestLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" 
            data-dismiss="modal" 
            aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="cancelRequestLabel">Cancel request</h4>
        </div>
        <div class="modal-body add-partner-form">
          <div class="row add-partner-input">
            <div class="col-md-2 col-sm-2 col-xs-12"></div>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <h3 class="text-center">Do you want to cancel this request?</h3>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" 
             class="btn btn-default" 
             data-dismiss="modal">
             Close
          </button>
          <button type="button" class="btn btn-primary"
            ng-click="cancelRequestResponse('yes')">
            Yes
          </button>
        </div>
      </div>
    </div>
  </div>
