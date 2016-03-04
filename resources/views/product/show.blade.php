<h4>{{ $product->id }}</h4>
<h4>{{ $product->productTitle }}</h4>
<h4>{{ $product->productCaption }}</h4>
<h4>{{ $product->price }}</h4>

<a href="{{ route('product.create') }}">Create</a>
<a href="{{ route('product.edit', ['product' => $product->id]) }}">Edit</a>
<form action="{{ route('product.destroy',
    ['product' =>$product->id])  }}" method="delete">
    <button type="submit">Delete</button>
</form>

