<h4>Product id {{ $product->id }}</h4>
<h4>Title {{ $product->productTitle }}</h4>
<h4>Caption {{ $product->productCaption }}</h4>
<h4>Price {{ $product->price }}</h4>
@foreach($product->images as $image)
    <h4>Img id {{ $image->id }}</h4>
@endforeach
<a href="{{ route('product.create') }}">Create</a>
<a href="{{ route('product.edit', ['product' => $product->id]) }}">Edit</a>

<h4>Delete</h4>

{!! Form::model($product, [
            'method' => 'delete',
            'route' => ['product.destroy', $product->id ],
            'class' => 'form-control'
        ]) !!}
    {!! Form::submit('Delete' , ['class'=>'btn btn-danger']) !!}
    {!! Form::token() !!}
{!! Form::close() !!}

