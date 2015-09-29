<div class="row">
	<div class="col-md-12">
		<h2 class="corsva-title text-center">Brands</h2>
		<?php $brands = ProductBrand::take(12)->get(); ?>
    	<div class="owl-carousel product-tab-brands-carousel">
	    	@forelse($brands as $brand)
				<div class="item" style="padding: 5px">
					<a href="{{ $brand->present()->url }}">
                        <img src="{{ $brand->present()->image }}" alt="Brand Logo" class="img-responsive elem-center"/>
                    </a>
                    <div class="space-sm"></div>
				</div>
	    	@empty

	    	@endforelse
    	</div>
	</div>
</div>