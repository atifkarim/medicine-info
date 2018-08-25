@extends('backpack::layout')

@section('content')
    <div class="row">
        <a href="{{ route('search.index') }}">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-search"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><br></span>
                        <span class="info-box-number">{{ trans('entity.attributes.search') }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </a>
        <!-- /.col -->
        <a href="{{ route('search.product') }}">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-bookmark-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><br></span>
                        <span class="info-box-number">{{ trans_choice('entity.attributes.medicine',0) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </a>

        <a href="{{ route('search.generic') }}">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><br></span>
                        <span class="info-box-number">{{ trans_choice('entity.attributes.generic',0) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </a>

        <a href="{{ route('search.diseases') }}">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-comments-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><br></span>
                        <span class="info-box-number">{{ trans_choice('entity.attributes.diseases',0) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </a>
    </div>
@endsection
