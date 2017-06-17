@extends('admin.layouts.main')

@section('content')

<div id='siteInfo' class='clearfix'>
    <el-card class="box-card" v-loading.body="loading">
        <div slot="header" class="clearfix">
            <span>{{ trans('admin.siteInfo') }}</span>
        </div>
        <el-form ref="form" :model="form" label-width="80px">
            <el-form-item label="{{ trans('admin.siteName') }}">
                <el-input v-model="form.siteName"></el-input>
            </el-form-item>
            <el-form-item label="{{ trans('admin.copyright') }}">
                <el-input v-model="form.copyright">{{ $sysConfig['copyright'] }}</el-input>
            </el-form-item>


            <el-form-item>
                <el-button type="primary" @click="onSubmit">{{ trans('common.save') }}</el-button>
                <el-button @click="onCancel">{{ trans('common.cancel') }}</el-button>
            </el-form-item>
        </el-form>
    </el-card>
</div>


<script>

    (function(){

        var vm = new Vue({
                    el: "#siteInfo",
                    data: {
                        form: {
                            siteName: "{{ $sysConfig['siteName'] }}",
                            copyright: "{{ $sysConfig['copyright'] }}"
                        },
                        loading: false
                    },
                    methods:{
                        onSubmit() {
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

                        onCancel() {
                            window.location.reload();
                        }
                    }
                });

    })();


    </script>
@endsection

