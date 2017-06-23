@extends('admin.layouts.main')

@section('content')

<section class="content">
	<header>
		<h3>{{ $room ? $room->title : trans('room.create') }}</h3>
	</header>
	<div class='row'>
	    <div class="box">
            <div class="box-header with-border">
				<h3 class="box-title">{{ trans('room.basic') }}</h3>
            </div>

            <div class="box-body">
				{{ Form::open(array('url' => '/admin/room/update')) }}


				{{ Form::close() }}
            </div>
      	</div>
	</div>
</section>

@endsection

