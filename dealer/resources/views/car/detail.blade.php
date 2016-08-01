@extends('layouts.app')

@section('content')
<script src="{{ asset('assets/angular/controllers/carDetailController.js') }}"></script>
<div class="container" ng-controller="carDetailController" ng-cloak>
  <div class="row margin-bottom-50">
    <div class="col-md-9 col-sm-12 col-xs-12">
      <div class="white-bg-container" style="min-height:900px;">
        <div class="ribbon-wrapper" ng-show="Detail.car.sold==1"><div class="ribbon-red">SOLD</div></div>
        <h3>@{{Detail.car.title}}</h3>
        <h4>
          <span class="label label-default">Brand: @{{Detail.car.brand.title}}</span>
          <span class="label label-default">Model: @{{Detail.car.model.title}}</span>
          <span class="label label-default">Year: @{{Detail.car.year}}</span>
          <span class="label label-info">Price: @{{Detail.car.price | number}}</span>
        </h4>
        <p class="car-detail">
          @{{Detail.car.detail}}
          <div ng-repeat="path in Detail.gallery">
            <img ng-src="@{{path}}" class="car-image img-responsive center-block">
          </div>
        </p>
      </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="white-bg-container">
        <table>
          <tr>
            <td width="50">
              <img ng-src="@{{Detail.owner.avatar}}" class="avatar img-circle img-thumbnail" alt="avatar" style="width:40px;height:40px;">
            </td>
            <td><span class="detail-owner-name">@{{Detail.owner.name}}</span></td>
          </tr>
        </table>
        
        
      </div>
    </div>
  </div>
</div>
<script>
  (function () {
    window.carID  = "{!! $id !!}";
  })();
</script>
@endsection
