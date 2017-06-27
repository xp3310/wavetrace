@extends('admin.layouts.main')

@section('content')

<div id='siteInfo' class='clearfix'>
    <el-card class="box-card" v-loading.body="loading">
        <div slot="header" class="clearfix">
            <span>{{ trans('admin.siteInfo') }}</span>
        </div>
        <el-form ref="form" :model="form" label-width="80px">
            <el-form-item class='siteName formItem' label="{{ trans('admin.siteName') }}">
                <el-input v-model="form.siteName"></el-input>
            </el-form-item>
            <el-form-item class='copyright formItem' label="{{ trans('admin.copyright') }}">
                <el-input v-model="form.copyright">{{ $sysConfig['copyright'] }}</el-input>
            </el-form-item>

            <el-form-item class='contactInfo formItem clearfix' label="{{ trans('admin.contactInfo') }}">
                <div class='inputGroupItem clearfix' v-for="(element, key) in form.contactInfo">
                    <el-col :span="3">
                        <el-input v-model="form.contactInfo[key].label" placeholder="{{ trans('admin.contactLabel') }}">
                        </el-input>
                    </el-col>
                    <el-col :span="1">
                        &nbsp;
                    </el-col>
                    <el-col :span="15">
                        <el-input v-model="form.contactInfo[key].value" placeholder="{{ trans('admin.contactContent') }}">
                        </el-input>
                    </el-col>
                </div>
                <div class='text-center'>
                    <i class="el-icon-plus iconBtn" @click="onAddContactInfo"></i>
                </div>
            </el-form-item>

            <el-form-item class='socialInfo formItem' label="{{ trans('admin.socialInfo') }}">
                <div class='inputGroupItem clearfix' v-for="(element, key) in form.socialInfo">
                    <el-col :span="3">
                        @{{ element.label }}
                    </el-col>
                    <el-col :span="1">
                       &nbsp;
                    </el-col>
                    <el-col :span="15">
                        <el-input prop="url" v-model="form.socialInfo[key].value" placeholder="{{ trans('admin.socialUrl') }}">
                        </el-input>
                    </el-col>
                </div>
            </el-form-item>


            <el-form-item class='formItem'>
                <el-button type="primary" @click="onMyFormSubmit">{{ trans('common.save') }}</el-button>
                <el-button @click="onMyFormCancel">{{ trans('common.cancel') }}</el-button>
            </el-form-item>
        </el-form>
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

