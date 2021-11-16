@extends('layouts.frontend_master')
@section('main')
<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/cover-img-1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Products</h1>
				   					<h2 class="bread"><span><a href="index.html">Home</a></span> <span>Shop</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-push-2">
						<div class="row row-pb-lg">
							 @foreach ($unique_category as $category)
                                 <div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url({{ asset('product_image/'.$category->product_image) }});">
										<p class="tag"><span class="new">New</span></p>
										<div class="cart">
											<p>
												<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
												<span><a href="{{ url('/product/details') }}/{{ $category->id }}"><i class="icon-eye"></i></a></span> 
												<span><a href="#"><i class="icon-heart3"></i></a></span>
												<span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="product-detail.html">{{ $category->category_name }}</a></h3>
										<p class="price"><span>${{ $category->category_price }}</span></p>
									</div>
								</div>
							</div>
                             @endforeach	
						</div>
						<div class="row">
							<div class="col-md-12">
								<ul class="pagination">
									<li class="disabled"><a href="#">&laquo;</a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">&raquo;</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-md-pull-10">
						<div class="sidebar">
							<div class="side">
								<h2>Categories</h2>
								<div class="fancy-collapse-panel">
			                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			                     @foreach ($all_category as $category)
                                     <div class="panel panel-default">
			                         <div class="panel-heading" role="tab" id="headingOne">
			                             <h4 class="panel-title">
			                                 <a class="collapsed" href="{{ url('/category/product') }}/{{ $category->id }}" aria-expanded="true" aria-controls="collapseOne"><strong class="text-success">{{ $category->category_name }}</strong>
			                                 </a>
			                             </h4>
			                         </div>
			                     </div>
                                 @endforeach
                                  
			                     
			                  </div>
			               </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection