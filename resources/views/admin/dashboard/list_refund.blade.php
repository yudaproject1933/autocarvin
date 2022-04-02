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
                <table id="example2" class="table table-bordered table-hover" width="100%">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>VIN</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Transaction Date</th>
                    <th>Command</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        $no=1;    
                    @endphp
                    @foreach ($model as $key => $value) 
                    @php 
                      $btn_refund = "";
                      if ($value->transaction['status_payment'] == "request_refund") {
                            $btn_refund = '<button class="btn btn-success" title="Refund" onclick="request_refund('.$value->transaction["id"].')"><i class="fa fa-undo"></i></button>';
                      }elseif ($value->transaction['status_payment'] == "pending_refund") {
                            $btn_refund = '<button class="btn btn-warning" title="Refund" onclick="request_refund('.$value->transaction["id"].')"><i class="fa fa-undo"></i></button>';
                      }else{
                            $btn_refund = "";
                      }
                    @endphp
                      <tr>
                          <td>{{$no++;}}</td>
                          <td>{{$value->transaction['vin']}}</td>
                          <td>{{$value->transaction['phone']}}</td>
                          <td>{{$value->transaction['email']}}</td>
                          <td>{{$value->transaction['updated_date']}}</td>
                          <td>{{$value['command']}}</td>
                          <td>{{$value->transaction['status_payment']}}</td>
                          <td>
                                <?=$btn_refund?>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <h6>Catatan :</h6>
                    <ul>
                      <li>Status refund hanya bisa dilakukan maksimal dari tanggal pembayaran</li>
                    </ul>
                  </div>
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

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-refund">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="modal-judul">Request Refund</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" action="{{route('report.store')}}" enctype="multipart/form-data" id="form-docs">
                    @csrf 
                    <input type="hidden" name="id_transaction" id="id_transaction">
                    <div class="form-group">
                        <label for="content">Command :</label><br>
                        <textarea name="content" id="content" cols="30" rows="10" style="width: 90%"></textarea>
                    </div>
              <div class="row">
                <div class="col-md-12">
                  <h6>Notes :</h6>
                  <ul>
                    <li>Setelah mengisi alasan untuk melakukan refund kami akan memproses transaksi anda</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> Send</button>
                </form>
            </div>        
                
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
  $(document).ready(function() {
    $('#example2').DataTable({
            "scrollX": true
        });
    } );

    function request_refund(id){
        Swal.fire({
            title: 'Are you sure to Refund?',
            text: "Please make sure!!",
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
                        url : "/report/"+id,
                        method : "PUT",
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
    
</script>
@endsection