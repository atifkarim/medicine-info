@extends('backpack::layout')

@section('after_styles')
    <!-- include select2 css-->
    <link href="{{ asset('vendor/adminlte/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('entity.attributes.search') }} {{ trans_choice('entity.attributes.medicine',1) }}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label entity">{{ trans_choice('entity.attributes.medicine',1) }}</label>
                            <div class="col-sm-6">
                                <select class="form-control entity-ajax" name="id">
                                    <option value="">Select a medicine</option>
                                    @foreach($products as $key => $product)
                                        <option value="{{ $product->id }}">{{ ucfirst($product->medicine_name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Go</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>


    @if($entity)
        @include('product.show')
    @endif
@endsection

@section('after_scripts')
    <script src="{{ asset('vendor/adminlte/bower_components/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.entity-ajax').select2({
                theme: 'bootstrap'
            });
        });
    </script>
@endsection