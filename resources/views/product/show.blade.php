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
                        {{ trans('validation.attributes.medicine') }} :: {{ ucfirst($entity->medicine_name) }}
                      </span>
                    </li>
                    <li>
                        <i class="fa fa-circle-o bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">{{ trans('validation.attributes.name') }}:</a> {{ ucfirst($entity->medicine_name) }}</h3>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-circle-o bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">{{ trans('validation.attributes.brand') }}:</a> {{ ucfirst($entity->brand->name) }}</h3>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-circle-o bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">{{ trans('validation.attributes.generic') }}:</a>
                                <a href="{{ route('search.generic',['id' => $entity->generic->id]) }}">
                                    {{ ucfirst($entity->generic->name) }}
                                </a>
                            </h3>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-circle-o bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">{{ trans('validation.attributes.diseases') }}</a> </h3>
                            <div class="timeline-body">
                                <ul>
                                @foreach($entity->sub_diseases as $key => $disease)
                                    <a href="{{ route('search.diseases',['id' => $disease->id]) }}">
                                        <li>{{ ucfirst($disease->name) }}</li>
                                    </a>
                                @endforeach
                                </ul>
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