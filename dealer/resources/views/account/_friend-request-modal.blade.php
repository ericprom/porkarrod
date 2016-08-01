<div class="modal fade" id="addPartnerModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="addPartnerModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" 
            data-dismiss="modal" 
            aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="addPartnerModalLabel">Add Partner</h4>
        </div>
        <div class="modal-body add-partner-form">
          <div class="row add-partner-input">
            <div class="col-md-2 col-sm-2 col-xs-12"></div>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <h3>Your partner email</h3>
              <input type="text" class="form-control" name="email" placeholder="Type an email address" ng-model="Partner.email"/>
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
            ng-click="friendRequest()">
            Add
          </button>
        </div>
      </div>
    </div>
  </div>
