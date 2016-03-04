<h3>from product.index</h3>

    <table>
        <thead>
            <th>Id</th>
            <th>Title</th>
            <th>Caption</th>
            <th>Price</th>
            <th>Category</th>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->productTitle }}</td>
                <td>{{ $product->productCaption }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category }}</td>
                <td><a href="{{ route('product.show' , $product->id) }}">show</a> </td>
            </tr>
        @endforeach
        </tbody>
    </table>
