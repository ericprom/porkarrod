(function () {
	myApp.controllers.welcomeController = ['API','$scope','$http','toaster', function(API,$scope,$http,toaster) {
		$scope.Cars = [];
    $scope.Features = [];
    $scope.skip = 0;
    $scope.limit = 10;
    $scope.Total = 0;
    API.Select({filter: {section:'featured'}}).then(function (result) {
      if(result.status){
        angular.forEach(result.data.list, function (element, index, array) {
            $scope.Features.push(element);
        });
      }
    });
		$scope.feedItem = function(skip,limit){
      API.Select({filter: {section:'display',skip:skip,limit:limit}}).then(function (result) {
        if(result.status){
          angular.forEach(result.data.list, function (element, index, array) {
              $scope.Cars.push(element);
          });
          $scope.Total = result.data.total;
        }
      });
	  }
    $scope.feedItem(0,10);
    $scope.loadMore = function(){
      $scope.skip += 10;
      $scope.feedItem($scope.skip,$scope.limit);
    }
	}];
})();
