(function () {
	myApp.controllers.showroomController = ['API','$scope','$http','toaster','$window', function(API,$scope,$http,toaster,$window) {
		
    $scope.showroom = $window.showroom;
    $scope.Shops = [];
    $scope.skip = 0;
    $scope.limit = 10;
    $scope.Total = 0;
		$scope.feedItem = function(skip,limit){
      API.Select({filter: {section:'showroom',showroom:$scope.showroom,skip:skip,limit:limit}}).then(function (result) {
        if(result.status && result.data.found){
          angular.forEach(result.data.list, function (element, index, array) {
              $scope.Shops.push(element);
          });
          $scope.Total = result.data.total;
        }
        $scope.Found = result.data.found;
      });
    }
    $scope.feedItem(0,10);
    $scope.loadMore = function(){
      $scope.skip += 10;
      $scope.feedItem($scope.skip,$scope.limit);
    }
	}];
})();
