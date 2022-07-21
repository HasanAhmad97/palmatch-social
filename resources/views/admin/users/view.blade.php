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

        .toppad {
            margin-top: 20px;
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
                            <span class="caption-subject bold uppercase"> User Profile</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div class="toppad">

                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{$user->name}}</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3 " align="center">
                                            {{--<img alt="User Pic" src="{{$user->photo}}" class="img-circle img-responsive">--}}
                                            <div class="mt-card-item">
                                                <div class="mt-card-avatar mt-overlay-1">
                                                    <img class=" img-responsive" src="{{$user->photo300}}">
                                                </div>
                                                <div class="mt-card-content">
                                                    <h3 class="mt-card-name">{{$user->name}}</h3>
                                                    <p class="mt-card-desc font-grey-mint">{{$user->education}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class=" col-md-9 col-lg-9 ">
                                            <table class="table table-user-information">
                                                <tbody>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>{{$user->country ? $user->country->code : ""}}
                                                        -{{$user->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Age</td>
                                                    <td>{{$user->age}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Birth Date</td>
                                                    <td>{{$user->dob}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Gender</td>
                                                    <td>{{$user->gender}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Country</td>
                                                    <td>{{$user->country ? $user->country->translation()->name : ""}}</td>
                                                </tr>

                                                <tr>
                                                <tr>
                                                    <td>Religion</td>
                                                    <td>{{$user->religion ? $user->religion->translation()->name : ""}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Education</td>
                                                    <td>{{$user->education}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Hobbies</td>
                                                    <?php
                                                    $numItems = count($user->Hobbies);
                                                    $text = "";
                                                    foreach ($user->Hobbies as $key => $hobby) {
                                                        if (isset($hobby->Hobby)) {
                                                            $text .= $hobby->Hobby->translation()->name;
                                                            if (++$key != $numItems)
                                                                $text .= " , ";
                                                        }
                                                    }
                                                    ?>
                                                    <td>{{$text}}</td>
                                                </tr>

                                                <tr>
                                                    <td>Looking For</td>
                                                    <?php
                                                    $numItems = count($user->Interests);
                                                    $text = "";
                                                    foreach ($user->Interests as $key => $interest) {
                                                        if (isset($interest->Interest)) {
                                                            $text .= $interest->Interest->translation()->name;
                                                            if (++$key != $numItems)
                                                                $text .= " , ";
                                                        }
                                                    }
                                                    ?>
                                                    <td>{{$text}}</td>
                                                </tr>

                                                <tr>
                                                    <td>Bio</td>
                                                    <td>{{$user->bio}}</td>
                                                </tr>

                                                <tr>
                                                    <td>Created date</td>
                                                    <td>{{\Carbon\Carbon::parse($user->created_at)->format('Y-m-d H:i:s')}}</td>
                                                </tr>


                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                                {{--<div class="panel-footer">--}}
                                {{--<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>--}}
                                {{--<span class="pull-right">--}}
                                {{--<a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>--}}
                                {{--<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>--}}
                                {{--</span>--}}
                                {{--</div>--}}

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
