<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User Records</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/dropzone/min/dropzone.min.js') }}"></script>
		<!-- AdminLTE App -->
		<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
        <script src="{{  asset('assets/js/demo.js') }}"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<div id="main-content">
    <div class="row">

<div class="col-md-6 add_button ">
<h2>All User Records</h2>
</div>
    
    <div class="add_user col-md-6">
	  <a href="{{ route('index') }}" class="btn btn-primary">Add New User</a>              
	</div>
    </div>
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
        @if($userdata->isNotEmpty())
            @foreach($userdata as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    <a href="#" onclick="deleteUser({{$user->id}})">Delete</a>
                </td>
            </tr>
           @endforeach
        @else
        <tr>
            <td colspan="5">Record Not Found</td>
        </tr>

        @endif  

            
           
        </tbody>
    </table>
</div>
</div>
<script>
	function deleteUser(id){
		var url = '{{ route("delete","ID")}}';
		var NewUrl = url.replace("ID", id);
		//alert(NewUrl)
		if(confirm("Are you sure went to delete")){
			$.ajax({
			url: NewUrl,
			type:'delete',
			data: {},
			dataType: 'json',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
			success: function(response){
				if(response['status']){
					window.location.href="{{  route('user') }}";
				}
			}
	     });
		}
}
  </script>
</body>
</html>