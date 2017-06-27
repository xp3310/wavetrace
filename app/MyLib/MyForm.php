<?php
namespace App\Mylib;
class MyForm {
    private $formModel;

    public function __construct($formModel = '') {
        $this->formModel=$formModel;
    }


    public function elFormOpen($labelWidth='80px', $attr=array()) {
        $attrStr = [];
        foreach($attr as $k => $v) {
            $attrStr[] = "{$k} = '{$v}'";
        }

        $attrStr = implode(' ', $attrStr);

        return "<el-form ref='{$this->formModel}' :model='{$this->formModel}' label-width='{$labelWidth}' {$attrStr}>";
    }

    public function elFormClose() {
        return "</el-form>";
    }


    public function getElItem($type, $field) {

        return "
                <el-form-item label='{$field['label']}'>" .
                    call_user_func( array($this, "{$type}"), $field ) . "
                </el-form-item>
                ";
    }



    public function text($field) {
        $default = ['placeholder' => ''];
        $field = array_merge($default, $field);
        return "<el-input placeholder='{$field['placeholder']}' v-model='{$this->formModel}.{$field['name']}'></el-input>";
    }

    public function textPair($field) {
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
        return "<div class='inputGroupItem clearfix' v-for='(element, key) in form.{$field['name']}'>
                    <el-col :span='3'>
                        <el-input v-model='{$this->formModel}.{$field['name']}[key].label' {$labelInputDisable} placeholder='{$field['labelPlaceholder']}'>
                        </el-input>
                    </el-col>
                    <el-col :span='1'>
                        &nbsp;
                    </el-col>
                    <el-col :span='15'>
                        <el-input v-model='{$this->formModel}.contactInfo[key].value' placeholder='{$field['contentPlaceholder']}'>
                        </el-input>
                    </el-col>
                </div>
                {$addBtn}
                ";
    }

    public function buttons($field) {
        $btns = [];
        foreach ($field['buttons'] as $btn) {
            $default = ['buttonTittle' => '',
                        'buttonType' => ''];
            $btn = array_merge($default, $btn);
            $btns[] = $this->button($btn);
        }
        return implode('', $btns);
    }

    public function button($field) {

            $default = ['buttonTittle' => '',
                        'buttonType' => ''];
            $field = array_merge($default, $field);
            return "<el-button type='{$field['buttonType']}' @click='{$field['callback']}'>{$field['buttonTittle']}</el-button>";
    }

}



