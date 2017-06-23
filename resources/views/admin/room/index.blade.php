@extends('admin.layouts.main')

@section('content')
	<div class='row'>
	    <div class='col-md-6'>321</div>
	    <div class='col-md-6'>123
		    <!-- <div class="box box-primary">
	            <div class="box-header with-border">
					<h3 class="box-title">{{ trans('room.typeMgr') }}</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-default btn-xs" data-widget="create"><i class="fa fa-plus"></i> {{ trans('room.create') }}</button>
					</div>
	            </div>

	            <div class="box-body">
	              	<ul class="products-list product-list-in-box">
	              	@foreach ($rooms as $pId=>$v)
	              		<li class="item">
							<div class="product-img">
								<img src="dist/img/default-50x50.gif" alt="Room Image">
							</div>
							<div class="product-info">
								<a href="#" class="product-title">{{ $products[$pId]->title }}
							  	<span class="label label-warning pull-right">${{ $products[$pId]->price }}</span></a>
							    <span class="product-description">
							    	{{ $products[$pId]->description }}
							    </span>
							</div>
		                </li>
	              	@endforeach
	              	</ul>
	            </div> -->
          	</div>
	    </div>
	</div>
@endsection

