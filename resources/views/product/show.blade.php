<h4>{{ $product->id }}</h4>
<h4>{{ $product->productTitle }}</h4>
<h4>{{ $product->productCaption }}</h4>
<h4>{{ $product->price }}</h4>
<h4>{{ $product->id }} {{ $product->category }}</h4>

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

