@extends('cms.parent')

@section('content')
    
<section class="content">
    <div class="container-fluid">
     
      <!-- /.row -->
      
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Responsive Hover Table</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>INFO</th>
                    <th>ACTIV</th>
                    <th>Products Count</th>
                    <th>CREATED_AT</th>
                    <th>UPDATED_AT</th>
                    <th>Settings</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $category)
                      <tr>
                        <td>{{$loop->index +1}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->info}}</td>
                        <td>{{$category->activ}}</td>
                        <td>{{$category->products_count}}</td>
                        <td>{{$category->created_at->diffForHumans()}}</td>
                        <td>{{$category->updated_at->diffForHumans()}}</td>
                        <td><div class="btn-group">
                          <a href="{{route('categories.edit',$category->id)}}" type="button" class="btn btn-warning">
                            <i class="fas fa-edit"></i>
                          </a>
                          <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button href="{{route('categories.destroy',$category->id)}}"  type="submit" class="btn btn-danger">
                              <i class="fas fa-trash"></i>
                            </button>
                          </form>
                        </div></td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection