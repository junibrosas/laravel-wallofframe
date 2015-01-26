@extends('layout.default')
@section('content')
    <section >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-heading space-sm">{{ $heading }}</h2>
                </div>
                
                @if( $brands->count() > 0 )
                    @foreach( $brands as $brand )
                        <div class="col-md-2">
                            <a href="{{ $brand->present()->url }}">
                                <img src="{{ $brand->present()->image }}" alt="Brand Logo" class="img-responsive elem-center"/>
                            </a>
                            <h5>{{ $brand->name }}</h5>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>
    </section>
@stop