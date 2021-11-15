<x-app-layout>
    <div class="container mb-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-success">Product Edit</h2>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/add/product') }}">Add Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Edit</li>
            </ol>
            </nav>
           <form action="{{ url('/edit/product') }}" method="post" enctype="multipart/form-data">
          @csrf
          <label for="">Category Name</label>
          <select class="form-control" name="category_id" id="">
            <option value="">--Select--</option>
            @foreach ($all_category as $category)
              <option value="{{ $category->id }}"{{ ($category->id== $product_edit->category_id)? 'selected' : ''; }}>{{ $category->category_name }}</option>
            @endforeach
          </select>
          
          <input value="{{ $product_edit->id }}" type="hidden" name="product_id">
          <label for="">Product Name</label>
          <input value="{{ $product_edit->product_name }}" name="product_name" type="text" class="form-control @error('product_name')is-invalid @enderror" placeholder="Product Name">
          @error('product_name')
            <p class="text-danger">{{ $message }}</p>  
          @enderror
          <label for="">Product Price</label>
          <input value="{{ $product_edit->product_price }}" name="product_price" type="text" class="form-control @error('product_price')is-invalid @enderror" placeholder="Product Price">
          @error('product_price')
            <p class="text-danger">{{ $message }}</p>  
          @enderror
          <label for="">Product Quantity</label>
          <input value="{{ $product_edit->product_quantity }}" name="product_quantity" type="text" class="form-control @error('product_quantity')is-invalid @enderror" placeholder="Product Quantity">
          @error('product_quantity')
            <p class="text-danger">{{ $message }}</p>  
          @enderror
          <label for="">Quantity Alerts</label>
          <input value="{{ $product_edit->quantity_alerts }}" name="quantity_alerts" type="text" class="form-control @error('quantity_alerts')is-invalid @enderror" placeholder="Quantity Alerts">
          @error('quantity_alerts')
            <p class="text-danger">{{ $message }}</p>  
          @enderror
          <label for="">Product Details</label>
          <textarea class="form-control @error('product_details')is-invalid @enderror" name="product_details" id="" cols="30" rows="10">
            {{ $product_edit->product_details }}
          </textarea>
          @error('product_details')
            <p class="text-danger">{{ $message }}</p>  
          @enderror
          <label for="">Product Image</label>
          <input value="{{ $product_edit->product_image }}" type="file" class="form-control" name="product_image" >
          <input type="submit" class="form-control btn btn-success" value="submit">
        </form>
        </div>
    </div>
</div>
</x-app-layout>