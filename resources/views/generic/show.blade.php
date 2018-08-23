<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('validation.attributes.generic') }} :: {{ ucfirst($entity->name) }}</h3>
            </div>

            <div class="box-body">
                <ul class="timeline">
                    <!-- timeline time label -->
                    <li>
                        <i class="fa fa-circle-o bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">{{ trans('validation.attributes.available_in_pregnancy') }}</a> {{ $entity->available_in_pregnancy ? 'Yes' : 'No' }}</h3>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-circle-o bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">{{ trans('validation.attributes.diseases') }}</a> </h3>
                            <div class="timeline-body">
                                <ul>
                                    @foreach($entity->sub_diseases as $key => $disease)
                                        <a href="{{ route('search.index',['type' => 'diseases', 'id' => $disease->id]) }}">
                                            <li>{{ ucfirst($disease->name) }}</li>
                                        </a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-circle-o bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">{{ trans('validation.attributes.side_effect') }}</a> </h3>
                            <div class="timeline-body">
                                {!! $entity->side_effect !!}
                            </div>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-circle-o bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">{{ trans('validation.attributes.alert') }}</a> </h3>
                            <div class="timeline-body">
                                {!! $entity->alert !!}
                            </div>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-circle-o bg-blue"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>{{ trans('validation.attributes.medicine') }}</th>
                            <th>{{ trans('validation.attributes.brand') }}</th>
                            <th style="width: 40px">Details</th>
                        </tr>
                    @foreach($products as $key => $product)
                        <tr>
                            <td>{{ ucfirst($product->name) }}</td>
                            <td>{{ ucfirst($product->brand->name) }}</td>
                            <td><a href="{{ route('search.index', ['type' => 'medicine', 'id' => $product->id]) }}"><span class="badge bg-blue">View</span></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>