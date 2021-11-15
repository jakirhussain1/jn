<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-success">Add New Category</h2>
                <form action="{{ url('/insert/category') }}" method="post">
                @csrf
                <label for="">Category Name</label>
                <input name="category_name" type="text" placeholder="Category Name" class="form-control @error('category_name')is-invalid @enderror">
                @error('category_name')
                   <p class="text-danger">{{ $message }}</p> 
                @enderror
                <input type="submit" value="Submit" class="form-control btn btn-success">
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
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($all_category as $category)
    <tr>
      <td>{{ $loop->index+1 }}</td>
      <td>{{ $category->category_name }}</td>
      <td>{{ $category->created_at->diffForHumans() }}</td>
      <td>
       <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{ url('/delete') }}/{{ $category->id }}" type="button" class="btn btn-danger">Delete</a>
        <a href="{{ url('/edit') }}/{{ $category->id }}" type="button" class="btn btn-secondary">Edit</a>
        </div>
      </td>
    </tr>
    @empty
    <tr>
        <td colspan="8" class="text-center text-danger">No Category Available</td>
    </tr>
    @endforelse
  </tbody>
</table>
{{ $all_category->links() }}
        </div>
    </div>
</div>
</x-app-layout>