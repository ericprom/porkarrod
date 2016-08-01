@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="{{ asset('assets/angular/controllers/profileController.js') }}"></script>
<script src="{{ asset('/assets/dropzone/dropzone.min.js') }}"></script>
@include('account._menubar', array())
<div class="container" ng-controller="profileController" ng-cloak>
  <div class="white-bg-container margin-bottom-50 min-height-500">
    <h3>Profile</h3> 
    <form class="form-horizontal" name="myform">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12"></div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="row" style="margin-top:30px;">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dropzone text-center dropzone-profile" id="dropzoneFileUpload">
              </div>
            </div>
          </div>
          <div class="row" style="margin-top:30px;">
            <div class="col-md-12 col-sm-12 col-xs-12 personal-info">
                <div class="form-group">
                  <label class="col-lg-3 control-label">ชื่อ:</label>
                  <div class="col-lg-8">
                    <input type="text" name="name" class="form-control" ng-model="Profile.name" ng-minlength="3" required>
                    <span ng-show="myform.name.$error.required">Name cannot be null!</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">อีเมล์:</label>
                  <div class="col-lg-8">
                    <input type="text" name="email" class="form-control" ng-model="Profile.email" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label"></label>
                  <div class="col-md-8">
                    <button class="btn btn-sm btn-primary" ng-click="updateProfile()">Update Profile</button>
                  </div>
                </div>
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
    var baseUrl = "{{ url('/') }}";
    var token = "{!! csrf_token() !!}";
    var key = "{!! $public_key !!}";
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#dropzoneFileUpload", {
      dictDefaultMessage: "คลิกเพื่อเปลี่ยนรูปโปรไฟล์",
      url: baseUrl + "/api/v1/avatar/upload",
      params: {
        _token: token
      },
      maxFiles: 1,
      maxfilesexceeded: function(file) {
        this.removeAllFiles();
        this.addFile(file);
      },
      init: function () {
        var myDropzone = this;
        $.ajax({
          type : 'GET',
          url : baseUrl + '/api/v1/avatar/select',
          data: {
            public_key:key
          },
          dataType: 'json',
          success : function(get) {
            var mockFile = {
              name: get.avatar.name+"."+get.avatar.extension,
              size:get.avatar.size,
              type:get.avatar.type
            };       
            myDropzone.emit( "addedfile", mockFile );
            myDropzone.emit( "thumbnail", mockFile, get.avatar.path);
            myDropzone.files.push( mockFile ); 
            myDropzone.emit("complete", mockFile);
          }
        });
        this.on('success', function(file, message) {
          if (myDropzone.files.length > 1) {
            myDropzone.removeFile(myDropzone.files[0]);
          }
        });
      }
    });
  })();
</script>
@endsection
