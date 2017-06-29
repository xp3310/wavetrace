<?php
    $myFormLib = new App\Mylib\MyForm('form');
?>

@extends('admin.layouts.main')

@section('content')

<div class='content'>
    <div class="content-body">
        <el-card class="box-card">
            <div slot="header" class="clearfix">
                <span>{{ isset($room) ? $product->title : trans('room.create') }}</span>
            </div>
            {!! $myFormLib->elFormOpen() !!}

            {!! $myFormLib->getElItem( 'text', 	   ['name' => 'title',       'label' => trans('room.title')		 ] ) !!}
            {!! $myFormLib->getElItem( 'textarea', ['name' => 'description', 'label' => trans('m.introduction')] ) !!}
            {!! $myFormLib->getElItem( 'number', ['name' => 'max_capacity',  'label' => trans('room.maxCnt'), 'min' => 0 ] ) !!}
            {!! $myFormLib->getElItem( 'number', ['name' => 'price', 		 'label' => trans('room.weekdayPrice'), 'min' => 0 ] ) !!}
            {!! $myFormLib->getElItem( 'number', ['name' => 'holiday_price', 'label' => trans('room.holidayPrice'), 'min' => 0 ] ) !!}
            {!! $myFormLib->getElItem( 'buttons', ['label' => '', 'buttons' => ['submit' => ['buttonTittle' => trans('common.save'), 'buttonType' => 'primary', 'callback' => 'onMyFormSubmit'],
                                                                                'cancal' => ['buttonTittle' => trans('common.cancel'), 'callback' => 'onMyFormCancel'] ] ]  ) !!}
        {!! $myFormLib->elFormClose() !!}
        </el-card>
    </div>
</div>
@endsection


@section('vueCustomParam')
<script>
    var customVueData = {
        form: {
            max_capacity  : {{ isset($room) ? $room->max_capacity  : 0 }},
            price         : {{ isset($product) ? $product->price   : 0 }},
            holiday_price : {{ isset($room) ? $room->holiday_price : 0 }},
        },
        loading: false,
    },
    customVueMethod = {
        onMyFormSubmit() {

        },

        onMyFormCancel() {
            window.history.back();
        },


        onAddcontactInfo() {
            this.form.contactInfo.push( {'label': '', 'value': ''} )
        }
    };


    bnb.vue.setData(customVueData);
    bnb.vue.setMethod(customVueMethod);

</script>
@endsection