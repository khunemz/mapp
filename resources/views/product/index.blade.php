<h3>from product.index</h3>
<button class="btn btn-info"><a href="{{ route('product.create') }}">Create</a></button>
    <table>
        <thead>
            <th>Id</th>
            <th>Title</th>
            <th>Caption</th>
            <th>Price</th>
            <th>Category</th>
            <th>Images</th>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->productTitle }}</td>
                <td>{{ $product->productCaption }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category }}</td>
                <td>
                @foreach($product->images as $image)
                    {{ $image->id }}
                @endforeach
                </td>
                <td><a href="{{ route('product.show' , $product->id) }}">show</a> </td>
            </tr>
        @endforeach
        </tbody>
    </table>

