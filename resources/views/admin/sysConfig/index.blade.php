<?php
    $myFormLib = new App\Mylib\MyForm('form');
?>

@extends('admin.layouts.main')

@section('content')

<div id='siteInfo' class='clearfix'>
    <el-card class="box-card" v-loading.body="loading">
        <div slot="header" class="clearfix">
            <span>{{ trans('admin.siteInfo') }}</span>
        </div>
        {!! $myFormLib->elFormOpen() !!}

            {!! $myFormLib->elItem( 'text', ['name' => 'siteName', 'value' => $sysConfig['siteName'], 'label' => trans('admin.siteName'), 'placeholder' => ''] ) !!}
            {!! $myFormLib->elItem( 'text', ['name' => 'copyright', 'value' => $sysConfig['copyright'], 'label' => trans('admin.copyright'), 'placeholder' => ''] ) !!}
            {!! $myFormLib->elItem( 'textPair', ['name' => 'contactInfo', 'value' => $sysConfig['contactInfo'], 'label' => trans('admin.contactInfo')] ) !!}
            {!! $myFormLib->elItem( 'textPair', ['name' => 'socialInfo', 'value' => $sysConfig['socialInfo'], 'label' => trans('admin.socialInfo'), 'addEnable' => FALSE, 'labelInputDisable' => TRUE ]  ) !!}
            {!! $myFormLib->elItem( 'defaultFormBtns', ['label' => ''] ) !!}

        {!! $myFormLib->elFormClose() !!}
    </el-card>
</div>

@endsection


@section('vueCustomParam')
<script>
    var fieldData = {!! json_encode($myFormLib->getFormData()) !!};
    bnb.form.init(fieldData, '{{ $myFormLib->getModelName() }}', '{{ $updateUrl }}');
    bnb.form.run();
</script>
@endsection

