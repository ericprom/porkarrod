@extends('layouts.app')

@section('content')
<script src="{{ asset('assets/angular/controllers/carDetailController.js') }}"></script>
<div class="container" ng-controller="carDetailController" ng-cloak>
  <div class="row margin-bottom-50">
    <div class="col-md-9 col-sm-12 col-xs-12">
      <div class="detail-container" style="min-height:900px;">
        <div class="ribbon-wrapper" ng-show="Detail.car.sold==1"><div class="ribbon">SOLD</div></div>
        <h3>@{{Detail.car.title}}</h3>
        <h4>
          <span class="label label-default" style="display:inline-block">
            Brand: @{{Detail.car.brand.title}}
          </span>
          <span class="label label-default" style="display:inline-block">
            Model: @{{Detail.car.model.title}}
          </span>
          <span class="label label-default" style="display:inline-block">
            Year: @{{Detail.car.year}}
          </span>
          <span class="label label-info" style="display:inline-block">
            Price: @{{Detail.car.price | number}}
          </span>
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
      <div class="detail-contact" id="contact-box">
        <table>
          <tr ng-show="Detail.owner.username">
            <td width="50" height="50">
              <a href="{{ url('/') }}/@@{{Detail.owner.username}}">
                <img ng-src="@{{Detail.owner.avatar}}" class="avatar img-circle img-thumbnail" alt="@{{Detail.owner.name}}" style="width:40px;height:40px;">
              </a>
            </td>
            <td>
              <span class="detail-owner-name">
                <a href="{{ url('/') }}/@@{{Detail.owner.username}}">
                  @{{Detail.owner.name}}
                </a>
              </span>
              <br>
              <span class="detail-owner-username">
                <a href="{{ url('/') }}/@@{{Detail.owner.username}}">@@{{Detail.owner.username}}</a>
              </span>
            </td>
          </tr>
          <tr ng-hide="Detail.owner.username">
            <td width="50" height="50">
              <img ng-src="@{{Detail.owner.avatar}}" class="avatar img-circle img-thumbnail" alt="@{{Detail.owner.name}}" style="width:40px;height:40px;">
            </td>
            <td>
              <span class="detail-owner-name">
                @{{Detail.owner.name}}
              </span>
            </td>
          </tr>
          <tr ng-show="Detail.owner.phone">
            <td width="50" height="50">
              <img src="http://porkarrod.com/images/icons/phone.png" width="40">
            </td>
            <td>
              <span class="detail-owner-contact">
                <a href="tel:@{{Detail.owner.phone}}">@{{Detail.owner.phone}}</a>
              </span>
            </td>
          </tr>
          <tr ng-show="Detail.owner.line">
            <td width="50" height="50">
              <img src="http://porkarrod.com/images/icons/line.png" width="40">
            </td>
            <td>
              <span class="detail-owner-contact">
                @{{Detail.owner.line}}
              </span>
            </td>
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
