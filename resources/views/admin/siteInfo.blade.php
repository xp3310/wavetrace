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

            {!! $myFormLib->getElItem( 'text', 'siteName', $sysConfig['siteName'], ['label' => trans('admin.siteName'), 'placeholder' => ''] ) !!}
            {!! $myFormLib->getElItem( 'text', ['label' => trans('admin.copyright'), 'placeholder' => '', 'name' => 'copyright'] ) !!}
            {!! $myFormLib->getElItem( 'textPair', ['label' => trans('admin.contactInfo'), 'name' => 'contactInfo'] ) !!}
            {!! $myFormLib->getElItem( 'textPair', ['label' => trans('admin.socialInfo'), 'name' => 'socialInfo', 'addEnable' => FALSE, 'labelInputDisable' => TRUE ]  ) !!}
            {!! $myFormLib->getElItem( 'buttons', ['label' => '', 'buttons' => ['submit' => ['buttonTittle' => trans('common.save'), 'buttonType' => 'primary', 'callback' => 'onMyFormSubmit'],
                                                                                'cancal' => ['buttonTittle' => trans('common.cancel'), 'callback' => 'onMyFormCancel'] ] ]  ) !!}

        {!! $myFormLib->elFormClose() !!}
    </el-card>
</div>

@endsection


@section('vueCustomParam')
<script>
    var customVueData = {
        form: {
            siteName: "{{ $sysConfig['siteName'] }}",
            copyright: "{{ $sysConfig['copyright'] }}",
            contactInfo:{!! json_encode($sysConfig['contactInfo']) !!},
            socialInfo:{!! json_encode($sysConfig['socialInfo']) !!}
        },
        loading: false,

    },
    customVueMethod = {
        onMyFormSubmit() {
            this.loading = true;
            this.$http.post('{{ $updateUrl }}', this.form ).then( function(obj) {

                this.loading = false;
                this.$message({message: "{{ trans('common.saveSuccess') }}",
                               type: 'success'});
            }, function(e){
                this.$message({message: json.msg,
                           type: 'error',
                           showClose: true,
                           duration:0});
            });
        },

        onMyFormCancel() {
            window.location.reload();
        },


        onAddContactInfo() {
            this.form.contactInfo.push( {'label': '', 'value': ''} )
        }
    };

</script>
@endsection

