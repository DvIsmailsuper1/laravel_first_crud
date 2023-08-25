@extends('cms.parent')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{route('categories.update',$category->id)}}">
              @method('PUT')
                @csrf
        
              <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  <ul>
                    @foreach ($errors->all() as $error )
                      <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
                @endif

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$category->name}}">
                </div>
                <div class="form-group">
                  <label for="info">Info</label>
                  <input type="text" class="form-control" id="info" placeholder="Info" name="info" value="{{$category->info}}">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input" id="active" name="active" @checked($category->activ) >
                      <label class="custom-control-label" for="customSwitch1">Active</label>
                    </div>
                

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
         

        </div>
        
    </div><!-- /.container-fluid -->
  </section>
@endsection