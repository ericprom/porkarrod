<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('/assets/datepicker/datepicker.min.css') }}">
<script src="{{ asset('assets/datepicker/datepicker.min.js') }}"></script>
<div class="modal fade" id="saleItModal" 
   tabindex="-1" role="dialog" 
   aria-labelledby="saleItLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="saleItLabel">Sale it!</h4>
      </div>
      <div class="modal-body add-partner-form">
        <form class="form-horizontal">
        <div class="row">
          <div class="col-md-2 col-sm-2 col-xs-12"></div>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="form-group">
              <label for="import-title" class="col-sm-3 control-label">
                วันที่ขาย <span class="text-danger">*</span>
              </label>
              <div class="col-sm-9">
                <div class="input-group date date-picker" data-date-format="yyyy-mm-dd" id='datepicker'>
                  <input type="text" class="form-control form-filter" readonly id="sold_date" placeholder="2015-12-31">
                  <span class="input-group-btn">
                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                  </span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="import-title" class="col-sm-3 control-label">
                ขายจริง <span class="text-danger">*</span>
              </label>
              <div class="col-sm-9">
                <div class="input-group">
                  <input class="form-control" id="sale-price" ng-model="Sale.cash" maxlength="10" valid-number/>
                  <span class="input-group-addon">฿</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="import-title" class="col-sm-3 control-label">
                ค่านายหน้า
              </label>
              <div class="col-sm-9">
                <div class="input-group">
                  <input class="form-control" id="sale-commision" ng-model="Sale.commission" maxlength="10" valid-number/>
                  <span class="input-group-addon">฿</span>
                </div>
              </div>
            </div>
            
          </div>
          <div class="col-md-2 col-sm-2 col-xs-12"></div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">
           Close
        </button>
        <button type="button" class="btn btn-primary"
          ng-click="markAsSold()">
          <span ng-show="Sale.sold==0">Sold</span>
          <span ng-show="Sale.sold==1">Update</span>
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  (function () {
    $('.date-picker').datepicker({
      language: 'th', 
      todayHighlight: true, 
      autoclose: true, 
      format: 'yyyy-mm-dd', 
      clearBtn:true
    });
  })();
</script>
