@extends('admin.layouts.main')

@section('content')
<div id='content'>
	<div class="content-header">
    	<span class="pull-right"><a href="{{ route('admin.product.create') }}"><el-button size="small"><i class="fa fa-plus"></i> {{ trans('product.create') }}</el-button></span>
    	<h3><b>{{ trans('product.mgr') }}</b></h3>
	</div>
	<div class="content-body">
		<div class="productList ">
			<ul class="list-group">
	          	@foreach ($products as $pId=>$v)
	          	 <li class="list-group-item">
                 <el-row :gutter="12">
					<div class="media block">
                        <el-col :span="3">
						<div class="media-left">
                            @if ( $v->media_id != 0 )
    							<img style="width: 80px;" src="{{ $items[$v->media_id] }}" alt="Goods">
                            @else
                                <el-button list-type="picture-card"><i style="width: 50px;" class="el-icon-plus"></i></el-button>
                            @endif

						</div>
                        </el-col>
                        <el-col :span="9">
						<div class="media-body">
							<h4 class="media-heading">
								<a href="{{ route('admin.product.edit', $pId) }}"><b>{{ $products[$pId]->title }}</b></a>
								<!-- <el-button size="mini" icon="edit"></el-button> -->
							</h4>
							<div class="product-description">
						    	{{ $products[$pId]->description }}
						    </div>
						</div>
                        </el-col>
					</div>
                </el-row>
				</li>
	          	@endforeach
			</ul>
		</div>
	</div>
</div>
<script>
(function(){
    bnb.vue.run('#content')
;})();
</script>
@endsection