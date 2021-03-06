
<h3>Edit 2</h3>

{!! Form::model($product, [
'method' => 'patch',
'enctype' => 'multipart/form-data',
'route' => ['product.update', $product->id]
]) !!}

    {!! Form::text('productTitle', $product->productTitle ,[
            'placeholder' => 'Product Title',
            'class' => 'form-control'
        ]) !!}
    {!! Form::textarea('productCaption', $product->productCaption ,[
        'placeholder' => 'Product Caption',
        'class' => 'form-control'
        ]) !!}
    {!! Form::text('productTitle', $product->productTitle ,[
        'placeholder' => 'Product Title',
        'class' => 'form-control'
        ]) !!}
    {!! Form::number('price', $product->price ,[
        'placeholder' => 'Price',
        'class' => 'form-control'
        ]) !!}
    {!! Form::text('category', $product->category ,[
        'placeholder' => 'category',
        'class' => 'form-control'
        ]) !!}

    @foreach($product->images as $image)
        <p>ID {{ $image->id }}</p>
        {!! Form::file('image[]', [
            'multiple' => 'true'
        ]) !!}

    @endforeach

    {!! Form::submit('Submit', [
        'class' => 'btn btn-success'
    ]) !!}

    {!! Form::token() !!}

{!! Form::close() !!}




