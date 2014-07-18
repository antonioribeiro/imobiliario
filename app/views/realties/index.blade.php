@extends('layouts.main')

@section('content')
	<div class="row">
	    <div class="container-fluid">
	        <div class="container container-pad" id="property-listings">
	            <div class="row">
	              <div class="col-md-12">
	                <h1>Flamengo</h1>
	              </div>
	            </div>

	            <div class="row">
	                <div class="col-sm-8">
		                @foreach($realties as $realty)
		                    @include('realties.partials.realty')
		                @endforeach
	                </div>

		            <div class="col-sm-4">
			            col 2
		            </div>

	            </div><!-- End row -->
	        </div><!-- End container -->
	    </div>
	</div>
@stop

