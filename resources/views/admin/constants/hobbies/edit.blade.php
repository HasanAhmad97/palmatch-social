@extends(admin_layout_vw().'.index')

@section('css')

    <link href="{{url(assets('admin'))}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>

@endsection
@section('content')
    <div class="page-content">

        <div class="row">
            <div class="col-md-12">


                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-edit font-dark"></i>
                            <span class="caption-subject bold uppercase"> Hobbies</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        {!! Form::open(['method'=>'put','class'=>'form-horizontal','files'=>true,'id'=>'form']) !!}
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div class="form-body">

                                <ul class="nav nav-tabs">

                                    @foreach(config('languages.name') as $key => $lang)
                                        <li @if($loop->first) class="active" @endif>
                                            <a href="#tab_{{$key}}" data-toggle="tab"> {{ucfirst($lang)}} </a>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="tab-content">

                                    @foreach(config('languages.name') as $key => $lang)

                                        <div class="tab-pane fade @if($loop->first) active in @endif "
                                             id="tab_{{$key}}">

                                            <input type="hidden" name="language" value="{{$key}}">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Title ({{$lang}}):</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="title[{{$key}}]" id="title"
                                                                   value="{{$hobby->translation($key)->name}}"
                                                                   class="form-control"
                                                                   placeholder="Add title ({{$lang}})...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END FORM-->
                                        </div>

                                    @endforeach
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-circle green btn-md save">
                                                <i class="fa fa-check"></i>
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}


                            <div class="clearfix margin-bottom-20"></div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
    @endsection

    @section('js')
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="{{url(assets('admin'))}}/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"
                    type="text/javascript"></script>

            <script src="{{url(assets('admin'))}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
                    type="text/javascript"></script>
            <script src="{{url(assets('admin'))}}/global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->

            <script src="{{url(assets('admin'))}}/js/hobbies.js" type="text/javascript"></script>


@stop
