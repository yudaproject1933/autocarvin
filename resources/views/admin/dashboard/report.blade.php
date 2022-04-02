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
                    <th>Report</th>
                    <th>Transaction Date</th>
                    <th>Status Payment</th>
                    <th>Request Refund</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        $no=1;    
                    @endphp
                    @foreach ($result_data as $key => $value) 
                    @php 
                      $date = $value['updated_date'];
                      $date1 = str_replace('-', '/', $date);
                      $expired = date('Y-m-d',strtotime($date1 . "+7 days"));

                      $btn_refund = $value['updated_date'] < $expired && $value['status_payment'] === 'success' ? '<button class="btn btn-danger" title="Refund" onclick="request_refund('.$value["id"].')"><i class="fa fa-undo"></i></button>' : '';
                    @endphp
                      <tr>
                          <td>{{$no++;}}</td>
                          <td>{{$value['vin']}}</td>
                          <td>{{$value['phone']}}</td>
                          <td>
                              {{-- <a href="{{$path}}" target="_blank">{{is_null($value['link_docs']) ? '' : $path}}</a> --}}
                              {{-- <a href="{{$value['link_docs']}}" target="_blank">{{is_null($value['link_docs']) ? '' : $value['link_docs']}}</a> --}}
                              <a href='/read_report/{{$value->id}}/{{$value->vin}}' target="_blank">See Report</a>
                          </td>
                          <td>{{$value['updated_date']}}</td>
                          <td>{{ucwords(str_replace("_"," ",$value['status_payment']))}}</td>
                          <td>
                            {{-- <button class="btn btn-danger" title="Refund" onclick="request_refund({{$value['id']}})"><i class="fa fa-undo"></i></button> --}}
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
                        <textarea name="content" id="content" cols="30" rows="10" style="width: 90%" required></textarea>
                    </div>
              <div class="row">
                <div class="col-md-12">
                  <h6>Notes :</h6>
                  <ul>
                    <li>After filling in the reason for the refund, and we will process your refund</li>
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

    function request_refund(id_transaction) {
        $('#id_transaction').val(id_transaction);
        $('#modal-refund').modal('toggle');
    }
    
</script>
@endsection