@extends('admin.admin_template')


@section('title')
    mediaItemEdit
@endsection






@section('pageContent')

        <div id="main">
            <el-button @click="goBack" type="text" icon="arrow-left">Previous Page</el-button>

            <div class="adminMediaEdit">
                <el-form ref="form" :model="form" label-width="80px">
                    <el-form-item label="標題">
                        <el-input v-model="form.title"></el-input>
                    </el-form-item>
                    <el-form-item label="描述">
                        <el-input type="textarea" v-model="form.description"></el-input>
                    </el-form-item>
                    <el-form-item>
                        <el-button type="primary" @click="onSubmit" :loading="false">確定</el-button>
                        <el-button @click="onCancel">取消</el-button>
                    </el-form-item>
                </el-form>
            </div>
        </div>


    <script>
        var vm = new Vue({
            el: "#main",
            data: {
                form: {
                  title: '{{ $mediaItem->title }}',
                  description: '{{ $mediaItem->description }}'
                },
                loading: false
            },
            methods:{
                onSubmit() {
                    this.loading = true;
                    this.$http.put('{{ $updateUrl }}', this.form, { headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' } }).then(ret => ret.json()).then(json => {
                        this.loading = false;

                        if (json.status != 'true') {
                            this.$message({message: json.msg,
                                           type: 'error',
                                           showClose: true,
                                           duration:0});
                            return;
                        }


                        this.$message({message: 'success',
                                       type: 'success'});
                    })
                },
                onCancel() {
                    this.goBack();
                },
                goBack() {
                    window.location.href="{{ $redirUrl }}";
                }

            }
        });


    </script>
@endsection

