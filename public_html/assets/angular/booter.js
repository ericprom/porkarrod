AngularBooter = function(appName) {
  return {
    controllers:  {},
    appName:      appName ? appName : 'myApp',
    boot: function() {
      var thiz = this;
      angular.module(this.appName, ['angularMoment','angular-underscore','ngAnimate','toaster'],function($httpProvider){
        $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
        $httpProvider.defaults.transformRequest = [function(data){
          var param = function(obj)
          {
            var query = '';
            var name, value, fullSubName, subName, subValue, innerObj, i;

            for(name in obj){
              value = obj[name];
              if(value instanceof Array){
                for(i=0; i<value.length; ++i){
                  subValue = value[i];
                  fullSubName = name + '[' + i + ']';
                  innerObj = {};
                  innerObj[fullSubName] = subValue;
                  query += param(innerObj) + '&';
                }
              }
              else if(value instanceof Object){
                for(subName in value){
                  subValue = value[subName];
                  fullSubName = name + '[' + subName + ']';
                  innerObj = {};
                  innerObj[fullSubName] = subValue;
                  query += param(innerObj) + '&';
                }
              }
              else if(value !== undefined && value !== null){
                query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';
              }
            }
            return query.length ? query.substr(0, query.length - 1) : query;
          };
          return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;
        }];
      });
      angular.module(this.appName).directive('validNumber', function() {
        return {
          require: '?ngModel',
          link: function(scope, element, attrs, ngModelCtrl) {
            if(!ngModelCtrl) {
              return;
            }
            ngModelCtrl.$parsers.push(function(val) {
              if (angular.isUndefined(val)) {
                var val = '';
              }
              var clean = val.replace(/[^0-9\.]/g, '');
              var decimalCheck = clean.split('.');

              if(!angular.isUndefined(decimalCheck[1])) {
                decimalCheck[1] = decimalCheck[1].slice(0,2);
                clean =decimalCheck[0] + '.' + decimalCheck[1];
              }
              if (val !== clean) {
                ngModelCtrl.$setViewValue(clean);
                ngModelCtrl.$render();
              }
              return clean;
            });
            element.bind('keypress', function(event) {
              if(event.keyCode === 32) {
                event.preventDefault();
              }
            });
          }
        };
      });
      angular.module(thiz.appName).filter('dateonly', function(){
        return function(input){
          var date = moment(input);
          var date_fragment = []
          date_fragment.push(date.format('DD'))
          date_fragment.push(date.format('MM'))
          date_fragment.push((parseInt(date.format('YYYY')) + 543))
          return date_fragment.join('/')
        }
      });
      angular.module(thiz.appName).factory('API', function($window,$q,$timeout,$http,$rootScope){
        var Host = "http://porkarrod.com";
        var Brand = function(param) {
          var deferred = $q.defer();
          $http.post(Host+"/api/v1/brands", param).success(function(results) {
            deferred.resolve(results);
          });
          return deferred.promise;
        }
        var Import = function(param) {
          var deferred = $q.defer();
          $http.post(Host+"/api/v1/car/import", param).success(function(results) {
            deferred.resolve(results);
          });
          return deferred.promise;
        }
        var Select = function(param) {
          var deferred = $q.defer();
          $http.post(Host+"/api/v1/car/select", param).success(function(results) {
            deferred.resolve(results);
          });
          return deferred.promise;
        }
        var Sale = function(param) {
          var deferred = $q.defer();
          $http.post(Host+"/api/v1/car/sale", param).success(function(results) {
            deferred.resolve(results);
          });
          return deferred.promise;
        }
        var Profile = function(param) {
          var deferred = $q.defer();
          $http.post(Host+"/api/v1/account/profile", param).success(function(results) {
            deferred.resolve(results);
          });
          return deferred.promise;
        }
        var Partner = function(param) {
          var deferred = $q.defer();
          $http.post(Host+"/api/v1/account/partners", param).success(function(results) {
            deferred.resolve(results);
          });
          return deferred.promise;
        }
        var Remove = function (list, item) {
          var index = list.indexOf(item);
          list.splice(index, 1);
        };
        function validateEmail(email) {
          var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return re.test(email);
        }
        return{
          Brand:Brand,
          Import:Import,
          Select:Select,
          Sale:Sale,
          Profile:Profile,
          Partner:Partner,
          Remove:Remove,
          validateEmail:validateEmail
        };
      });
      angular.module(this.appName).controller(this.controllers);
    }
  };
};
