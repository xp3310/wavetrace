@extends('admin.admin_template')


@section('title')
    mediaItemEdit
@endsection

@section('extJs')
      <script src="{{ asset('/js/Sortable.min.js') }}"></script>
      <script src="{{ asset('/js/vuedraggable.js') }}"></script>
@endsection





@section('pageContent')

        <div id='main'>
            <div class='adminMediaEdit'>

                <el-form ref="form" :model="form" label-width="80px">
                    <el-form-item label="標題">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                    <el-form-item label="描述">
                        <el-input type="textarea" v-model="form.desc"></el-input>
                    </el-form-item
                    <el-form-item>
                        <el-button type="primary" @click="onSubmit">確定</el-button>
                        <el-button>取消</el-button>
                    </el-form-item>
                </el-form>
            </div>
        </div>


    <script>
        var vm = new Vue({
            el: "#main",
            data: {
                form: {
                  name: '',
                  desc: ''
                }
            },
            methods:{
                onSubmit() {
                    console.log(this.form);
                }
            }
        });


    </script>
@endsection

