/*
 * return: $ajax results;
 */

function apiRequest (api, request, output, args, method) {
	var requestAddress = "";

	if(restFulLinks == "true"){
		requestAddress = api_adrress 
			+ "/" + api
			+ "/" + request
			+ "." + output ;
	}else{
		requestAddress = api_adrress 
			+ "?requestedApi=" + api
			+ "&request=" + request
			+ "&output=" + output ;
	}
	
	var type =  (typeof method != "undefined") ? method : "get";
	var args =  (typeof args != "undefined") ? args : "";

	console.debug("Ask[" + type + "]: " + requestAddress);
	
	$ajax = $.ajax({
		url     : requestAddress,
		type    : type,
		dataType: output,
		data    : {"args": args}
		});

	$ajax.fail(function (args) {
		console.debug("request failed");
		console.debug(args);
	})
	

	return $ajax;
}

function initForms () {
	$( ".apiForm" ).submit(function( event ) {
	 	console.debug("Transmit Name");
		  // Stop form from submitting normally
		event.preventDefault();
		 
		 // Get some values from elements on the page:
		var $form     = $( this );
		var url       = $form.attr( "action" );
	    var args      = {};
	    var results   = {};

	    var method       = $form.attr("method");
	    var api          = "api";
	    var request      = "";
	    var output       = "html";
	    var replace      = "";
	    var results_into = "";
	    var run          = "";
	    var storeLocal   = false;

	    args.name = $("input[name=name]").val();

	    console.debug(args);

	    //args["showArrivalForm"] = "true";



	    $form.find("input").each(function(index, $element){
	    	console.debug($element.type);
	    	switch($element.type){
	    		case "radio":
	    			if ($element.checked) args[$element.name] = $element.value;
	    			break;

	    		case "hidden":

	    			switch($element.name){
	    			case "api":
	    				api = $element.value;
	    				break;

	    			case "request":
	    				request = $element.value;
	    				break;

	    			case "output":
	    				output = $element.value;
	    				break;

	    			case "replace":
	    				replace = $element.value;
	    				break;
	    			case "results_into":
	    				results_into = $element.value;
	    				break;
	    			case "storeLocal":
	    				storeLocal = $element.value == "true";
	    				break;
	    			}

	    		default:
	    			args[$element.name] = $element.value;
	    			break;
	    	}
	    });


	    $form.find("textarea").each(function(index, $element){
	  		args[$element.name] = $element.value;
	    });

	    console.debug("announce: " + JSON.stringify(args));
	 
			apiRequest(api, request, output, args, method).done(function (results) {
				console.debug("results:");
				console.debug(results);
				if (replace != "") {
					$("#" + replace).html(results);
				};

				if (results_into != "") {
					this[results_into] = results;
				};

				if (run != "") {
					this[run](results);
				};

				if (storeLocal && (typeof results.localStorage != "undefined")) {
					saveInLocalStorage(results.localStorage);
				};
			});

		

	});
	
};

function saveInLocalStorage (jsonValues) {
	$.each(jsonValues, function (key, value) {
		localStorage[key] = value;
	});
}