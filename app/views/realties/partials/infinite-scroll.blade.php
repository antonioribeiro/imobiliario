jQuery('#ads').infinitescroll({
    loading: {
        finished: undefined,
		finishedMsg     : 'Você chegou ao final da internet',
		msg             : null,
		img             : '{{ $assets }}/img/spinner_36x36.gif',
		msgText         : '',
        selector        : '#infinite-messages',
        speed           : 'fast',
        start           : undefined
    },

    state: {
        isDuringAjax: false,
        isInvalidPage: false,
        isDestroyed: false,
        isDone: false, // For when it goes all the way through the archive.
        isPaused: false,
        isBeyondMaxPage: false,
        currPage: 1
    },

	debug		 	: true,
	navSelector  	: "#next:last",
	nextSelector 	: "a#next:last",
	itemSelector 	: "#ads .ad",
	dataType	 	: 'html',
	maxPage         : 100,
	prefill			: true,
	path            : function(index) {
							return "{{ route('realties.infinite') }}?page=" + index;
						},

    behavior        : undefined,
    binder          : jQuery(window), // used to cache the selector
    //contentSelector : null, // rename to pageFragment
    extraScrollPx   : 150,
    animate         : true,
    pathParse       : undefined,
    appendCallback  : true,
    bufferPx        : 40,
    errorCallback   : function () { },
    infid           : 0, //Instance ID
    pixelsFromNavToBottom: undefined

});
