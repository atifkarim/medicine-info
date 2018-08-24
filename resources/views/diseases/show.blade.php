<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Search Result</h3>
            </div>

            <div class="box-body">
                <ul class="timeline">
                    <!-- timeline time label -->
                    <li class="time-label">
                      <span class="bg-red">
                        {{ trans('validation.attributes.diseases') }} :: {{ ucfirst($entity->name) }}
                      </span>
                    </li>
                    <li>
                        <i class="fa fa-circle-o bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">{{ trans('validation.attributes.name') }}:</a> {{ ucfirst($entity->name) }}</h3>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-circle-o bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">{{ trans('validation.attributes.diseases') }}:</a> {{ ucfirst($entity->diseases->name) }}</h3>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-circle-o bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">{{ trans('validation.attributes.medicine') }}</a> </h3>
                            <div class="timeline-body">
                                <ul>
                                    @foreach($entity->products as $key => $product)
                                        <a href="{{ route('search.index',['type' => 'medicine', 'id' => $product->id]) }}">
                                            <li>{{ ucfirst($product->medicine_name) }}</li>
                                        </a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-circle-o bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">{{ trans('validation.attributes.investigation') }}</a> </h3>
                            <div class="timeline-body">
                                <ul>
                                    @foreach($entity->investigations as $key => $investigation)
                                        <li>{{ ucfirst($investigation->name) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-circle-o bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">{{ trans('validation.attributes.symptom') }}</a> </h3>
                            <div class="timeline-body">
                                {!! $entity->symptom !!}
                            </div>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-circle-o bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">{{ trans('validation.attributes.causes') }}</a> </h3>
                            <div class="timeline-body">
                                {!! $entity->causes !!}
                            </div>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-circle-o bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">{{ trans('validation.attributes.treatment') }}</a> </h3>
                            <div class="timeline-body">
                                {!! $entity->treatment !!}
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
</div>