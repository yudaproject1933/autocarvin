<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <center><h1>Admin</h1></center>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger" onclick="event.preventDefault(); this.closest('form').submit();" style="float: right;"><i class="fa fa-power-off"></i> Logout</button>
                </form>
            </div>
            <div class="col-md-12">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Start Date : </label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ isset($start_date) ? $start_date : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">End Date : </label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ isset($end_date) ? $end_date : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Status Payment : </label>
                                <div class="col-sm-12">
                                    <select name="status_payment" id="status_payment" class="form-control" >
                                        <option value="">--Pilih--</option>
                                        <option value="visit" {{ isset($status_payment) && $status_payment == 'visit' ? 'selected' : '' }}>Visit</option>
                                        <option value="checkout" {{ isset($status_payment) && $status_payment == 'checkout' ? 'selected' : '' }}>Checkout</option>
                                        <option value="pending" {{ isset($status_payment) && $status_payment == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="success" {{ isset($status_payment) && $status_payment == 'success' ? 'selected' : '' }}>Success</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12" style="margin: 10px 0px;">
                            <button class="btn btn-warning float-md-left"><i class="fa fa-search"></i> Filter</button>
                        </div>
                </form>
                <hr>
            </div>
        </div>
        
        
        <br>
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>VIN</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Link</th>
                            <th>Status Payment</th>
                            <th>Created Date</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $no=1;    
                    @endphp
                    @foreach ($result_data as $key => $value) 
                    @php $path = Storage::url($value['link_docs']); @endphp
                        <tr>
                            <td>{{$no++;}}</td>
                            <td>{{$value['vin']}}</td>
                            <td>{{$value['email']}}</td>
                            <td>{{$value['phone']}}</td>
                            <td>
                                {{-- <a href="{{$path}}" target="_blank">{{is_null($value['link_docs']) ? '' : $path}}</a> --}}
                                <a href="{{$value['link_docs']}}" target="_blank">{{is_null($value['link_docs']) ? '' : $value['link_docs']}}</a>
                            </td>
                            <td>{{$value['status_payment']}}</td>
                            <td>{{$value['created_date']}}</td>
                            <td>
                                {{-- <button type="button" class="btn btn-success" title="Upload" onclick="updateData({{ $value['id'] }})"><i class="fa fa-file"></i></button>&nbsp; --}}
                                <button type="button" class="btn btn-danger" title="Upload Script" onclick="generate({{ $value['id'] }})"><i class="fa fa-file"></i></button>&nbsp;
                                <a class="btn btn-warning" title="Download Docs" href="https://www.autotrader.com/cars-for-sale/experian?SID=ATCbI8RQrUb0njwc6r&VIN={{$value['vin']}}&brand=atc&ps=true" target="_blank"><i class="fa fa-print"></i></a>&nbsp;
                                <button class="btn btn-primary" title="Send Email" onclick="SendEmail({{$value['id']}})"><i class="fa fa-paper-plane"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-update">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> -->
        </div>
        <div class="modal-body">
            <form class="form-group" method="POST" action="/upload_report" enctype="multipart/form-data" id="form-email">
                @csrf 
                <input type="hidden" name="id_transaction" id="id_transaction">
                <div class="form-group">
                    <label for="file">Upload File :</label>
                    <input type="file" class="form-control-file" id="file" name="file_docs">
                </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
            </form>
        </div>        
            
    </div>
    </div>
</div>
  
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-upload">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="modal-judul">Upload Data</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" action="generate_report" enctype="multipart/form-data" id="form-docs">
                    @csrf 
                    <input type="hidden" name="id_email" id="id_email">
                    <div class="form-group">
                        <label for="file">Upload Text :</label><br>
                        <textarea name="content" id="content" cols="30" rows="10" style="width: 90%"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>        
                
        </div>
    </div>
</div>
  
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

{{-- swal --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "scrollX": true
        });
    } );
    function updateData(id){
        
        $('#id_transaction').val(id);
        
        $('#modal-update').modal('toggle')
    }
    function generate(id){
        $('#id_email').val(id);
        $('#modal-upload').modal('toggle')
    }

    function SendEmail(id){
        Swal.fire({
            title: 'Are you sure to send Email?',
            text: "Please check before send",
            icon: 'warning',
            showCancelButton: true,
            allowOutsideClick: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Send!',
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading(),
            preConfirm: function(){
                return $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url : "/sendEmail/"+id,
                        method : "GET",
                        contentType: "application/json",
                        dataType: "json",
                        success : function (res) {
                            if (res.success) {
                                Swal.fire({
                                    title: 'Berhasil',
                                    text: res.message,
                                    icon: 'success',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'oke'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload();
                                        }else{
                                            location.reload();
                                        }
                                });
                            }else{
                                Swal.fire({
                                    title: 'Gagal',
                                    text: "Gagal send email",
                                    icon: 'error',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'oke'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload();
                                        }else{
                                            location.reload();
                                        }
                                });
                            }
                        },
                        error:function (xhr) {  
                        }
                    });
            }
        });
    }

    
    
    function print_report(){
        var vin = $('#vin').val();
        if(vin == ''){
            Swal.fire('Please input vin!!');
        }else{

            var url = "https://www.autotrader.com/cars-for-sale/experian?SID=ATCbI8RQrUb0njwc6r&VIN="+vin+"&brand=atc&ps=true";
            window.open(url,"_blank");
        }
    }

    function export_excel(){
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        var status_payment = $('#status_payment').val();
        
        $("#btn-export").attr("href", "/export?start_date="+start_date+"&end_date="+end_date+"&status_payment="+status_payment);
    }
</script>
</body>
</html>