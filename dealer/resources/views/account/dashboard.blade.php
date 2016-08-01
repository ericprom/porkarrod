@extends('layouts.app')

@section('content')
<script src="{{ asset('assets/angular/controllers/dashboardController.js') }}"></script>
@include('account._menubar', array())
<div class="container" ng-controller="dashboardController" ng-cloak>
  <div class="row margin-bottom-50">
    <div class="col-md-3 col-sm-3 col-xs-12">
      <div class="white-bg-container">
        <h3>Profile</h3>
        <div class="text-center">
          <img ng-src="@{{Profile.avatar}}" class="avatar img-circle img-thumbnail" alt="avatar" style="width:100px;height:100px;">
          <h3>@{{Profile.name}}</h3>
          <a href="{{ url('/account/profile') }}">Edit Profile</a>
        </div>
      </div>
      <div class="white-bg-container">
        <h3>Partners(@{{Partner.list.length}})</h3>
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-4" ng-repeat="partner in Partner.list">
            <figure class=" margin-top-30">
              <img ng-src="@{{partner.avatar}}" alt="@{{partner.name}}" class="img-responsive img-circle"/>
            </figure>
          </div>
        </div>
        <div class="text-center" style="padding:20px;" ng-show="Partner.list.length>0">
          <a href="{{ url('/account/partners') }}">View all partners</a>
        </div>
        <div class="text-center" style="padding:20px;" ng-hide="Partner.list.length>0">
          <a href="{{ url('/account/partners') }}">Add partners</a>
        </div>
      </div>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-12">
      <div class="white-bg-container">
        <div style="min-height:590px;">
          <h3>Reports</h3>
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="bs-callout bs-callout-success" id="callout-tables-striped-ie8"> 
                <h4>รายได้รวมทั้งหมด</h4> 
                <p>
                   @{{Car.total.income | number}} บาท
                </p> 
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="bs-callout bs-callout-info" id="callout-tables-striped-ie8"> 
                <h4>ยอดขายทั้งหมด</h4> 
                <p>
                  @{{Car.total.sold | number}} คัน
                </p> 
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="bs-callout bs-callout-warning" id="callout-tables-striped-ie8"> 
                <h4>รถใน Stock ทั้งหมด</h4> 
                <p>
                  @{{Car.total.stock | number}} คัน
                </p> 
              </div>
            </div>
          </div>
          <h3>รายการขาย</h3>
          <table class="table table-hover"> 
            <thead> 
              <tr> 
              <th width="5%">#</th> 
              <th width="65%">ยี่ห้อรถ</th> 
              <th width="15%" class="text-right">วันที่ซื้อ</th> 
              <th width="15%" class="text-right">วันที่ขาย</th> 
              </tr> 
            </thead> 
            <tbody> 
              <tr ng-repeat="car in Car.sold.list"> 
                <th scope="row">
                    <i class="fa fa-file-o check-report"  ng-click="checkReport(car)"></i>
                </th> 
                <td>
                  <strong>@{{car.brand.title}} @{{car.model.title}} ปี @{{car.year}} สี @{{car.color}}</strong>
                  <span style="font-size: 18px">
                    <span class="label label-default">ซื้อ: @{{car.budget | number}}</span>
                    <span class="label label-success">ขาย: @{{car.cash | number}}</span>
                  </span>
                </td> 
                <td class="text-right">@{{car.bought_at | dateonly}}</td> 
                <td class="text-right">@{{car.sold_at | dateonly}}</td> 
              </tr> 
            </tbody> 
          </table>
          <div class="row" ng-show="Car.sold.total>Car.sold.list.length">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="text-center"  ng-click="loadMore()" style="cursor:pointer;">Load more...</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('account._sale-report-modal', array())
</div>
@endsection
