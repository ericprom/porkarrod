@extends('layouts.app')

@section('content')
<script src="{{ asset('assets/angular/controllers/partnerController.js') }}"></script>
@include('account._menubar', array())
<div class="container" ng-controller="partnerController" ng-cloak>
  <div class="white-bg-container margin-bottom-50 min-height-500">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-6">
        <h3>Partners</h3>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top:12px;">
        <button class="btn btn-success pull-right" 
          data-toggle="modal" 
          data-target="#addPartnerModal">
          <i class="fa fa-user-plus"></i> Add partner
        </button>
      </div>
    </div>
    <ul class="nav nav-pills">
      <li role="presentation" ng-show="Partner.friend.length>0">
        <a ng-click="switchTab('friend')" class="innermenu">Friends(@{{Partner.friend.length}})</a>
      </li>
      <li role="presentation" ng-show="Partner.pending.length>0">
        <a ng-click="switchTab('pending')" class="innermenu">Pending(@{{Partner.pending.length}})</a>
      </li>
      <li role="presentation" ng-show="Partner.request.length>0">
        <a ng-click="switchTab('request')" class="innermenu">Request(@{{Partner.request.length}})</a>
      </li>
    </ul>
    <section class="row" ng-show="Tab=='friend'">
      <div class="col-md-4 col-sm-6 col-xs-12" ng-repeat="partner in Partner.friend">
        <article class="friend-block">
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <img ng-src="@{{partner.avatar}}" alt="@{{partner.name}}" class="img-responsive img-circle center-block" style="width:80px;" />
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <div class="friend-name">@{{partner.name}}</div>
              <button class="btn btn-danger pull-right" ng-click="unfriendRequest(partner)">
                Unfriend
              </button>
            </div>
          </div>
        </article>
      </div>
    </section>
    <section class="row" ng-show="Tab=='pending'">
      <div class="col-md-4 col-sm-6 col-xs-12" ng-repeat="partner in Partner.pending">
        <article class="friend-block">
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <img ng-src="@{{partner.avatar}}" alt="@{{partner.name}}" class="img-responsive img-circle center-block" style="width:80px;" />
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <div class="friend-name">@{{partner.name}}</div>
              <button class="btn btn-danger pull-right" ng-click="cancelRequest(partner)">
                Cancel
              </button>
            </div>
          </div>
        </article>
      </div>
    </section>
    <section class="row" ng-show="Tab=='request'">
      <div class="col-md-4 col-sm-6 col-xs-12" ng-repeat="partner in Partner.request">
        <article class="friend-block">
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <img ng-src="@{{partner.avatar}}" alt="@{{partner.name}}" class="img-responsive img-circle center-block" style="width:80px;" />
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <div class="friend-name">@{{partner.name}}</div>
              <button class="btn btn-danger pull-right" ng-click="acceptDenyRequest(partner)">
                Response
              </button>
            </div>
          </div>
        </article>
      </div>
    </section>
  </div>
  @include('account._accept-deny-request-modal', array())
  @include('account._unfriend-modal', array())
  @include('account._cancel-request-modal', array())
  @include('account._friend-request-modal', array())
</div>
@endsection
