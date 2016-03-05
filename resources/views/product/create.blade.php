<h4>Create</h4>
<form id="form-create" name="form-create" enctype="multipart/form-data"
      class="form-group" action="{{ route('product.store') }}" method="post">
    <input name="productTitle" class="form-control"
           type="text" placeholder="Product Title"/>
    <textarea class="form-control" name="productCaption"
              id="productCaption" cols="30"
              rows="10" placeholder="Type some caption"></textarea>
    <input name="price" class="form-control"
           type="number" placeholder="Price"/>
    <input name="category" class="form-control"
           type="text" placeholder="Category"/>
    <input name="image" type="file"/>
    <button class="btn btn-success" type="submit">Submit</button>
    {!! Form::token() !!}
</form>



{{--<h4>Create</h4>--}}

{{--{!! Form::model($product, [--}}
        {{--'method' => 'post',--}}
        {{--'route' => [--}}
        {{--'product.store',--}}
        {{--$product--}}
    {{--]--}}
    {{--]) !!}--}}

{{--{!! Form::text('productTitle', null ,[--}}
        {{--'placeholder' => 'Product Title',--}}
        {{--'class' => 'form-control',--}}
    {{--]) !!}--}}
{{--{!! Form::textarea('productCaption', null,[--}}
        {{--'placeholder' => 'Product Caption',--}}
        {{--'class' => 'form-control'--}}
    {{--]) !!}--}}
{{--{!! Form::text('productTitle', null ,[--}}
        {{--'placeholder' => 'Product Title',--}}
        {{--'class' => 'form-control'--}}
    {{--]) !!}--}}
{{--{!! Form::number('price', null,[--}}
        {{--'placeholder' => 'Price',--}}
        {{--'class' => 'form-control'--}}
    {{--]) !!}--}}
{{--{!! Form::text('category', null ,[--}}
        {{--'placeholder' => 'category',--}}
        {{--'class' => 'form-control'--}}
    {{--]) !!}--}}

{{--{!! Form::file('image') !!}--}}

{{--{!! Form::submit('Submit', [--}}
    {{--'class' => 'btn btn-success'--}}
{{--]) !!}--}}

{{--{!! Form::token() !!}--}}

{{--{!! Form::close() !!}--}}

