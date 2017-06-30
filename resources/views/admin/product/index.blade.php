@extends('admin.layouts.main')

@section('content')
<div class='content'>
	<div class="content-header">
    	<span class="pull-right"><el-button size="small"><i class="fa fa-plus"></i> {{ trans('product.create') }}</el-button></span>
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
								<b><a href="#"></a>{{ $products[$pId]->title }}</b>
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
@endsection