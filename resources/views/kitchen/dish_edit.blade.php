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
                <h3 style="display:inline-block">Edit dish</h3>
                <a href="/dish" class="btn btn-success" style="float:right;">Back</a>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form action="/dish/{{$dish->id}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <h5>Name</h5>
                      <input type="text" name="name" class="form-control" value="{{old('name', $dish->name)}}"> <br>
                      <h5>Category</h5>
                      <select name="category" class="form-control">
                          <option value="">Select Category</option>
                          @foreach($categories as $category)
                          <option value="{{$category->id}}" {{$category->id == $dish->category_id ? "selected" : ""}}>{{$category->name}}</option>
                          @endforeach
                      </select> <br>
                      <h5>Image</h5>
                      @if($dish->image)
                        <img src="/images/{{$dish->image}}" alt="" width="100px" height="100px"> <br><br>
                      @endif
                      <input type="file" name="dish_image"> <br> <br>
                      <input type="submit" class="btn btn-success">
                  </form>
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
@endsection