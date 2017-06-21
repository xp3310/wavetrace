<?php
namespace App\Mylib;
class MyForm {
    public function getForm($formData) {

        $fieldHtml = [];
        foreach($formData['field'] as $fieldName => $field) {
            $fieldHtml[ $fieldName ] ="
                <el-form-item class='formItem' label='{$field['label']}'>" .
                    call_user_func( array($this, "{$field['type']}"), $field ) . "
                </el-form-item>
                ";
        }
        $fieldHtml = implode('', $fieldHtml);

        $formJs = $this->formjs($formData);
        $ret = "<el-form id='{$formData['id']}' ref='myForm' :model='myForm' label-width='80px' v-loading.body='loading'>
                    {$fieldHtml}

                <script>
                    {$formJs}
                </script>
               ";

        return $ret;
    }


    private function text($field) {
        $default = ['placeholder' => ''];
        $field = array_merge($default, $field);
        return "<el-input placeholder='{$field['placeholder']}' v-model='formData.{$field['name']}'></el-input>";
    }

    private function textPair($field) {
        $default = ['addEnable' => TRUE,
                    'labelInputDisable' => FALSE,
                    'labelPlaceholder' => '',
                    'contentPlaceholder' => ''];

        $field = array_merge($default, $field);

        $addBtn = $field['addEnable'] ? "<div class='text-center'>
                                                <i class='el-icon-plus iconBtn' @click='onAdd{$field['name']}Info'></i>
                                            </div>"
                                      : '';

        $labelInputDisable = $field['labelInputDisable'] ? ":disabled='true'" : '';
        return "<div class='inputGroupItem clearfix' v-for='(element, key) in formData.{$field['name']}'>
                    <el-col :span='3'>
                        <el-input v-model='formData.{$field['name']}[key].label' {$labelInputDisable} placeholder='{$field['labelPlaceholder']}'>
                        </el-input>
                    </el-col>
                    <el-col :span='1'>
                        &nbsp;
                    </el-col>
                    <el-col :span='15'>
                        <el-input v-model='formData.contactInfo[key].value' placeholder='{$field['contentPlaceholder']}'>
                        </el-input>
                    </el-col>
                </div>
                {$addBtn}
                ";
    }

    private function formJs($myForm) {

        $fieldKeyVal = [];
        foreach ($myForm['field'] as $k => $v) {
            $fieldKeyVal[$k] = $v['value'];
        }

        $fieldKeyVal = json_encode($fieldKeyVal);

        $js = <<<JAVASCRIPT
            (function(){
            var vm = new Vue({
                    el: "#{$myForm['id']}",
                    data: {
                        formData: {$fieldKeyVal},


                        loading: false

                    },
                    methods:{
                        onSubmit() {
                            this.loading = true;
                            this.$http.post("{$myForm['submitUrl']}", this.formData ).then( function(obj) {

                                this.loading = false;
                                this.$message({message: json.msg,
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


                        onAddTextPairInfo($fieldName) {
                            this.formData.{$fieldName}.push( {'label': '', 'value': ''} )
                        },

                        validFunc(field) {
                            this.$http.post("{$myForm['validUrl']}", this.formData ).then( function(obj) {

                                // this.loading = false;
                                this.$message({message: "{{ trans('common.saveSuccess') }}",
                                               type: 'success'});
                            }, function(e){
                                this.$message({message: json.msg,
                                           type: 'error',
                                           showClose: true,
                                           duration:0});
                            });
                        }
                    }
                });

            })();
JAVASCRIPT
;


        return $js;
    }


}



