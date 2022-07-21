@extends(admin_layout_vw().'.index')

@section('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{assets('admin')}}/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{assets('admin')}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css"
          rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
    <style>
        .form .form-section, .portlet-form .form-section {
            margin: 0 !important;
            padding: 0 !important;
        }
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="row">

            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-search font-dark"></i>
                            <span
                                class="caption-subject bold uppercase"> Filter </span>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            {!! Form::open(['method'=>'POST','url'=>url('/admin/export')]) !!}

                            <table
                                class="table table-striped table-bordered table-hover table-checkable"
                                id="datatable_products">
                                <thead>
                                <tr role="row" class="heading">
                                    <th width="1%">
                                    </th>
                                    <th width="10%"> Name</th>
                                    <th width="10%"> Email</th>
                                    <th width="10%"> Phone</th>
                                    <th width="10%"> Action</th>

                                </tr>
                                <tr role="row" class="filter">
                                    <td></td>
                                    <td>
                                        <input type="text"
                                               class="form-control form-filter input-md"
                                               name="name"
                                               placeholder="Name"
                                               id="name">

                                    </td>
                                    <td>
                                        <input type="email"
                                               class="form-control form-filter input-md"
                                               name="email"
                                               placeholder="Email" id="email">
                                    </td>
                                    <td>
                                        <input type="text"
                                               class="form-control form-filter input-md"
                                               name="phone"
                                               placeholder="Phone" id="phone">
                                    </td>
                                    <td rowspan="3">
                                        <div class="margin-bottom-5">
                                            <a href="javascript:;"
                                               class="btn btn-sm btn-success btn-circle btn-icon-only filter-submit margin-bottom"
                                               title="Search">
                                                <i class="fa fa-search"></i>
                                            </a>
                                            {{--                                                                                <input type="checkbox" class="make-switch" checked data-on-color="success" data-off-color="warning">--}}
                                            <a href="javascript:;"
                                               class="btn btn-sm btn-danger btn-circle btn-icon-only filter-cancel"
                                               title="Empty">
                                                <i class="fa fa-rotate-left"></i>
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                                <tr role="row" class="heading">
                                    <th width="1%">
                                    </th>
                                    <th width="10%"> Gender</th>
                                    <th width="10%"> Country</th>
                                    <th width="10%"> Status</th>
                                </tr>
                                <tr role="row" class="filter">
                                    <td></td>
                                    <td>
                                        <select
                                            class="form-control input-md select2"
                                            name="gender" id="gender"
                                            data-placeholder="Choose Gender">
                                            <option value="">Choose Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select
                                            class="form-control input-md select2"
                                            name="country_id" id="country_id"
                                            data-placeholder="Choose Country">
                                            <option value="">Choose Country</option>
                                            @foreach($countries as $country)
                                                <option
                                                    value="{{$country->id}}">{{$country->translation()->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select
                                            class="form-control input-md select2"
                                            name="is_active" id="is_active"
                                            data-placeholder="Choose Status">
                                            <option value="">Choose Status</option>
                                            <option value="0">Disable</option>
                                            <option value="1">Active</option>
                                        </select>
                                    </td>

                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="{{$icon}} font-dark"></i>
                            <span
                                class="caption-subject bold uppercase"> Users</span>
                        </div>

                    </div>


                    <div class="portlet-body">
                        <table
                            class="table table-striped table-bordered table-hover table-checkable order-column"
                            id="users_tbl">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> Photo</th>
                                <th> Name</th>
                                <th> Email</th>
                                <th> Gender</th>
                                <th> Phone</th>
                                <th> Country</th>
                                <th> Online</th>
                                <th> Status</th>
                                <th> Publish</th>
                                <th> Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- /.modal -->
@endsection

@section('js')

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{assets('admin')}}/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="{{assets('admin')}}/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="{{assets('admin')}}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    {{--<script type="text/javascript" src="javascripts/jquery.googlemap.js"></script>--}}
    {{--    <script src="{{assets('admin')}}/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>--}}

    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{assets('admin')}}/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    {{--<script src="{{assets('admin')}}/pages/scripts/maps-google.min.js" type="text/javascript"></script>--}}
    {{--    <script src="{{assets('admin')}}/pages/scripts/ui-modals.min.js" type="text/javascript"></script>--}}

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{assets('admin')}}/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script>

    {{--<script src="{{assets('admin')}}/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>--}}
    <!-- END PAGE LEVEL SCRIPTS -->
    <script src="{{assets('admin')}}/js/users.js" type="text/javascript"></script>

@stop
