/**
 * Created by poovarasanv on 29-01-2016.
 */
var app = angular.module('blog', ['lumx', 'angular-notification-icons', 'ngAnimate'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

var BASEURL = "http://localhost:85/blog/public";
var TIMEOUTTIME = 5000;
var LOGINURL = BASEURL + '/validate/';
var DASHBOARDURL = BASEURL + '/dashboard';
var MENUURL = BASEURL + '/menus';
var ARTEFACTTYPEURL = BASEURL + '/artefacttypes';

app.controller('toolbar', function ($scope) {

});

app.controller('globalcontroller', function ($scope, $timeout, $http, LxNotificationService, LxDialogService) {

    $scope.AlertMessage = true;

    $timeout(function () {
        $scope.AlertMessage = true;
    }, 3000);


    $http.get(MENUURL).success(function (data) {
        $scope.menus = data.result;
    });


    $scope.logout = function () {
        LxNotificationService.confirm('Arte you sure ?', 'Arte you sure ,you want to logout from Phoenix Modern Application', {
            cancel: 'No',
            ok: 'Yes'
        }, function (answer) {
            console.log(answer);
        });
    };

    $scope.my = function () {
        LxNotificationService.confirm('Are you sure ?', 'Arte you sure ,you want to logout from Phoenix Modern Application', {
            cancel: 'No',
            ok: 'Yes'
        }, function (answer) {
            console.log(answer);
        });
    };
});


app.controller('logincontroller', function ($scope, $http, $timeout, $window) {
    $scope.processForm = function () {
        $http.post(LOGINURL + $scope.username + "/" + $scope.password).success(function (data) {
            if (data.result == true) {
                $window.location.href = DASHBOARDURL;
            } else {
                $scope.AlertMessage = false;
                $scope.message = "Invalid Username or password..";
                $timeout(function () {
                    $scope.AlertMessage = true;
                }, TIMEOUTTIME);
            }
        });
    }
});

app.controller('sidebarcontroller', function ($scope) {

    /**
     * | Sidebar Controller for managing sidebar events
     * |
     * |  This event will responsible for every clickAble item from sidebar
     * |
     * */


});

app.controller('dashboardcontroller', function ($scope, $http) {

    $http.get(ARTEFACTTYPEURL).success(function (data) {
        $scope.artefacttypes = data.result;
    });

});


$(document).ready(function () {
    var stickyNavTop = $('.fixed-nav-bar').offset().top;

    var stickyNav = function () {
        var scrollTop = $(window).scrollTop();

        if (scrollTop > stickyNavTop) {
            $('.fixed-nav-bar').addClass('sticky');
        } else {
            $('.fixed-nav-bar').removeClass('sticky');
        }
    };

    stickyNav();

    $(window).scroll(function () {
        stickyNav();
    });

});
