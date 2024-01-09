@extends('frontend.layouts.app')
@section('content')
<div class="col-md-6 offset-md-3 mt-5">
	<form action="" method="POST" enctype="multipart/form-data">
		@csrf

		@if(isset($book))
		<div class="form-group">
			<label>Book Name</label>
			<input type="text" name="bookname" class="form-control" id="Name" placeholder="Enter your book name" required="required" value="{{$book->book_name}}">
		</div>
		<div class="form-group">
			<label>Actor</label>
			<input type="text" name="Actor" class="form-control" id="Actor" placeholder="Enter actor" required="required" value="{{$book->actor}}">
		</div>
		<div class="form-group">
			<label>Release Date</label>
			<input type="Date" name="releaseDate" class="form-control" id="date" value="{{$book->release_date}}">
		</div>
		<div class="form-group">
			<label>Cover book:</label>
			
			
		</div>
		<div class="form-group mt-3">
			<label class="mr-2">Book cover image:</label>
			<input class="nav-link btn btn-outline-dark rounded-pill mt-2 w-100" type="file" name="image[]" multiple>
		</div>
		@endif
		<button type="submit" class="nav-link btn btn-outline-dark rounded-pill m-0 w-100">Submit</button>
	</form>
</div> 
@endsection