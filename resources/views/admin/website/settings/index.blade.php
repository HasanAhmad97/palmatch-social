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
                            <span class="caption-subject bold uppercase"> Settings</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        {!! Form::open(['method'=>'put','class'=>'form-horizontal','files'=>true,'id'=>'form']) !!}
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Website Settings</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">(Meet people) Image</label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new"
                                                         data-provides="fileinput">
                                                        <div class="fileinput-preview thumbnail"
                                                             data-trigger="fileinput"
                                                             style="width: 200px; height: 150px;">
                                                            <img
                                                                    src="{{$settings->meet_prople_image ?? url('assets/apps/img/unknown.png')}}"
                                                                    alt=""/>

                                                        </div>
                                                        <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> choose </span>
                                                                <span class="fileinput-exists"> change </span>
                                                                <input type="file" name="meet_prople_image"
                                                                       id="meet_prople_image"> </span>
                                                            <a href="javascript:;"
                                                               class="btn red fileinput-exists"
                                                               data-dismiss="fileinput">
                                                                cancel </a>
                                                        </div>
                                                    </div>

                                                </div>
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
                                                            <label class="control-label col-md-3">Meet people Content ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="meet_prople_content[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add description ({{$lang}})...">{{$settings->translation($key)->meet_prople_content}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Amazing feature Content ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="amazing_feature_content[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add description ({{$lang}})...">{{$settings->translation($key)->amazing_feature_content}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Stories Content ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="stories_content[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add description ({{$lang}})...">{{$settings->translation($key)->stories_content}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Membership Content ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="membership_content[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add description ({{$lang}})...">{{$settings->translation($key)->membership_content}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Register Member Content ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="register_member_content[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add description ({{$lang}})...">{{$settings->translation($key)->register_member_content}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">About us Content ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="about_us_content[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add description ({{$lang}})...">{{$settings->translation($key)->about_us_content}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Terms ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="terms_content[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add description ({{$lang}})...">{{$settings->translation($key)->terms_content}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Policy ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="policy_content[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add description ({{$lang}})...">{{$settings->translation($key)->policy_content}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                               <!--  <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">FAQS  ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="faqs_content[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add faqs content ({{$lang}})...">{{$settings->translation($key)->faqs_content}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div> -->

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Why PalMatch  ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="why_content[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add Why PalMatch content ({{$lang}})...">{{$settings->translation($key)->why_content}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">How Work PalMatch  ({{$lang}}
                                                                ):</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" name="how_work_content[{{$key}}]"
                                                                          id="description"
                                                                          class="form-control"
                                                                          rows="5"
                                                                          placeholder="Add How Work PalMatch content ({{$lang}})...">{{$settings->translation($key)->how_work_content}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- END FORM-->
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">




                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-circle green btn-md save">
                                                <i class="fa fa-check"></i>
                                                Save
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
            <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

            <script src="{{url(assets('admin'))}}/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"
                    type="text/javascript"></script>

            <script src="{{url(assets('admin'))}}/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
                    type="text/javascript"></script>
            <script src="{{url(assets('admin'))}}/global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->

            <script src="{{url(assets('admin'))}}/js/settings.js" type="text/javascript"></script>


            <script>
                $(document).ready(function()
                {
                   @foreach(config('languages.name') as $key => $lang)
                    CKEDITOR.replace('meet_prople_content[{{$key}}]');
                    CKEDITOR.replace('amazing_feature_content[{{$key}}]');
                    CKEDITOR.replace('stories_content[{{$key}}]');
                    CKEDITOR.replace('membership_content[{{$key}}]');
                    CKEDITOR.replace('register_member_content[{{$key}}]');
                    CKEDITOR.replace('about_us_content[{{$key}}]');
                    CKEDITOR.replace('terms_content[{{$key}}]');
                    CKEDITOR.replace('policy_content[{{$key}}]');
                    // CKEDITOR.replace('faqs_content[{{$key}}]');
                    CKEDITOR.replace('why_content[{{$key}}]');
                    CKEDITOR.replace('how_work_content[{{$key}}]');
                    @endforeach

                });
            </script>
@stop
