<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-lg-12 text-center">
			<h1 class="feature-title">Featured Designs</h1>
		</div>
	</div>
</div>
<?php 
	// Get random products and take 9 
	$products = Product::orderBy(DB::raw("RAND()"))->take(12)->get();

?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="feature-design-grid">
				<div id="main35-cuber" class="cbp-l-grid-fullWidth">

					@foreach($products as $product)
						<div class="cbp-item identity logos">
					        <div class="cbp-caption">
					            <div class="cbp-caption-defaultWrap">
					            	<img src="{{ $product->present()->imageWithType('square') }}" alt="{{ $product->present()->title }}">
					            </div>
					            <div class="cbp-caption-activeWrap">
					                <div class="cbp-l-caption-alignCenter">
					                    <div class="cbp-l-caption-body">
					                        <h3 class="title">{{ $product->present()->title }}</h3>
					                        <p class="desc">{{ $product->present()->category }}</p>
					                        <a href="{{ $product->present()->url }}" class="cbp-l-caption-buttonLeft cbp-button"><i class="fa fa-eye"></i></a>
					                        <a href="{{ $product->present()->imageWithType('square') }}" class="cbp-lightbox cbp-l-caption-buttonRight cbp-button" data-title="{{ $product->present()->title }}<br> {{ $product->present()->category }}"><i class="fa fa-search-plus"></i></a>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div><!-- end item -->
					@endforeach
				    
				</div>
			</div>
		</div>
	</div>
</div>