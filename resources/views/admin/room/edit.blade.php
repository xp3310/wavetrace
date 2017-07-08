<?php
    $form = new App\Mylib\MyForm('form');
?>

@extends('admin.layouts.main')

@section('content')
<div class='content'>
<div id="form" class="content-body">
    <el-card class="box-card">
        <div slot="header" class="clearfix">
            <span>{{ isset($room) ? $product->title : trans('room.create') }}</span>
        </div>
        {!! $form->elFormOpen() !!}

            @if( isset($room) )
                <input type="hidden" name="roomId" value="{{$room->id}}">
            @endif

            {!! $form->elItem('text',     ['name' => 'title',        'value' => isset($product) ? $product->title : '',
            'label' => trans('room.title'), 'rule' => ['required' => true] ] ) !!}

            {!! $form->elItem('textarea', ['name' => 'description',  'value' => isset($product) ? $product->description : '',
            'label' => trans('m.introduction')] ) !!}
            {!! $form->elItem('number',   ['name' => 'max_capicity', 'value' => isset($room)    ? $room->max_capicity : '',
            'label' => trans('room.maxCnt'), 'min' => 0 ] ) !!}
            {!! $form->elItem('number',   ['name' => 'price', 		 'value' => isset($product) ? $product->price : '',
            'label' => trans('room.weekdayPrice'), 'min' => 0 ] ) !!}
            {!! $form->elItem('number',   ['name' => 'holiday_price','value' => isset($room)    ? $room->holiday_price : '',
            'label' => trans('room.holidayPrice'), 'min' => 0 ] ) !!}

            {!! $form->elItem( 'defaultFormBtns', ['label' => ''] ) !!}

        {!! $form->elFormClose() !!}
    </el-card>
</div>
</div>

<script>
    var fieldData = {!! json_encode($form->getFormData()) !!};

    form.init(fieldData, '{{ $form->getModelName() }}', "{{ route('admin.room.store') }}");
    form.run();
</script>
@endsection


