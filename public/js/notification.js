"use strict";
angular.module("angular-notification-icons", ["angular-notification-icons.tpls"]), angular.module("angular-notification-icons.tpls", []), angular.module("angular-notification-icons.tpls").run(["$templateCache", function (n) {
    n.put("template/notification-icon.html", '<div class="angular-notifications-container">\n <div class="angular-notifications-icon overlay" ng-show="notification.visible"><div ng-hide="notification.hideCount">{{notification.count}}</div></div>\n <div class="notification-inner">\n <ng-transclude></ng-transclude>\n </div>\n</div>')
}]), function () {
    var n = function (n, i, t) {
        var a = this;
        a.visible = !1, a.wideThreshold = a.wideThreshold || 100, a.alwaysShow = a.alwaysShow || !1;
        var o, e = {
            appear: a.appearAnimation || a.animation || "grow",
            update: a.updateAnimation || a.animation || "grow",
            disappear: a.disappearAnimation
        };
        a.getElement = function (n) {
            return angular.element(n[0].querySelector(".angular-notifications-icon"))
        }, a.init = function (i) {
            a.$element = a.getElement(i), a.clearTrigger && i.on(a.clearTrigger, function () {
                a.count = 0, n.$apply()
            })
        };
        var l = function (n) {
            return n ? (o && i.cancel(o), o = i.addClass(a.$element, n), o.then(function () {
                return a.$element.removeClass(n), t.when(!0)
            }), o) : t.when(!1)
        }, r = function () {
            a.visible = !0, l(e.appear)
        }, c = function () {
            l(e.disappear).then(function (i) {
                a.visible = !1, i && n.$apply()
            })
        }, u = function () {
            l(e.update)
        };
        n.$watch(function () {
            return a.count
        }, function () {
            a.visible === !1 && (a.alwaysShow || a.count > 0) ? r() : !a.alwaysShow && a.visible === !0 && a.count <= 0 ? c() : u(), Math.abs(a.count) >= a.wideThreshold ? a.$element.addClass("wide-icon") : a.$element.removeClass("wide-icon")
        })
    }, i = function () {
        return {
            restrict: "EA",
            scope: {
                count: "=",
                hideCount: "@",
                alwaysShow: "@",
                animation: "@",
                appearAnimation: "@",
                disappearAnimation: "@",
                updateAnimation: "@",
                clearTrigger: "@",
                wideThreshold: "@"
            },
            controller: "NotificationDirectiveController",
            controllerAs: "notification",
            bindToController: !0,
            transclude: !0,
            templateUrl: "template/notification-icon.html",
            link: function (n, i, t, a) {
                a.init(i)
            }
        }
    };
    angular.module("angular-notification-icons").controller("NotificationDirectiveController", ["$scope", "$animate", "$q", n]).directive("notificationIcon", i)
}();