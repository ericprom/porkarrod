(function () {
	myApp.controllers.dashboardController = ['API','$scope','$http', function(API,$scope,$http) {
		$scope.Profile = {};
    $scope.Partner = {
      list:[]
    };
    $scope.skip = 0;
    $scope.limit = 10;
    $scope.Car = {
      sold:{
        list:[],
        total:0
      },
      total:{}
    }
    $scope.feedItem = function(skip,limit){
      API.Select({filter: {section:'sold',skip:skip,limit:limit}}).then(function (result) {
        if(result.status){
          angular.forEach(result.data.list, function (element, index, array) {
              $scope.Car.sold.list.push(element);
          });
          $scope.Car.sold.total = result.data.total;
        }
      });
    }
    $scope.init = function(){
      API.Select({filter: {section:'total'}}).then(function (result) {
        if(result.status){
          $scope.Car.total = result.data;
        }
      });
      API.Profile({filter: {'section':'profile'}}).then(function (result) {
        if(result.status){
          $scope.Profile = result.data;
        }
      });
      API.Partner({filter: {'section':'partner'}}).then(function (result) {
        if(result.status){
          $scope.Partner.list = result.data.data;
        }
      });
      $scope.feedItem(0,10);
    }
    $scope.init();
    $scope.loadMore = function(){
      $scope.skip += 10;
      $scope.feedItem($scope.skip,$scope.limit);
    }

    $scope.checkReport = function(data){
      $('#saleReportModal').modal('show');
      $scope.Report = data;
      console.log(data);
    }
	}];
})();
