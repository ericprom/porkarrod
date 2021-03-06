@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('/assets/datepicker/datepicker.min.css') }}">
<script src="{{ asset('assets/datepicker/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/angular/controllers/carListingController.js') }}"></script>
<script src="{{ asset('/assets/dropzone/dropzone.min.js') }}"></script>
<div class="container" ng-controller="carListingController" ng-cloak>
  <div class="white-bg-container margin-bottom-50">
    <h4><i class="fa fa-car"></i> ลงข้อมูลขายตัด</h4>
    <form class="form-horizontal">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12"></div>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="import-title" class="col-sm-3 control-label">
              หัวข้อประกาศ<span class="text-danger">*</span>
            </label>
            <div class="col-sm-9">
              <input class="form-control" name="import-title" ng-model="Import.title" maxlength="255"/>
            </div>
          </div>
          <div class="form-group">
            <label for="brand_list" class="col-sm-3 control-label">
              เลือกยี่ห้อของรถ<span class="text-danger">*</span>
            </label>
            <div class="col-sm-6">
              <select id="brand_list" class="form-control"
                ng-model="Import.brand"
                ng-disabled="Brands.length<=0"
                ng-change="selectModel(Import.brand)"
                ng-options="item as item.title for item  in Brands">
                <option value="" style="display: none;">-- เลือกยี่ห้อรถ --</option>
              </select>
            </div>
          </div>
          <div class="form-group" ng-hide="Import.brand.id==54||!Import.brand">
            <label for="model_list" class="col-sm-3 control-label">
              เลือกรุ่นของรถ<span class="text-danger">*</span>
            </label>
            <div class="col-sm-6">
              <select id="model_list" class="form-control"
                ng-model="Import.model"
                ng-disabled="!Import.brand || Models.length<=0"
                ng-change="checkModel(Import.model)"
                ng-options="item as item.title for item  in Models">
                <option value="" style="display: none;">-- เลือกรุ่นรถ --</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="car-year" class="col-sm-3 control-label">
              ปีที่จดทะเบียน<span class="text-danger">*</span>
            </label>
            <div class="col-sm-4">
              <input class="form-control" name="car-year" ng-model="Import.year" maxlength="4" />
            </div>
          </div>
          <div class="form-group">
            <label for="car-gear" class="col-sm-3 control-label">
              ระบบเกียร์<span class="text-danger">*</span>
            </label>
            <div class="col-sm-4">
              <select name="car-gear" class="form-control"
                ng-model="Import.gear">
                <option value="" style="display: none;">-- เลือกเกียร์ --</option>
                <option value="0">ธรรมดา / manual</option>
                <option value="1">ออโต้ / Automatic</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="car-color" class="col-sm-3 control-label">
              สีของรถ<span class="text-danger">*</span>
            </label>
            <div class="col-sm-4">
              <input class="form-control" name="car-color" ng-model="Import.color" maxlength="30"/>
            </div>
          </div>
          <div class="form-group">
            <label for="car-license" class="col-sm-3 control-label">
              หมายเลขทะเบียน<span class="text-danger">*</span>
            </label>
            <div class="col-sm-4">
              <input class="form-control" name="car-year" ng-model="Import.license" maxlength="10"/>
            </div>
          </div>
          <div class="form-group">
            <label for="car-picture" class="col-sm-3 control-label">
              รูปภาพประกอบ<span class="text-danger">*</span>
            </label>
            <div class="col-sm-9">
              <div class="dropzone dropzone-listing" id="dropzoneFileUpload"></div>
            </div>
          </div>
          <div class="form-group">
            <label for="car-detail" class="col-sm-3 control-label">
              รายละเอียด<span class="text-danger">*</span>
            </label>
            <div class="col-sm-9">
              <textarea class="form-control" name="car-detail" ng-model="Import.detail" rows="10"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="car-bought" class="col-sm-3 control-label">
              วันที่ซื้อรถ<span class="text-danger">*</span>
            </label>
            <div class="col-sm-4">
              <div class="input-group date date-picker" data-date-format="yyyy-mm-dd" id='datepicker'>
                <input type="text" class="form-control form-filter" readonly id="bought_date" placeholder="2015-12-31">
                <span class="input-group-btn">
                  <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="car-budget" class="col-sm-3 control-label">
              ราคาทุนซื้อมา<span class="text-danger">*</span>
            </label>
            <div class="col-sm-4">
              <div class="input-group">
                <input class="form-control" name="car-budget" ng-model="Import.budget" maxlength="10" valid-number/>
                <span class="input-group-addon">฿</span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="car-budget" class="col-sm-3 control-label">
              ต้นทุนการซ่อม<span class="text-danger">*</span>
            </label>
            <div class="col-sm-4">
              <div class="input-group">
                <input class="form-control" name="car-repair" ng-model="Import.repair" maxlength="10" valid-number/>
                <span class="input-group-addon">฿</span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="car-price" class="col-sm-3 control-label">
              ตั้งราคาขาย<span class="text-danger">*</span>
            </label>
            <div class="col-sm-4">
              <div class="input-group">
                <input class="form-control" name="car-price" ng-model="Import.price" maxlength="10" valid-number/>
                <span class="input-group-addon">฿</span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="car-save" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-9">
              <h5>
              คลิกปุ่ม "ลงประกาศขาย" เพื่อยอมรับ ข้อกำหนดและเงื่อนไขการลงประกาศ
              </h5>
              <input type="hidden" id="callback_url" value="{{ url('/account/shop') }}">
              <button type="button" class="btn btn-success"
                ng-click="saveNewCar()">
                <i class="fa" ng-class="(listing)?'fa-cog fa-spin':'fa-save'"></i> ลงประกาศขาย
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12"></div>
      </div>
    </form>
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
    window.dzcheck = false;
    var baseUrl = "{{ url('/') }}";
    var token = "{!! csrf_token() !!}";
    var key =  "{!! $tent !!}";
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#dropzoneFileUpload", {
      dictDefaultMessage: "คลิกเพื่อเพิ่มรูปภาพประกอบ",
      url: baseUrl + "/api/v1/car/upload",
      params: {
        source:'listing',
        public_key:key,
        _token: token
      },
      acceptedFiles: ".jpeg,.jpg,.png,.gif",
      addRemoveLinks: true,
      init: function () {
        DZone = this;
        this.on("removedfile", function(file) {
          var filename = file.name;
          var extension = filename.substring(filename.lastIndexOf(".")+1);
          var source = 'local_preview';
          var car = 'tmp';
          $.ajax({
              type: 'POST',
              url: baseUrl + '/api/v1/car/delete',
              data: {
                car:car,
                filename:filename,
                extension:extension,
                source:source,
                public_key:key,
                _token:token
              },
              dataType: 'html',
              success: function(data){
                  var rep = JSON.parse(data);
                  if(rep.code == 200){
                    var count = DZone.files.length;
                    if(count>0){
                      window.dzcheck = true;
                    }
                    else{
                      window.dzcheck = false;
                    }
                  };
              }
          });
        });
        this.on("addedfile", function(file) {
          var count = DZone.files.length;
          if(count>0){
            window.dzcheck = true;
          }
          else{
            window.dzcheck = false;
          }
        });
      }
    });
  })();
</script>
@endsection
