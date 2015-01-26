@extends('layout.profile')

@section('content')
   <div class="row">
      <div class="col-md-12">
         <h4 class="label-heading">Wishlist</h4>
      </div>
   </div>
   @include('components.tables.table-wishlist')
@stop