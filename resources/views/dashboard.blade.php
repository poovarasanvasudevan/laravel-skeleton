@extends("components.layout")


@section("toolbar")
    @include("components.maintoolbar")
@stop


@section("content")
    <div ng-controller="dashboardcontroller" style="margin-top: 10px !important;">
        <div class="col-md-12" id="corusoal">
            <div ng-repeat="artefacttype in artefacttypes">
                <div class="col-md-2">
                    <div class="card marginT10 bg-primary">

                        <div class="p+" tooltip-position="{{env('TOOLTIP_POSITION')}}"
                             lx-tooltip="[[artefacttype.artefacttypedescription]]">
                            <div class="row">
                                <div class="col-md-8 pull-left">
                                    <strong class="fs-headline display-block">[[artefacttype.artefacttypedescription]]</strong>
                                    <span class="fs-subhead tc-black-2 display-block">[[artefacttype.artefacttypedescription]]</span>
                                </div>

                                <div class="col-md-4 pull-right">
                                    <i class="mdi mdi-icon-color mdi-big [[artefacttype.artefact_icon]]"></i>
                                </div>
                            </div>
                        </div>

                        <div class="card__actions">
                            <button class="btn btn--m btn--black btn--flat col-md-6 margin0"
                                    tooltip-position="{{env('TOOLTIP_POSITION')}}"
                                    lx-tooltip="View All [[artefacttype.artefacttypedescription]]" lx-ripple>View
                            </button>
                            <button class="btn btn--m btn--orange btn--flat col-md-6 margin0"
                                    tooltip-position="{{env('TOOLTIP_POSITION')}}"
                                    lx-tooltip="Check All [[artefacttype.artefacttypedescription]]" lx-ripple>Check
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <div class="col-md-12">
            <div class="dropdown-divider marginT10"></div>
            <h1>{{session('user')}} {{env('APP_NAME')}}</h1>
        </div>
    </div>
@stop


