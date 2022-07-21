@extends(admin_layout_vw().'.index')

@section('css')

    <link href="{{url(assets('admin'))}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
          type="text/css"/>

    <style>
        .control-label {
            text-align: left !important;
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
                            <i class="fa fa-edit font-dark"></i>
                            <span class="caption-subject bold uppercase"> Subscriptions</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        {!! Form::open(['method'=>'put','class'=>'form-horizontal','files'=>true,'id'=>'form']) !!}
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Duration :</label>
                                            <div class="col-md-4">
                                                <input type="number" name="duration" id="title"
                                                       class="form-control"
                                                       value="{{$subscription->duration}}"
                                                       placeholder="duration">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Duration Type :</label>
                                            <div class="col-md-9">
                                                <div class="mt-radio-inline">
                                                    <label class="mt-radio">
                                                        <input @if($subscription->duration_type == "month") checked  @endif type="radio" name="duration_type" id="duration_type1" value="month" >Monthly
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input @if($subscription->duration_type == "year") checked  @endif type="radio" name="duration_type" id="duration_type2" value="year" >Yearly
                                                        <span></span>
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3"> Cost ($) :</label>
                                            <div class="col-md-4">
                                                <input type="text" name="cost" id="title"
                                                       class="form-control"
                                                       value="{{$subscription->cost}}"
                                                       placeholder="cost $">                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr>
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
                                                                   value="{{$subscription->translation($key)->title}}"
                                                                   class="form-control"
                                                                   placeholder="Add title ({{$lang}})...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Description ({{$lang}}
                                                            ):</label>
                                                        <div class="col-md-9">
                                                                <textarea type="text" name="description[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add description ({{$lang}})...">{{$subscription->translation($key)->description}}</textarea>
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

            <script src="{{url(assets('admin'))}}/js/subscriptions.js" type="text/javascript"></script>
            <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

            <script>
                $(document).ready(function()
                {
                    @foreach(config('languages.name') as $key => $lang)
                     CKEDITOR.replace('description[{{$key}}]');
                    @endforeach

                });
            </script>

@stop
