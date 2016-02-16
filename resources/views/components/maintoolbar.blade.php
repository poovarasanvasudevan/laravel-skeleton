<div class="card fixed-nav-bar" ng-controller="toolbar">
    <div class="toolbar header-color navbar-fixed-top navbar">

        <div class="toolbar__left mr+++">
            <button class="btn btn--l btn--black btn--icon" ng-model="sidebar" lx-ripple>
                <i class="mdi mdi-menu white"></i>
            </button>
        </div>

        <span class="toolbar__label fs-title"></span>

        <div class="toolbar__right">
            <lx-search-filter placeholder="Search..." theme="dark"></lx-search-filter>

            <button class="btn btn--l btn--black btn--icon border-left-white" lx-ripple>
                <i class="mdi mdi-account white"></i>
            </button>


            <button class="btn btn--l btn--black btn--icon border-left-white" lx-ripple>
                <i class="mdi mdi-bell-ring white"></i>
            </button>

            <lx-dropdown position="right" from-top>
                <button class="btn btn--l btn--black btn--icon border-left-white" lx-ripple lx-dropdown-toggle>
                    <i class="mdi mdi-dots-vertical white"></i>
                </button>

                <lx-dropdown-menu>
                    <ul ng-repeat="item in menus">
                        <li ng-click="my()" lx-ripple lx-tooltip="[[item.text]]"
                            tooltip-position="{{env('TOOLTIP_POSITION')}}">
                            <a class="dropdown-link dropdown-link--is-large">
                                <i class="zmdi [[item.icon]]"></i>
                                <span>[[item.text]]</span>
                            </a>
                        </li>
                    </ul>
                </lx-dropdown-menu>

            </lx-dropdown>
        </div>
    </div>
</div>