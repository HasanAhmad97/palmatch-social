@extends(admin_layout_vw().'.index')

@section('css')
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{assets('admin')}}/global/css/components-md.min.css" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{assets('admin')}}/global/css/plugins-md.min.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <style>
        .user-row {
            margin-bottom: 14px;
        }

        .user-row:last-child {
            margin-bottom: 0;
        }

        .dropdown-user {
            margin: 13px 0;
            padding: 5px;
            height: 100%;
        }

        .dropdown-user:hover {
            cursor: pointer;
        }

        .table-user-information > tbody > tr {
            border-top: 1px solid rgb(221, 221, 221);
        }

        .table-user-information > tbody > tr:first-child {
            border-top: 0;
        }


        .table-user-information > tbody > tr > td {
            border-top: 0;
        }
        .toppad
        {margin-top:20px;
        }

    </style>
@endsection
@section('content')

    <div class="page-content">

        <div class="row">
            <div class="col-md-12">


                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-user font-dark"></i>
                            <span class="caption-subject bold uppercase"> Subscription Management</span>
                        </div>
                    </div>
                    <div class="portlet-body">

    <div class="toppad" >

        <div class="panel panel-info">
            <div class="panel-heading">
                @if($subManage->Subscription->duration_type == "month")
                <h3 class="panel-title">{{$subManage->User->name}} - {{$subManage->Subscription->translationAll->title}} ({{$subManage->Subscription->duration}} / Monthly)</h3>
                @else
                <h3 class="panel-title">{{$subManage->User->name}} - {{$subManage->Subscription->translationAll->title}} ({{$subManage->Subscription->duration}} / Yearly)</h3>
                @endif
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center">
                        <div class="mt-card-item">
                            <div class="mt-card-avatar mt-overlay-1">
                                @if($subManage->user->photo !== '')
                                <img  class=" img-responsive" src="{{$subManage->user->photo}}">
                                @endif
                            </div>
                            <div class="mt-card-content">
                                <h3 class="mt-card-name"><a href="{{ url('/admin/users/' . $subManage->user->id . '/view') }}"> {{$subManage->user->name}} </a></h3>
                                <p class="mt-card-desc font-grey-mint">{{$subManage->user->education}}</p>
                            </div>
                        </div>
                    </div>

                    <div class=" col-md-9 col-lg-9 ">
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td>Email :</td>
                                <td><a href="mailto:{{$subManage->user->email}}">{{$subManage->user->email}}</a></td>
                            </tr>
                            <tr>
                                <td>Phone :</td>
                                <td>{{$subManage->user->country ? $subManage->user->country->code : ""}}-{{$subManage->user->phone}}</td>
                            </tr>
                            <tr>
                                <td>Country :</td>
                                <td>{{$subManage->user->country ? $subManage->user->country->translation()->name : ""}}</td>
                            </tr>
                            <tr>
                                <td>Religion :</td>
                                <td>{{$subManage->user->religion ? $subManage->user->religion->translation()->name : ""}}</td>
                            </tr>
                            <tr>
                                <td>Subscription Name :</td>
                                <td>{{$subManage->Subscription->translationAll ? $subManage->Subscription->translation()->title : ""}}</td>
                            </tr>
                            <tr>
                                <td>Subscription Cost :</td>
                                <td>{{$subManage->Subscription->cost ? "$" . $subManage->Subscription->cost : ""}}</td>
                            </tr>
                            <tr>
                                <td>Subscription Duration :</td>
                                @if($subManage->Subscription->duration_type == "month")
                                <td>{{$subManage->Subscription->duration ? $subManage->Subscription->duration : ""}} / Monthly</td>
                                @else
                                <td>{{$subManage->Subscription->duration ? $subManage->Subscription->duration : ""}} / Yearly</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Subscription Description :</td>
                                <td style="text-align-last: left;">{!! $subManage->Subscription->translationAll ? $subManage->Subscription->translation()->description : "" !!}</td>
                            </tr>
                            <tr>
                                <td>Created Subscription at :</td>
                                <td>{{\Carbon\Carbon::parse($subManage->created_at)->format('Y-m-d H:i:s')}}</td>
                            </tr>



                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')   <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{assets('admin')}}/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <script src="{{assets('admin')}}/pages/scripts/form-samples.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script src="{{assets('admin')}}/pages/scripts/components-select2.min.js" type="text/javascript"></script>

@stop
