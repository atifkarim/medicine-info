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
                    <h3 class="box-title">Search Entity</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Select Entity</label>
                            <div class="col-sm-6">
                                <select class="form-control type" name="type">
                                    <option value="medicine" {{ $type === 'medicine' ? 'selected' : '' }}>Medicine</option>
                                    <option value="generic" {{ $type === 'generic' ? 'selected' : '' }}>Generic</option>
                                    <option value="diseases" {{ $type === 'diseases' ? 'selected' : '' }}>Diseases</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label entity">Medicine</label>
                            <div class="col-sm-6">
                                <select class="form-control entity-ajax" name="id"></select>
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

    @if($flag)
        @if($type === 'medicine')
            @include('product.show')
        @elseif($type === 'generic')
            @include('generic.show')
        @elseif($type === 'diseases')
            @include('diseases.show')
        @endif
    @endif
@endsection

@section('after_scripts')
    <script src="{{ asset('vendor/adminlte/bower_components/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var type = $('.type').val();
            @if($type)
                $('.entity').text(type).css('text-transform', 'capitalize');
            @endif
            $('.type').on('change', function() {
                type = $(this).val();
                $('.entity').text(type).css('text-transform', 'capitalize');
                changeDiseasesToSubDiseases();
            });

            function changeDiseasesToSubDiseases()
            {
                if(type === 'diseases')
                    type = 'sub_diseases';
            }

            changeDiseasesToSubDiseases();

            $('.entity-ajax').select2({
                theme: 'bootstrap',
                ajax: {
                    url: '{{ route('search.entitySearch') }}',
                    dataType: 'json',
                    quietMillis: 250,
                    data: function (params) {
                        var data = {
                            q: params.term, // search term
                            page: params.page,
                            widget_type: 'select2',
                            entity: type
                        };

                        return data;
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: false
                }
            });
        });
    </script>
@endsection