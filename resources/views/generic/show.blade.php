<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">View All Medicine</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>{{ trans('validation.attributes.medicine') }}</th>
                            <th>{{ trans('validation.attributes.brand') }}</th>
                            <th>{{ trans('validation.attributes.generic') }}</th>
                            <th style="width: 40px">Details</th>
                        </tr>
                    @foreach($products as $key => $product)
                        <tr>
                            <td>{{ ucfirst($product->name) }}</td>
                            <td>{{ ucfirst($product->brand->name) }}</td>
                            <td>{{ ucfirst($product->generic->name) }}</td>
                            <td><a href="{{ route('search.index', ['type' => 'medicine', 'id' => $product->id]) }}"><span class="badge bg-blue">View</span></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>