<!-- Begin Listing: 701 W ALLENS LN-->
<div class="ad brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing" id="ad-{{ $realty->id }}" data-id="{{ $realty->id }}">
    <div class="media">
	    <div class="col-md-3" style="margin-left: -15px;">
		    <img alt="image" class="img-responsive" src="http://lorempixel.com/200/150/city/?x={{rand()}}"></a>
	    </div>

	    <div class="col-md-9">
	        <div class="media-body fnt-smaller">
	            <h4 class="media-heading">
	                {{ $realty->present()->formattedPrice }}
		            <small class="pull-right">{{ $realty->present()->abbreviatedAddress }}</small>
	            </h4>

	            <ul class="list-inline mrg-0 btm-mrg-10 clr-535353">
		            @foreach($realty->present()->mainCharacteristics as $characteristic)
		                @if(isset($started))
		                    <li style="list-style: none">|</li>
		                @endif

		                <li>{{$characteristic}}</li>

		                <?php $started = true; ?>
		            @endforeach
	            </ul>

	            <p class="hidden-xs">{{ $realty->present()->abbreviatedBody }}</p>
	        </div>

		    <div class="ad-icons">
			    <div class="pull-right">
				    <a href="#" class="ad-favorite" data-id="{{ $realty->id }}">
					    <i class="fa fa-heart ad-icon" title="favoritar"></i>
				    </a>
				    <a href="#" class="ad-watch" data-id="{{ $realty->id }}">
					    <i class="fa fa-eye ad-icon" title="ficar de olho"></i>
				    </a>
				    <a href="#" class="ad-delete" data-id="{{ $realty->id }}">
					    <i class="fa fa-trash-o ad-icon" title="enviar para a lixeira"></i>
				    </a>
			    </div>
		    </div>
	    </div>
    </div>
</div><!-- End Listing-->
