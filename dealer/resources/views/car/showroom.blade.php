@extends('layouts.app')

@section('content')
<script src="{{ asset('assets/angular/controllers/showroomController.js') }}"></script>
<div class="container" ng-controller="showroomController" ng-cloak>
  <div class="margin-top-30 margin-bottom-30 min-height-500">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="white-bg-container">
          <div class="showroom-profile text-center">
            <img src="{{$showroom->avatar}}" class="avatar img-circle img-thumbnail" alt="{{$showroom->name}}" style="width:100px;height:100px;">
            <h3>{{$showroom->name}}</h3>
            <h5>{{'@'.$showroom->username}}</h5>
          </div>
        </div>
        @if ($showroom->phone||$showroom->line)
        <div class="white-bg-container">
          <h3>Contact</h3>
          <table>
            @if ($showroom->phone)
            <tr>
              <td width="40" height="40">
                <img src="http://porkarrod.com/images/icons/phone.png" width="30">
              </td>
              <td>
                <span class="showroom-contact">
                  <a href="tel:{{$showroom->phone}}">{{$showroom->phone}}</a>
                </span>
              </td>
            </tr>
            @endif
            @if ($showroom->line)
            <tr>
              <td width="40" height="40">
                <img src="http://porkarrod.com/images/icons/line.png" width="30">
              </td>
              <td>
                <span class="showroom-contact">
                  {{$showroom->line}}
                </span>
              </td>
            </tr>
            @endif
          </table>
        </div>
        @endif
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="row">
          <div class="col-md-6 col-sm-12 col-xs-12" ng-repeat="shop in Shops">
            <div class="ribbon-wrapper" ng-show="shop.car.sold==1"><div class="ribbon">SOLD</div></div>
            <article class="shop-product">
              <a href="{{ url('/car') }}/@{{shop.car.id}}">
                <figure class="shop-img" style="height:170px;background-image: url(@{{shop.gallery[0]}});"></figure>
              </a>
              <header class="shop-title">
                <a href="{{ url('/car') }}/@{{shop.car.id}}">@{{shop.car.title}}</a>
              </header>
              <section class="brand-model-price">
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="brand-header">Brand</div>
                    <div class="brand-title">@{{shop.car.brand.title}}</div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="brand-header">Model</div>
                    <div class="brand-title">@{{shop.car.model.title}}</div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="brand-header">Price</span>
                    <div class="price-tag"><strong>@{{shop.car.price | number}} ฿</strong></div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                  </div>
                </div>
              </section>
            </article>
          </div>
        </div>
      </div>
    <div>
    <div class="row margin-top-30" ng-show="Total>Shops.length">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="text-center"><button class="btn btn-default" ng-click="loadMore()"><i class="fa fa-refresh"></i> LOAD MORE</button></div>
      </div>
    </div>
    <br>
  </div>
</div>
<script>
  (function () {
    window.showroom  = "{!! $showroom->id !!}";
  })();
</script>
@endsection
