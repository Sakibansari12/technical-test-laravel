<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User Records</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/dropzone/min/dropzone.min.js') }}"></script>
		<!-- AdminLTE App -->
		<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
        
</head>
<div id="main-content">
    <h2>Add User Record</h2>
    
    <form class="post-form" name="UserForm" id="UserForm" action="" method="post">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" id="name" name="name"  />
            <p class="text-danger"></p>

        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" id="email" name="email" />
            <p class="text-danger"></p>

        </div>
        
        <div class="form-group">
            <label>Phone</label>
            <input type="text" id="phone" name="phone" />
            <p class="text-danger"></p>

        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" id="password" name="password" />
            <p class="text-danger"></p>

        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
<script>
    $("#UserForm").submit(function(event){
	//alert(44);
    event.preventDefault();
    var element  = $(this);
    $.ajax({
      url: '{{ route("submit-user") }}',
      type:'post',
      data: element.serializeArray(),
      dataType: 'json',
      success: function(response){
        
         if(response['status'] == true){

             window.location.href="{{  route('user') }}";
             $('#name').removeClass('is-invalid')
                 .siblings('p')
                 .removeClass('invalid-feedback').html("");
             $('#email').removeClass('is-invalid')
                 .siblings('p')
                 .removeClass('invalid-feedback').html("");
                 $('#phone').removeClass('is-invalid')
                 .siblings('p')
                 .removeClass('invalid-feedback').html("");
                 $('#password').removeClass('is-invalid')
                 .siblings('p')
                 .removeClass('invalid-feedback').html("");
         }else{
             var errors = response['errors'];
             if(errors['name']){
                 $('#name').siblings('p')
                 .html(errors['name']);
             }else{
                 $('#name').siblings('p').html("");
             }
             if(errors['email']){
                 $('#email')
                 .siblings('p').html(errors['email']);
             }else{
                 $('#email')
                 .siblings('p').html("");
             }
             if(errors['phone']){
                 $('#phone').siblings('p').html(errors['phone']);
             }else{
                 $('#phone').siblings('p').html("");
             }
             if(errors['password']){
                 $('#password').siblings('p').html(errors['password']);
             }else{
                 $('#password').siblings('p').html("");
             }

          
         }
         
      }, error: function(jqXHR, exception){
         console.log("something went wrong");
      }
    });
 });
</script>
</body>
</html>