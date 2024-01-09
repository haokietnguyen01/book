@extends('frontend.layouts.app')
@section('content')
<section id="billboard">
	<div class="container">
		<section id="featured-books" class="py-5 my-5">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<div class="section-header align-center">
							<div class="title">
								<span>Some quality items</span>
							</div>
							<h2 class="section-title">Featured Books</h2>
						</div>

						<div class="product-list" data-aos="fade-up">
							<div class="row">
								@foreach ($books as $book)
								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<?php $getArrImage = json_decode($book['image_Path'], true); 
		                                    // echo $getArrImage[0];
		                                    
		                                    ?>
											<img src="{{url('upload/book/').'/'.$getArrImage[0]}}" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
											Cart</button>
										</figure>
										<figcaption>
											<h3>{{$book->book_name}}</h3>
											<span>{{$book->actor}}</span>
										</figcaption>
									</div>
								</div>
								@endforeach
								

							</div><!--ft-books-slider-->
						</div><!--grid-->


					</div><!--inner-content-->
				</div>

				<div class="row">
					<div class="col-md-12">

						<div class="btn-wrap align-right">
							<a href="#" class="btn-accent-arrow">View all products <i
								class="icon icon-ns-arrow-right"></i></a>
							</div>

						</div>
					</div>
				</div>
			</section>
			@endsection