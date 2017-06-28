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

            {!! $myFormLib->getElItem( 'text', ['name' => 'siteName', 'label' => trans('admin.siteName'), 'placeholder' => ''] ) !!}
            {!! $myFormLib->getElItem( 'text', ['name' => 'copyright', 'label' => trans('admin.copyright'), 'placeholder' => ''] ) !!}
            {!! $myFormLib->getElItem( 'textPair', ['name' => 'contactInfo', 'label' => trans('admin.contactInfo')] ) !!}
            {!! $myFormLib->getElItem( 'textPair', ['name' => 'socialInfo', 'label' => trans('admin.socialInfo'), 'addEnable' => FALSE, 'labelInputDisable' => TRUE ]  ) !!}
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
            this.$http.post('{{ $updateUrl }}', this.form, {'headers': {'X-CSRF-TOKEN': Laravel.csrfToken}} ).then( function(obj) {

                this.loading = false;
                this.$message({message: "{{ trans('common.saveSuccess') }}",
                               type: 'success'});
            }, function(e){
console.log(e);

            });
        },

        onMyFormCancel() {
            window.location.reload();
        },


        onAddcontactInfo() {
            this.form.contactInfo.push( {'label': '', 'value': ''} )
        }
    };

</script>
@endsection

