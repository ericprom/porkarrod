(function () {
	myApp.controllers.carDetailController = ['API','$scope','$http','toaster','$window', function(API,$scope,$http,toaster,$window) {
    $scope.carID = $window.carID;
    $scope.Detail = {};
		$scope.init = function(){
      API.Select({filter: {section:'detail',id:$scope.carID}}).then(function (result) {
        $scope.Detail = result.data;
      });
    }
    $scope.init();
	}];
})();

		
