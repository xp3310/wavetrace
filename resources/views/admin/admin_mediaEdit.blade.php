@extends('admin.admin_template')


@section('title')
    mediaEdit
@endsection

@section('extJs')
      <script src="{{ asset('/js/Sortable.min.js') }}"></script>
      <script src="{{ asset('/js/vuedraggable.js') }}"></script>
@endsection





@section('pageContent')

        <div id='main'>
            <div class='adminMediaEdit'>

                <el-upload
                    class="upload-demo"
                    action="{{ action('MediaController@upload', ['id' => $mediaId]) }}"
                    :data="uploadArg"
                    :name="uploadName"
                    :multiple="true"
                    :on-preview="handlePreview"
                    :on-remove="handleRemove"
                    :on-success="handleSuccess"
                    :file-list="fileList">
                    <el-button size="small" type="primary">点击上传</el-button>
                    <div slot="tip" class="el-upload__tip">只能上传jpg/png文件，且不超过500kb</div>
                </el-upload>



                <div>
                    <draggable class='gridArea'  v-model="myArray" @update="datadragEnd" >
                        <div :data-id="element.id" class='gridItem' v-for="(element, key) in myArray">
                                <div class='controlPanel'>
                                    <i class="editBtn el-icon-edit" v-on:click='editItem(key, element.editUrl, element.id, $event)' :data-url="element.deleteUrl" ></i>
                                    <i class="deleteBtn el-icon-circle-cross" v-on:click='deleteItem(key, element.deleteUrl, element.id, $event)' :data-url="element.deleteUrl" ></i>
                                </div>
                            <img :src="element.src" />
                        </div>
                    </draggable>
                </div>
            </div>
        </div>


    <script>

        (function(){

            var vm = new Vue({
                        el: "#main",
                        data: {
                            myArray:{!! json_encode($ret, TRUE) !!},
                            fileList:[],
                            uploadArg:{_token:'{{ csrf_token() }}'},
                            uploadName: 'media[]'
                        },
                        methods:{
                            datadragEnd: function(evt) {

                                var newId = this.myArray[evt.newIndex].id,
                                    preIdx = evt.newIndex-1,
                                    preId = (typeof this.myArray[preIdx]) == 'undefined' ? 0 : this.myArray[preIdx].id;



                                this.$http.post('{{ action('MediaItemController@move') }}', { _token:'{{ csrf_token() }}', itemId: newId, afterId: preId}).then( function(obj) {

                                }, function(){
                                    alert('somethimg wrong');
                                });
                            },

                            deleteItem: function(key, deleteUrl, id, evt) {
                                this.$http.delete(deleteUrl, { headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' } }).then( function(ret) {
                                    this.myArray.splice(key, 1);
                                });
                            },
                            editItem: function(key, editUrl, id, evt) {
                                window.location.href=editUrl;
                            },

                            handleRemove: function(file, fileList) {
                                console.log(file, fileList);
                            },
                            handleSuccess: function(response, file, fileList) {

                                if (file.response.status == 'true') {
                                    window.location.reload();
                                }

                            }
                        }
                    });

        })();


    </script>
@endsection

