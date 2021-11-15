<x-app-layout>
<div class="container mb-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-success">All Product Add</h2>
           <form action="{{ url('/insert/product') }}" method="post" enctype="multipart/form-data">
          @csrf
          <label for="">Category Name</label>
          <select class="form-control" name="category_id" id="">
            <option value="">--Select--</option>
            @foreach ($all_category as $category)
              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
          </select>
          <label for="">Product Name</label>
          <input value="{{ old('product_name') }}" name="product_name" type="text" class="form-control @error('product_name')is-invalid @enderror" placeholder="Product Name">
          @error('product_name')
            <p class="text-danger">{{ $message }}</p>  
          @enderror
          <label for="">Product Price</label>
          <input name="product_price" type="text" class="form-control @error('product_price')is-invalid @enderror" placeholder="Product Price">
          @error('product_price')
            <p class="text-danger">{{ $message }}</p>  
          @enderror
          <label for="">Product Quantity</label>
          <input name="product_quantity" type="text" class="form-control @error('product_quantity')is-invalid @enderror" placeholder="Product Quantity">
          @error('product_quantity')
            <p class="text-danger">{{ $message }}</p>  
          @enderror
          <label for="">Quantity Alerts</label>
          <input name="quantity_alerts" type="text" class="form-control @error('quantity_alerts')is-invalid @enderror" placeholder="Quantity Alerts">
          @error('quantity_alerts')
            <p class="text-danger">{{ $message }}</p>  
          @enderror
          <label for="">Product Details</label>
          <textarea class="form-control @error('product_details')is-invalid @enderror" name="product_details" id="" cols="30" rows="10">

          </textarea>
          @error('product_details')
            <p class="text-danger">{{ $message }}</p>  
          @enderror
          <label for="">Product Image</label>
          <input type="file" class="form-control" name="product_image" >
          <input type="submit" class="form-control btn btn-success" value="submit">
        </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-success">All Product Tables</h2>
           <table class="table table-success">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category Name</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Quantity</th>
      <th scope="col">Quantity Alerts</th>
      <th scope="col">Product Details</th>
      <th scope="col">Product Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($all_product as $product)
    <tr>
      <td>{{ $loop->index+1 }}</td>
      <td>{{ App\Models\CategoryModel::find($product->category_id)->category_name }}</td>
      <td>{{ $product->product_name }}</td>
      <td>{{ $product->product_price }}</td>
      <td>{{ $product->product_quantity }}</td>
      <td>{{ $product->quantity_alerts }}</td>
      <td>
          <p style="width: 100px; height: 90px; overflow:scroll;">{{ $product->product_details }}</p>
      </td>
      <td>
          <img src="{{ asset('product_image/'.$product->product_image) }}" alt="" style="width:100px;height:70px;">
      </td>
      <td>
       <div class="btn-group" role="group" aria-label="Basic example">
  <a href="{{ url('/delete') }}/{{ $product->id }}" type="button" class="btn btn-danger">Delete</a>
  <a href="{{ url('/edit') }}/{{ $product->id }}" type="button" class="btn btn-secondary">Edit</a>
</div>
      </td>
    </tr>
    @empty
    <tr>
        <td colspan="8" class="text-center text-danger">No Product Available</td>
    </tr>
    @endforelse
  </tbody>
</table>
{{ $all_product->links() }}
        </div>
    </div>
</div>
</x-app-layout>