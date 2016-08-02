@extends('layouts.app')

@section('content')
<script src="{{ asset('assets/angular/controllers/welcomeController.js') }}"></script>
<div class="container" ng-controller="welcomeController" ng-cloak>
  <div class="margin-top-30 margin-bottom-30 min-height-500">
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12 pull-right">
        <div class="topic-title">
          <span  ng-show="Features.length>0">FEATURED<span style="font-weight:900;">CARS</span></span>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12" ng-repeat="get in Features">

            <div class="ribbon-wrapper"><div class="ribbon" style="background-color: #F1C032 !important;">advertise</div></div>
            <article class="shop-product">
              <a href="{{ url('/car') }}/@{{get.car.id}}">
                <figure class="shop-img" style="height:170px;background-image: url(@{{get.gallery[0]}});"></figure>
              </a>
              <header class="shop-title">
                <a href="{{ url('/car') }}/@{{get.car.id}}">@{{get.car.title}}</a>
              </header>
              <section class="brand-model-price">
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="brand-header">Brand</div>
                    <div class="brand-title">@{{get.car.brand.title}}</div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="brand-header">Model</div>
                    <div class="brand-title">@{{get.car.model.title}}</div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="brand-header">Price</span>
                    <div class="price-tag"><strong>@{{get.car.price | number}} ฿</strong></div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                  </div>
                </div>
              </section>
            </article>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 hidden-xs">
            @include('_help-center')
          </div>
        </div>
      </div>
      <div class="col-md-8 col-sm-6 col-xs-12 margin-top-30-small">
        <span class="topic-title">
          NEW<span style="font-weight:900;">CARS</span>
        </span>
        <div class="row">
          <div class="col-md-6 col-sm-12 col-xs-12" ng-repeat="get in Cars">
            <div class="ribbon-wrapper" ng-show="get.car.sold==1"><div class="ribbon">SOLD</div></div>
            <article class="shop-product">
              <a href="{{ url('/car') }}/@{{get.car.id}}">
                <figure class="shop-img" style="height:170px;background-image: url(@{{get.gallery[0]}});"></figure>
              </a>
              <header class="shop-title">
                <a href="{{ url('/car') }}/@{{get.car.id}}">@{{get.car.title}}</a>
              </header>
              <section class="brand-model-price">
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="brand-header">Brand</div>
                    <div class="brand-title">@{{get.car.brand.title}}</div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="brand-header">Model</div>
                    <div class="brand-title">@{{get.car.model.title}}</div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="brand-header">Price</span>
                    <div class="price-tag"><strong>@{{get.car.price | number}} ฿</strong></div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                  </div>
                </div>
              </section>
            </article>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 visible-xs">
        @include('_help-center')
      </div>
    </div>
    <div class="row margin-top-30" ng-show="Total>Cars.length">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="text-center">
          <button class="btn btn-default" ng-click="loadMore()">
            <i class="fa fa-refresh"></i> LOAD MORE
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
