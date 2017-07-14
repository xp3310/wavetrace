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
					<div class="media block">
						<div class="media-left">
							<img src="dist/img/default-50x50.gif" alt="Goods">
						</div>
						<div class="media-body">
							<h4 class="media-heading">
								<a href="{{ route('admin.product.edit', $pId) }}"><b>{{ $products[$pId]->title }}</b></a>
								<!-- <el-button size="mini" icon="edit"></el-button> -->
							</h4>
							<div class="product-description">
						    	{{ $products[$pId]->description }}
						    </div>
						</div>
					</div>
				</li>
	          	@endforeach
			</ul>
		</div>
	</div>
</div>
<script>
(function(){
    bnb.vue.run('#content');
})();
</script>
@endsection