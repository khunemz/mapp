<h4>Create</h4>
<form id="form-create" name="form-create"
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
    <input type="hidden" value="{{ Session::token() }}" name="_token"/>
    <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
</form>