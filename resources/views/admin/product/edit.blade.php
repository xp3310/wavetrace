<?php
    $form = new App\Mylib\MyForm('form');
?>

@extends('admin.layouts.main')

@section('content')
<div class='content'>
<div id="form" class="content-body">
    <el-card class="box-card">
        <div slot="header" class="clearfix">
            <span>{{ isset($product) ? $product->title : trans('product.create') }}</span>
        </div>
        {!! $form->elFormOpen() !!}

            @if( isset($product) )
                <input type="hidden" name="id" value="{{$product->id}}">
            @endif

            {!! $form->elItem('text',     ['name' => 'title',        'value' => isset($product) ? $product->title : '',
            'label' => trans('product.title'), 'rule' => ['required' => true] ] ) !!}

            {!! $form->elItem('textarea', ['name' => 'description',  'value' => isset($product) ? $product->description : '',
            'label' => trans('m.introduction')] ) !!}
            {!! $form->elItem('number',   ['name' => 'max_capicity', 'value' => 0, 'label' => trans('product.number'), 'min' => 0 ] ) !!}
            {!! $form->elItem('number',   ['name' => 'price', 		 'value' => isset($product) ? $product->price : '',
            'label' => trans('m.price'), 'min' => 0 ] ) !!}

            {!! $form->elItem( 'defaultFormBtns', ['label' => ''] ) !!}

        {!! $form->elFormClose() !!}
    </el-card>
</div>
</div>

<script>
    var fieldData = {!! json_encode($form->getFormData()) !!};

    form.init(fieldData, '{{ $form->getModelName() }}', "{{ route('admin.product.store') }}");
    form.run();
</script>
@endsection


