@extends('frontend.layouts.app')
@section('content')
<style type="text/css">
  html,
  body,
  .intro {
    height: 100%;
  }



  table td,
  table th {
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
  }
  tbody td {
    font-weight: 500;
    color: #999999;
  }
</style>
<div class="my-5">
<section class="intro">
  <div class="bg-image h-100">
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card bg-dark shadow-2-strong">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-dark table-borderless mb-0">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actor</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($books as $book)
                        <tr>
                          <th scope="row">{{$book->id}}</th>
                          <td>{{$book->book_name}}</td>
                          <td>{{$book->actor}}</td>
                          <td><img src="{{$book->image_Path}}" alt=""></td>
                          <td>
                              <a href="{{url('/book/update/'.$book->id)}}">Edit</a>
                              <span> / </span>
                              <a href="{{url('/book/delete/'.$book->id)}}">Delete</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <a href="{{url('/book/upload')}}" class="btn">Upload book</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div> 
@endsection