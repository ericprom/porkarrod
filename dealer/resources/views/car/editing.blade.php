@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('/assets/datepicker/datepicker.min.css') }}">
<script src="{{ asset('assets/datepicker/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/angular/controllers/carEditingController.js') }}"></script>
<script src="{{ asset('/assets/dropzone/dropzone.min.js') }}"></script>
<div class="container" ng-controller="carEditingController" ng-cloak>
  <div class="white-bg-container margin-bottom-50">
    <div class="row">
      <div class="col-sm-12">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active">
            <a href="#car" aria-controls="car" role="tab" data-toggle="tab"><i class="fa fa-edit"></i> แก้ไขข้อมูล</a>
          </li>
          <li role="presentation" ng-show="Partners>0">
            <a href="#investor" aria-controls="investor" role="tab" data-toggle="tab"><i class="fa fa-users"></i> เพิ่มหุ้นส่วน</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="tab-content">
      <div id="car" class="tab-pane active" style="margin-top:30px;">
        <form class="form-horizontal" name="myform">
          <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label for="import-title" class="col-sm-3 control-label">
                  หัวข้อประกาศ<span class="text-danger">*</span>
                </label>
                <div class="col-sm-9">
                  <input class="form-control" name="import-title" ng-model="Import.title" maxlength="255">
                </div>
              </div>
              <div class="form-group">
                <label for="brand-list" class="col-sm-3 control-label">
                  เลือกยี่ห้อของรถ<span class="text-danger">*</span>
                </label>
                <div class="col-sm-6">
                  <select name="brand-list" class="form-control"
                    ng-model="Import.brand"
                    ng-disabled="Brands.length<=0"
                    ng-change="selectModel(Import.brand,'select')"
                    ng-options="item as item.title for item  in Brands">
                    <option value="" style="display: none;">-- เลือกยี่ห้อรถ --</option>
                  </select>
                </div>
              </div>
              <div class="form-group" ng-hide="Import.brand.id==54||!Import.brand">
                <label for="model-list" class="col-sm-3 control-label">
                  เลือกรุ่นของรถ<span class="text-danger">*</span>
                </label>
                <div class="col-sm-6">
                  <select name="model-list" class="form-control"
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
                  <input class="form-control" name="car-year" ng-model="Import.year" maxlength="4"/>
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
                  <input class="form-control" name="car-license" ng-model="Import.license" maxlength="10"/>
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
                    <input type="text" class="form-control form-filter" readonly id="bought_date" placeholder="2016-12-31">
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
                  <button type="button" class="btn btn-success"
                    ng-click="updateOldCar()">
                    <i class="fa" ng-class="(updating)?'fa-cog fa-spin':'fa-save'"></i> แก้ไขข้อมูลขายตัด
                  </button>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12"></div>
          </div>
        </form>
      </div>
      <div id="investor" class="tab-pane">
      
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
    window.dzcheck = false;
    window.carID  = "{!! $id !!}";
    var baseUrl = "{{ url('/') }}";
    var token = "{!! csrf_token() !!}";
    var key = "{!! $tent !!}";
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#dropzoneFileUpload", {
      dictDefaultMessage: "คลิกเพื่อเพิ่มรูปภาพประกอบ",
      url: baseUrl + "/api/v1/car/upload",
      params: {
        source:'editing',
        car:carID,
        public_key:key,
        _token: token
      },
      acceptedFiles: ".jpeg,.jpg,.png,.gif",
      addRemoveLinks: true,
      init: function () {
        DZone = this;
        $.ajax({
          type : 'GET',
          url : baseUrl + '/api/v1/car/select',
          data: {
            car:carID,
            public_key:key
          },
          dataType: 'json',
          success : function(get) {
            $.each(get.data, function(index, val) {
              var mockFile = {
                name: val.name+"."+val.extension,
                size:val.size,
                type:val.type,
                source:'server_image'
              };       
              DZone.emit( "addedfile", mockFile );
              DZone.emit( "thumbnail", mockFile, val.path);
              DZone.files.push( mockFile ); 
              DZone.emit("complete", mockFile);
            });
            var count = DZone.files.length;
            if(count>0){
              window.dzcheck = true;
            }
            else{
              window.dzcheck = false;
            }
          }
        });
        this.on("removedfile", function(file) {
          var filename = file.name;
          var extension = filename.substring(filename.lastIndexOf(".")+1);
          var source = 'server_preview';
          var car = carID;
          if(file.source){
            source=file.source;
          }
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
                if(rep.code == 200){};
                var count = DZone.files.length;
                if(count>0){
                  window.dzcheck = true;
                }
                else{
                  window.dzcheck = false;
                }
              }
          });
        });
      }
    });
  })();
</script>
@endsection
