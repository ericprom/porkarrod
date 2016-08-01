(function () {
	myApp.controllers.partnerController = ['API','$scope','$http','toaster', function(API,$scope,$http,toaster) {
    $scope.Tab = 'friend';
		$scope.Partner = {
      friend:[],
      pending:[],
      request:[]
    };
    $scope.init = function(){
      API.Partner({filter: {'section':'partners'}}).then(function (result) {
        if(result.status){
          angular.forEach(result.data, function (element, index, array) {
            element.status = 'accepted';
            $scope.Partner.friend.push(element);
          });
        }
      }).then(function(){
        API.Partner({filter: {'section':'pending'}}).then(function (result) {
          if(result.status){
            angular.forEach(result.data, function (element, index, array) {
              switch(element.status){
                case 'pending':
                  $scope.Partner.pending.push(element.user);
                  break;
                case 'request':
                  $scope.Partner.request.push(element.user);
                  break;
              }
            });
          }
        });
      });
    }
    $scope.init();

    $scope.switchTab = function(tab){
      $scope.Tab = tab;
    }
    
    //Friends request
    $scope.friendRequest = function(){
      if(API.validateEmail($scope.Partner.email)){
        var criteria = {filter: {'section':'friend_request', data:$scope.Partner}};
        API.Partner(criteria).then(function (result) {
          if(result.status && result.data.found){
            $scope.Partner.email='';
            $scope.Partner.pending.push(result.data.message);
            $('#addPartnerModal').modal('hide');
          }
          else{
            toaster.pop('warning', "Partnership", result.data.message);
          }
        });
      }
      else{
        toaster.pop('warning', "Partnership", "กรุณากรอกอีเมล์ที่ถูกต้อง!");
      }
    }

    //Accept and deny friends request
    $scope.acceptDenyRequestObj = {};
    $scope.acceptDenyRequest = function(user){
      $scope.acceptDenyRequestObj = user;
      $('#acceptDenyRequestModal').modal('show');
    }
    $scope.acceptDenyResponse = function(action){
      var criteria = {filter: {'section':'response', 'action':action, data:$scope.acceptDenyRequestObj}};
      API.Partner(criteria).then(function (result) {
        if(result.status){
          if(action=='accept'){
            $scope.acceptDenyRequestObj.status = 'accepted';
            $scope.Partner.friend.push($scope.acceptDenyRequestObj);
          }
          $('#acceptDenyRequestModal').modal('hide');
          API.Remove($scope.Partner.request,$scope.acceptDenyRequestObj);
        }
      });
    }

    //Cancel friends request
    $scope.cancelRequestObj = {};
    $scope.cancelRequest = function(user){
      $scope.cancelRequestObj = user;
      $('#cancelRequestModal').modal('show');
    }
    $scope.cancelRequestResponse = function(action){
      var criteria = {filter: {'section':'cancel_request', 'action':action, data:$scope.cancelRequestObj}};
      API.Partner(criteria).then(function (result) {
        if(result.status){
          API.Remove($scope.Partner.pending,$scope.cancelRequestObj);
          $('#cancelRequestModal').modal('hide');
        }
      });
    }


    $scope.unfriendRequestObj = {};
    $scope.unfriendRequest = function(user){
      $scope.unfriendRequestObj = user;
      $('#unfriendRequestModal').modal('show');
    }
    $scope.unfriendResponse = function(action){
      var criteria = {filter: {'section':'unfriend', 'action':action, data:$scope.unfriendRequestObj}};
      API.Partner(criteria).then(function (result) {
        if(result.status){
          API.Remove($scope.Partner.friend,$scope.unfriendRequestObj);
          $('#unfriendRequestModal').modal('hide');
        }
      });
    }
	}];
})();
