function displayIP(showIP, shown){
	if(showIP && !shown) {
		getGlobalIP(function(globalIP, args){
			getLocalIP(function(localIP, args){
				$('#kioskInfo').html('global: ' + globalIP + 'local: ' + localIP );
			});
		});

		shown = true;

	}else if (showIP == false && shown) {
		shown = false;
		$('#kioskInfo').html("");
	}
	return shown;
}

function getGlobalIP (successF, args) {
	$.getJSON("http://jsonip.appspot.com?callback=?",
		function(data){
			console.debug("globalIP: " + data.ip);
			if(successF != null){
	        	successF(data.ip, args);
	        }
		});
}

function getLocalIP (successF, args) {
	var RTCPeerConnection = /*window.RTCPeerConnection ||*/ window.webkitRTCPeerConnection || window.mozRTCPeerConnection;
	var localIP = '';
	// NOTE: window.RTCPeerConnection is "not a constructor" in FF22/23
	

	if (RTCPeerConnection) (function () {
	    var rtc = new RTCPeerConnection({iceServers:[]});
	    if (window.mozRTCPeerConnection) {      // FF needs a channel/stream to proceed
	        rtc.createDataChannel('', {reliable:false});
	    };
	    
	    rtc.onicecandidate = function (evt) {
	        if (evt.candidate) grepSDP(evt.candidate.candidate);
	    };
	    rtc.createOffer(function (offerDesc) {
	        grepSDP(offerDesc.sdp);
	        rtc.setLocalDescription(offerDesc);
	    }, function (e) { console.warn("offer failed", e); });
	    
	    
	    var addrs = Object.create(null);
	    addrs["0.0.0.0"] = false;
	    function updateDisplay(newAddr) {
	        if (newAddr in addrs) return;
	        else addrs[newAddr] = true;
	        var displayAddrs = Object.keys(addrs).filter(function (k) { return addrs[k]; });
	        localIP = localIP + displayAddrs.join(" or perhaps ") || "n/a";
	        
	        console.debug("localIP: " + localIP);
	        if(successF != null){
	        	successF(localIP, args);
	        }
	    }
	    
	    function grepSDP(sdp) {
	        var hosts = [];
	        sdp.split('\r\n').forEach(function (line) { // c.f. http://tools.ietf.org/html/rfc4566#page-39
	            if (~line.indexOf("a=candidate")) {     // http://tools.ietf.org/html/rfc4566#section-5.13
	                var parts = line.split(' '),        // http://tools.ietf.org/html/rfc5245#section-15.1
	                    addr = parts[4],
	                    type = parts[7];
	                if (type === 'host') updateDisplay(addr);
	            } else if (~line.indexOf("c=")) {       // http://tools.ietf.org/html/rfc4566#section-5.7
	                var parts = line.split(' '),
	                    addr = parts[2];
	                updateDisplay(addr);
	            }
	        });
	    }
	})(); else {
	   localIP = localIP + "<code>ifconfig | grep inet | grep -v inet6 | cut -d\" \" -f2 | tail -n1</code>";
	   localIP = localIP + "In Chrome and Firefox your IP should display automatically, by the power of WebRTCskull.";
	}

}