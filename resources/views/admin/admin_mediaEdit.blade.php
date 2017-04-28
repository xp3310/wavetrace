<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <style>
            [v-cloak] {
                display: block;
            }
        </style>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>mediaEdit</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.6 -->

      <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">

      <link rel="stylesheet" href="{{ asset('/css/element-ui/index.css') }}">


      <script src="{{ asset('/js/app.js') }}"></script>

      <script src="{{ asset('/js/Sortable.min.js') }}"></script>
      <script src="{{ asset('/js/vuedraggable.js') }}"></script>

      <script src="{{ asset('/js/vue-resource.min.js') }}"></script>

    </head>

    <body>
        <div id='app'>
            <div id='main'>
                <div class='adminMediaEdit'>
                    <!-- <form action="{{ action('MediaController@upload', ['id' => $mediaId]) }}" method="post" enctype="multipart/form-data">
                        Select image to upload:
                        <input type="file" name="media[]" id="fileToUpload" multiple>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" value="Upload Image" name="submit">
                    </form> -->

                    <el-upload
                        class="upload-demo"
                        action="{{ action('MediaController@upload', ['id' => $mediaId]) }}"
                        :data="uploadArg"
                        :name="uploadName"
                        :multiple="true"
                        :on-preview="handlePreview"
                        :on-remove="handleRemove"
                        :file-list="fileList">
                        <el-button size="small" type="primary">点击上传</el-button>
                        <div slot="tip" class="el-upload__tip">只能上传jpg/png文件，且不超过500kb</div>
                    </el-upload>



                    <div>
                        <draggable class='gridArea'  v-model="myArray" :move="getdata" @update="datadragEnd" >
                            <div :data-id="element.id" class='gridItem' v-for="(element, key) in myArray">
                                <span v-on:click='deleteItem(key, element.deleteUrl, element.id, $event)' :data-url="element.deleteUrl" class='deleteBtn'>
                                    <i class="el-icon-circle-cross"></i>
                                </span>
                                <img :src="element.src" />
                            </div>
                        </draggable>
                    </div>
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
                            datadragEnd:function(evt){
                                // console.log(evt.oldIndex);
                                var newId = this.myArray[evt.newIndex].id,
                                    preIdx = evt.newIndex-1,
                                    preId = (typeof this.myArray[preIdx]) == 'undefined' ? 0 : this.myArray[preIdx].id;



                                this.$http.post('{{ action('MediaItemController@move') }}', { _token:'{{ csrf_token() }}', itemId: newId, afterId: preId}).then(function(obj){

                                }, function(){
                                    alert('somethimg wrong');
                                });
                            },

                            getdata: function(evt){
                                console.log(evt);
                            },

                            deleteItem: function(key, deleteUrl, id, evt){
                                this.$http.delete(deleteUrl, {_token:'{{ csrf_token() }}'}).then(function(ret){
console.log(ret.json());
                                // this.$delete(element);
                                this.myArray.splice(key, 1);
                                });
                            },

                            handleRemove(file, fileList) {
                                console.log(file, fileList);
                              },
                              handlePreview(file) {
                                console.log(file);
                              }
                        }
                    });

        })();


    </script>
    </body>
</html>
