<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-success">All Admin Panel</h2>
                <table class="table ">
       <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">User Name</th>
      <th scope="col">User E-Mail</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($all_user as $user)
    <tr>
      <td>{{ $loop->index+1 }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
            </div>
        </div>
    </div>
</x-app-layout>
