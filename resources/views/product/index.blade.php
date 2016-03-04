<h3>from product.index</h3>
@foreach($products as $product)
    <p>{{ $product->id }}</p>
    <p>{{ $product->price }}</p>
@endforeach