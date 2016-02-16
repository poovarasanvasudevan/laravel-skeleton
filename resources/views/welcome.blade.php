@extends("components.layout")

@section("toolbar")
    @include("components.toolbar")
@stop

@section("content")
    <div class="col-md-4 col-md-offset-4" ng-controller="logincontroller">
        <div class="card" style="padding: 25px;">
            <form name="signInForm" ng-submit="processForm()" class="layout-margin">

                <lx-text-field label="Abyasi Id" fixed-label="true" icon="account">
                    <input type="text" ng-model="username"  placeholder="Abyasi Id" required>
                </lx-text-field>

                <br/>
                <lx-text-field label="Password" fixed-label="true" icon="eye">
                    <input  ng-model="password" type="password" placeholder="Password" required>
                </lx-text-field>

                <div class="row" style="margin: 5px;">
                    <div class="pull-left marginT10 marginL10">
                        <div class="checkbox">
                            <input type="checkbox" id="checkbox1" class="checkbox__input">
                            <label for="checkbox1" class="checkbox__label">Remember me</label>
                        </div>
                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn--m btn--blue btn--raised" lx-ripple>Login</button>
                    </div>
                </div>

                <center>
                    <h4 class="errorMessage error" ng-hide="AlertMessage">[[message]]</h4>
                </center>
            </form>
        </div>
    </div>
@stop