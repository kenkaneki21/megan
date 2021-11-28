@extends('admin.admin_master')

@section('admin')


      <div class="row">
            
             
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                  <h4 class="card-title">Course List</h4><br>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add Course
    </button>
    <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CREATE COURSE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form class="forms-sample" action="{{ route('add.course') }}" method="post">
                    {{ csrf_field() }}
                  <div class="modal-body">
                   
                                <div class="form-group">
                                  <label for="exampleInputUsername1">Course Name</label>
                                  <input type="text" class="form-control" name="name" placeholder="Course Name">
                                </div>
                               
                            
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                    </form>
                </div>
              </div>
            </div>
                  
                  <div class="   ">
                   <table class="table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                   
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <!--@php($i = 1) -->
                             @foreach($courses as $course)
                            <tr>
                            <th scope="row"> {{ $courses->firstItem()+$loop->index }} </th>
                            <td>{{ $course->name}} </td>
                            <td>   </td>
                            <td>
                                 
                            </td>
                            <td><a href="{{ url('course/edit/'.$course->id)}}" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ url('course/delete/'.$course->id)}}" onclick="return confirm('Are you sure to delete')"  class="btn btn-danger btn-sm">Delete</a>
                            </td>
                            </tr>
                            @endforeach
                      </tbody>
                    </table>
                   
                  
                  </div>
                     <ul class="pagination flex-wrap">{{ $courses->links() }}</ul>
                </div>
              </div>
            </div>
            
             
          </div>
      @endsection