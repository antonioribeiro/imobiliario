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

		_request('realties/delete/'+id, this, 'deleteAd', id);
	});

	function _request(actionUrl, element, method, id)
	{
		jQuery.ajax(
		{
			url: '{{ route('api.v1') }}' + '/' + actionUrl,
			data: null,

			success: function(data) {
				return _processResponse(data, element, method, id);
			},

			error: function() {
				console.log('error');
			},
		});
	}

	function _processResponse(response, element, method, id)
	{
		if (typeof response.redirect !== 'undefined')
		{
			window.location = response.redirect;
		}

		if (typeof response.success !== 'undefined' && response.success)
		{
			var fn = window[method];

			if(typeof fn === 'function')
			{
				fn(response, element, id);
			}
		}
	}

	function deleteAd(response, element, id)
	{
		ad = jQuery('#ad-' + id).hide('slow');
	}

@stop
