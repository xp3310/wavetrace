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

            <el-form-item label="{{ trans('admin.contactInfo') }}">
                <div class='clearfix' v-for="(element, key) in form.contactInfo">
                    <el-col :span="2">
                        <el-input v-model="form.contactInfo[key].label">
                        </el-input>
                    </el-col>
                    <el-col :span="1">
                     :
                    </el-col>
                    <el-col :span="15">
                        <el-input v-model="form.contactInfo[key].value">
                        </el-input>
                    </el-col>
                </div>
                <div class='text-center'>
                    <i class="el-icon-plus iconBtn" @click="onAddContactInfo"></i>
                </div>
            </el-form-item>

            <el-form-item label="{{ trans('admin.socialInfo') }}">
                <div class='clearfix' v-for="(element, key) in form.socialInfo">
                    <el-col :span="2">
                        @{{ element.label }}
                    </el-col>
                    <el-col :span="1">
                     :
                    </el-col>
                    <el-col :span="15">
                        <el-input v-model="form.socialInfo[key].value">
                        </el-input>
                    </el-col>
                </div>
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
                            copyright: "{{ $sysConfig['copyright'] }}",
                            contactInfo:{!! json_encode($sysConfig['contactInfo']) !!},
                            socialInfo:{!! json_encode($sysConfig['socialInfo']) !!}
                        },
                        loading: false,

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
                        },


                        onAddContactInfo() {
                            this.form.contactInfo.push( {'label': '', 'value': ''} )
                        }
                    }
                });

    })();


    </script>
@endsection

