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
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-users font-dark"></i>
                            <span
                                class="caption-subject bold uppercase"> Users messages</span>
                        </div>

                    </div>


                    <div class="portlet-body">
                        <table
                            class="table table-striped table-bordered table-hover table-checkable order-column"
                            id="contact_tbl">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> Name</th>
                                <th> Email</th>
                                <th> Description</th>
                                <th> Action</th>
                            </tr>
                            </thead>
                        </table>
                </div>
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
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{assets('admin')}}/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{assets('admin')}}/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
    <script src="{{assets('admin')}}/js/contact.js" type="text/javascript"></script>

@stop
