@extends('admin.layouts.main')

@section('content')
<div id='content'>
	<div class="content-header">
    	<span class="pull-right"><a href="{{ route('admin.room.create') }}"><el-button size="small"><i class="fa fa-plus"></i> {{ trans('room.create') }}</el-button></a></span>
    	<h3><b>{{ trans('room.typeMgr') }}</b></h3>
	</div>
	<div class="content-body">
		<div class="roomList ">
			<ul class="list-group">
	          	@foreach ($rooms as $pId=>$v)
	          	 <li class="list-group-item">
					<div class="media block">
						<div class="media-left">
						</div>
						<div class="media-body">
							<h4 class="media-heading">
								<b><a href="{{ route('admin.room.edit', $rooms[$pId]->id) }}">{{ $products[$pId]->title }}</a></b>
							</h4>
							<span class="labels pull-right">
								<el-tag type="primary">{{ trans('m.weekday') }} ${{ $products[$pId]->price }}</el-tag>
								<el-tag type="gray">{{ trans('m.holiday') }} ${{ $rooms[$pId]->holiday_price }}</el-tag>
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
<script>
(function(){
	bnb.vue.run('#content');
})();
</script>
@endsection


