@extends('layouts.main')

@section('content')
	<div class="row">
	    <div class="container-fluid">
	        <div class="container container-pad" id="property-listings">
	            <div class="row">
		            @include('realties.infinite')

		            <div class="col-sm-4">
			            col 2
		            </div>
	            </div><!-- End row -->
	        </div><!-- End container -->
	    </div>
	</div>
@stop

@section('page-scripts')
	@include('realties.partials.infinite-scroll')

	jQuery('.ad-delete').click(function()
	{
		id = jQuery(this).data('id');

		$response = _request('ads/delete/'+id, this);
	});

	function _request(actionUrl, element)
	{
		jQuery.ajax(
		{
			url: '{{ route('api.v1') }}' + '/' + actionUrl,
			data: null,

			success: function(data) {
				return _processResponse(data, element);
			},

			error: function() {
				console.log('error');
			},
		});
	}

	function _processResponse(response, element)
	{
		if (typeof response.redirect !== 'undefined')
		{
			window.location = response.redirect;
		}

		return response;
	}
@stop
