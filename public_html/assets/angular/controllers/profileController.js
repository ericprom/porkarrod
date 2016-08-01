(function () {
	myApp.controllers.profileController = ['API','$scope','$http','toaster', function(API,$scope,$http,toaster) {
		$scope.Profile = {};
		$scope.init = function(){
      var criteria = {filter: {'section':'profile'}};
      API.Profile(criteria).then(function (result) {
        if(result.status){
          $scope.Profile = result.data;
        }
      });
    }
    $scope.init();
  	$scope.updateProfile = function(){
      if($scope.Profile.name!=null){
        var criteria = {filter: {'section':'update', "data":$scope.Profile}};
        API.Profile(criteria).then(function (result) {
          toaster.pop('success', "Profile Update", "บันทึกสำเร็จ!");
        });
      }
      else{
        toaster.pop('warning', "Profile Update", "กรุณากรอกชื่อก่อนทำการบันทึก!");
      }
  	}
	}];
})();
