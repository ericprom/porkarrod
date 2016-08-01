(function () {
	myApp.controllers.carListingController = ['API','$scope','$http','toaster','$window', function(API,$scope,$http,toaster,$window) {
    $scope.Import = {}
    $scope.Brands = [];
    $scope.Models = [];
    $scope.init = function(){
      var criteria = {filter: {'section':'brands'}};
      API.Brand(criteria).then(function (result) {
        if(result.status){
          $scope.Brands = result.data;
          $scope.Models = [];
        }
      });
    }
    $scope.init();
    $scope.selectModel = function(data){
      delete $scope.Import.model;
      var criteria = {filter: {'section':'models', "id":data.id}};
      API.Brand(criteria).then(function (result) {
        if(result.status){
          $scope.Models = result.data;
        }
      });
    }
    $scope.saveNewCar = function(){
      $scope.Import.bought_at = document.querySelector('#bought_date').value;
      $scope.dzcheck = $window.dzcheck;
      var pass = false;
      if($scope.Import.title!=null&&$scope.Import.title!='' && 
        $scope.Import.brand!=null&&
        $scope.Import.year!=null &&$scope.Import.year!='' &&
        $scope.Import.gear!=null&&
        $scope.Import.color!=null&&$scope.Import.color!=''&&
        $scope.Import.license!=null&&$scope.Import.license!=''&&
        $scope.Import.detail!=null&&$scope.Import.detail!=''&&
        $scope.Import.budget!=null&&$scope.Import.budget!=''&&
        $scope.Import.repair!=null&&$scope.Import.repair!=''&&
        $scope.Import.price!=null&&$scope.Import.price!=''&&
        $scope.Import.bought_at!=null&&$scope.Import.bought_at!=''){
        if($scope.Import.brand.id=='54'){
          delete $scope.Import.model;
          pass = true;
        }else{
          if($scope.Import.model!=null){
            pass = true;
          }
          else{
            toaster.pop('warning', "Car listing", "กรุณาเลือกโมเดลรถทำการบันทึก!");
            pass = false;
          }
        }
        if(pass){
          if($scope.dzcheck){
            $scope.listing = true;
            var criteria = {filter: {'section':'car', "data":$scope.Import}};
            API.Import(criteria).then(function (result) {
              toaster.pop('success', "Car listing", "บันทึกสำเร็จ!");
              $scope.listing = false;
              $window.location=document.querySelector('#callback_url').value;
            });
          }
          else{
              toaster.pop('warning', "Car listing", "กรุณาอัพโหลดรูปภาพประกอบการขาย!");
          }
        }
        else{
            toaster.pop('warning', "Car listing", "กรุณากรอกข้อมูลก่อนทำการบันทึก!");
        }
      }
      else{
        toaster.pop('warning', "Car listing", "กรุณากรอกข้อมูลก่อนทำการบันทึก!");
        pass = false;
      }
    }
	}];
})();

		
