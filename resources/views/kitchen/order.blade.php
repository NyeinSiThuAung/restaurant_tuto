@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kitchen Panel</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 style="display:inline-block">Dishes</h3>
                <a href="/dish/create" class="btn btn-success" style="float:right;">Create</a>
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dish" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>Dish Name</th>
                        <th>Table Number</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order) 
                      <tr>
                          <td>{{$order->dish_id}}</td>
                          <td>{{$order->table_id}}</td>
                          <td>{{$status[$order->status]}}</td>
                          <td>
                            <a href="/dish/{{$order->id}}/approve" class="btn btn-primary">Approve</a>
                            <a href="/dish/{{$order->id}}/cancel" class="btn btn-danger">Cancel</a>
                            <a href="/dish/{{$order->id}}/done" class="btn btn-success">Done</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
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
  </div>
  <!-- /.content-wrapper -->

  <script src="plugins/jquery/jquery.min.js"></script>
<script>
  
  $(function () {
    // $("#example1").DataTable({
    //   "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#dish').DataTable({
      "paging": true,
      "lengthChange": false,
      "pageLength": 10,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection