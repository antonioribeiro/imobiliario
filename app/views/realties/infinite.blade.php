<div class="col-sm-8">
	<div class="row">
		<div id="ads">
			@foreach($realties as $realty)
				@include('realties.partials.realty')
			@endforeach

			<a href="#" id="next" class="pagination">Next Page</a>
		</div>
	</div>

	<div class="row">
		<div id="infinite-messages" class="text-center"></div>
	</div>
</div>
