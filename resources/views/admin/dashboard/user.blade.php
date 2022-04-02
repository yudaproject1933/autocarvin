@extends('layouts.admin.main')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                
              </div>
              
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Change Password</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="{{route('user.store')}}">
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Username</label>
                              <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{isset($username) && $username != '' ? $username : ''}}" readonly>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Current Password</label>
                              <input type="password" name="old_password" class="form-control" id="old_pass" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">New Password</label>
                                <input type="password" name="new_password" class="form-control" id="new_pass" placeholder="Password" required>
                            </div>
                            <div class="form-group mb-0">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1" onclick="see_password()">
                                <label class="custom-control-label" for="exampleCheck1">See Password</label>
                                <br><br>
                                
                                <span <?=$error?>><i class="fa fa-info-circle"></i> {{$message}}</span>
                              </div>
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                </div>
              <!-- /.card-body -->
            </div>
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

{{-- modal --}}


@endsection

@section('js')
<script>
  $(document).ready(function() {
    var success = '<?=$success?>';

    if (success) {
        // alert('masuk');
        Swal.fire({
            title: 'Success',
            text: "Your Password Has Been Updated",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'oke'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/user";
                }else{
                    window.location.href = "/user";
                }
        });
    }
  });

    function see_password() {
        var x = document.getElementById("old_pass");
        var y = document.getElementById("new_pass");
        if (x.type === "password") {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
    }
    
    
</script>
@endsection