<div class="row">
	<div class="custom-navigations">
		<button class="btn prev">Previous</button>
		<button class="btn next">Next</button>
	</div>
	<div class="owl-carousel product-tab-owl-carousel">
		@for ($i=0; $i < 2; $i++)
			<div class="item">
				@foreach($products as $key => $product)
					<div class="col-md-3 ">
						@include('listing.product-better', ['product' => $product])
					</div>
					@if($key == 3) <div class="clearfix"></div> @endif
				@endforeach
			</div> 
		@endfor
	</div>
</div>