<div class="modal fade" id="saleReportModal" 
   tabindex="-1" role="dialog" 
   aria-labelledby="saleReportLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="saleReportLabel">Sale Report!</h4>
      </div>
      <div class="modal-body add-partner-form">
        <h3>@{{Report.title}}</h3>
        <hr>
        <table class="table table-condensed">
          <tr>
            <td width="20%">
              <strong>ยี่ห้อ</strong>
            </td>
            <td>
              @{{Report.brand.title}}
            </td>
          </tr>
          <tr>
            <td>
              <strong>รุ่น</strong>
            </td>
            <td>
              @{{Report.model.title}}
            </td>
          </tr>
          <tr>
            <td>
             <strong>สี</strong>
            </td>
            <td>
              @{{Report.color}}
            </td>
          </tr>
          <tr>
            <td>
             <strong>ปี</strong>
            </td>
            <td>
              @{{Report.year}}
            </td>
          </tr>
          <tr>
            <td>
             <strong>ระบบเกียร์</strong>
            </td>
            <td>
              <span ng-show="Report.gear==0">ธรรมดา / manual</span>
              <span ng-show="Report.gear==1">ออโต้ / Automatic</span>
            </td>
          </tr>
          <tr>
            <td>
             <strong>ทะเบียน</strong>
            </td>
            <td>
              @{{Report.license}}
            </td>
          </tr>
          <tr>
            <td>
              <strong>ซื้อมา</strong>
            </td>
            <td>
              @{{Report.budget | number}}
            </td>
          </tr>
          <tr>
            <td>
              <strong>ต้นทุนการซ่อม</strong>
            </td>
            <td>
              @{{Report.repair | number}}
            </td>
          </tr>
          <tr>
            <td>
              <strong>ขายไป</strong>
            </td>
            <td>
              @{{Report.price | number}}
            </td>
          </tr>
          <tr ng-show="Report.commission!=''">
            <td>
              <strong>ค่านายหน้า</strong>
            </td>
            <td>
              @{{Report.commission | number}}
            </td>
          </tr>
          <tr>
            <td>
              <strong>วันที่ซื้อ</strong>
            </td>
            <td>
              @{{Report.bought_at | dateonly}}
            </td>
          </tr>
          <tr>
            <td>
              <strong>วันที่ขาย</strong>
            </td>
            <td>
              @{{Report.sold_at | dateonly}}
            </td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">
           Close
        </button>
      </div>
    </div>
  </div>
</div>
