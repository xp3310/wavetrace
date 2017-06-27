@extends('admin.layouts.main')

@section('content')
<div class='content'>
	<div class="content-header">
    	<span class="pull-right"><el-button size="small"><i class="fa fa-plus"></i> {{ trans('room.create') }}</el-button></span>
    	<h3><b>{{ trans('room.typeMgr') }}</b></h3>
	</div>
	<div class="content-body">
		<div class="roomList ">
			<ul class="list-group">
	          	@foreach ($rooms as $pId=>$v)
	          	 <li class="list-group-item">
					<div class="media block">
						<div class="media-left">
							<img src="dist/img/default-50x50.gif" alt="Room Image">
						</div>
						<div class="media-body">
							<h4 class="media-heading">
								<b><a href="#"></a>{{ $products[$pId]->title }}</b>
								<!-- <el-button size="mini" icon="edit"></el-button> -->
							</h4>
							<span class="labels pull-right">
								<el-tag type="primary">{{ trans('admin.weekday') }} ${{ $products[$pId]->price }}</el-tag>
								<el-tag type="gray">{{ trans('admin.holiday') }} ${{ $rooms[$pId]->holiday_price }}</el-tag>
							</span>
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

