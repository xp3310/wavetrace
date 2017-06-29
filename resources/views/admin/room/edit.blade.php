<?php
    $myFormLib = new App\Mylib\MyForm('form');
?>

@extends('admin.layouts.main')

@section('content')

<div class='content'>
	<div class="content-header">
    	<h3><b>{{ isset($room) ? $product->title : __('room.create') }}</b></h3>
	</div>
	<div class="content-body">
	    <el-card class="box-card">
	        <div slot="header" class="clearfix">
	            <span>@lang('admin.siteInfo')</span>
	        </div>
		{!! $myFormLib->elFormOpen() !!}

            {!! $myFormLib->getElItem( 'text', ['name' => 'title', 			'label' => trans('room.title')		 ] ) !!}
            {!! $myFormLib->getElItem( 'text', ['name' => 'description', 	'label' => trans('admin.introduction')] ) !!}
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
        form: {},
        loading: false,
    },
    customVueMethod = {
        onMyFormSubmit() {

        },

        onMyFormCancel() {
            window.location.reload();
        },


        onAddcontactInfo() {
            this.form.contactInfo.push( {'label': '', 'value': ''} )
        }
    };


    bnb.vue.setData(customVueData);
    bnb.vue.setMethod(customVueMethod);

</script>
@endsection