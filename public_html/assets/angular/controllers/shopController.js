(function () {
	myApp.controllers.shopController = ['API','$scope','$http','toaster', function(API,$scope,$http,toaster) {
		$scope.Shops = [];
    $scope.Sale = {};
    $scope.skip = 0;
    $scope.limit = 10;
    $scope.Total = 0;
		$scope.feedItem = function(skip,limit){
      API.Select({filter: {section:'shop',skip:skip,limit:limit}}).then(function (result) {
        if(result.status){
          angular.forEach(result.data.list, function (element, index, array) {
              $scope.Shops.push(element);
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
    $scope.saleIt = function(data){
       var date = moment(new Date()).format('YYYY-MM-DD');
      document.querySelector('#sold_date').value = date;
    	$('#saleItModal').modal('show');
      $scope.Sale = data;
      $scope.Sale.cash = data.price;
    }
    $scope.markAsSold = function(){
      $scope.Sale.sold_at = document.querySelector('#sold_date').value;
      if($scope.Sale.cash!=null&&$scope.Sale.cash!=''){

        if($scope.Sale.sold_at!=null&&$scope.Sale.sold_at!=''){
          var criteria = {filter: {'section':'sale', data:$scope.Sale}};
          API.Sale(criteria).then(function (result) {
            if(result.status){
              angular.forEach($scope.Shops, function (element, index, array) {
                if(element.car.id==result.data.id){
                  element.car.sold=result.data.sold;
                }
              });
              $('#saleItModal').modal('hide');
              toaster.pop('success', "Car Sale", "บันทึกการขายเรียบร้อย!");
            }
          });
        }
        else{
          toaster.pop('warning', "Car Sale", "กรุณากรอกวันที่ขาย!");
        }
      }
      else{
        toaster.pop('warning', "Car Sale", "กรุณากรอกราคาขาย!");
      }
    }
	}];
})();
