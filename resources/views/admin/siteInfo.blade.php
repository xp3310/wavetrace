<?php
  $myFormLib = new App\Mylib\MyForm;
?>

@extends('admin.layouts.main')

@section('content')

<div id='siteInfo' class='clearfix'>
    <el-card id="{{ $myForm['id'] }}" class="box-card">
        <div slot="header" class="clearfix">
            <span>{{ trans('admin.siteInfo') }}</span>
        </div>
        {{ $myFormLib->getForm($myForm) }}
    </el-card>
</div>


    <script>

        (function(){
    // console.log({!! json_encode($myForm['field']) !!});
            var vm = new Vue({
                el: '#siteInfo'
            });

    </script>
@endsection

