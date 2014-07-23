<div class="col-sm-8">
	<div class="row">
		<div id="ads">
			@foreach($ads as $ad)
				@include('ads.partials.ad')
			@endforeach

			<a href="#" id="next" class="pagination">Next Page</a>
		</div>
	</div>

	<div class="row">
		<div id="infinite-messages" class="text-center"></div>
	</div>
</div>
