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
                            <i class="fa fa-plus font-dark"></i>
                            <span class="caption-subject bold uppercase"> Answer </span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        {!! Form::open(['method'=>'post','class'=>'form-horizontal','id'=>'form']) !!}
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Question</label>
                                            <div class="col-md-9">
                                                <div class="fileinput fileinput-new" data-provides="fileinput  ">
                                                    <div>
                                                        <select class="form-control input-md select2" name="question_id" id="question_id" data-placeholder="Choose Question">
                                                            <option value="">Choose Question</option> @foreach($questions as $question)
                                                            <option
                                                            value="{{$question->id}}">{{$question->translation()->text}}</option>
                                                            @endforeach
                                                        </select>
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
                                                        <label class="control-label col-md-3">Answer ({{$lang}}):</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="text[{{$key}}]" id="text"
                                                                   class="form-control"
                                                                   placeholder="Add Answer ({{$lang}})...">
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

            <script src="{{url(assets('admin'))}}/js/answers.js" type="text/javascript"></script>


@stop
