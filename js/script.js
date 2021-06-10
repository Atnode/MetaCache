// Check if it is a URL
// Function from: https://www.w3resource.com/javascript-exercises/javascript-regexp-exercise-9.php
function is_url(str) {
	regexp = /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
	if (regexp.test(str)) {
		return true;
	} else {
		return false;
	}
}
// Google Cache
document.getElementById("googlecache").onclick = function() {
	if (document.getElementById("url").value != "") {
		var test = document.getElementById("url").value;
		if (is_url(test) == true) {
			var url = "http://webcache.googleusercontent.com/search?q=cache:" + document.getElementById("url").value;
			window.open(url);
		} else {
			$('#InvalidUrl').modal('show');
		}
	} else {
		$('#NoUrl').modal('show');
	}
}
// Google AMP Cache
document.getElementById("googleamp").onclick = function() {
	if (document.getElementById("url").value != "") {
		var test = document.getElementById("url").value;
		if (is_url(test) == true) {
			var ampWindow = window.open();
			ampWindow.document.write("<html><head><title>Google AMP Cache</title><meta name='viewport' content='width=400, initial-scale=1'></head><body><h1 style='font-family: Arial; text-align: center; margin-top:20%;'>Loading, please wait...</h1></body></html>");
			$.get("https://cors.bridged.cc/" + document.getElementById("url").value, function(data) {
				if ($(data).filter('link[rel="amphtml"]').attr("href") != undefined) {
					var url = $(data).filter('link[rel="amphtml"]').attr("href");
					if (url.startsWith("//")) {
						url = url.replace("//", "https://");
					}
					try {
						var canonical = new URL(url);
					} catch (err) {
						ampWindow.close();
						$('#ErrorAMP').modal('show');
						return;
					}
					var ampDomain = canonical.hostname.replace(/\./g, "-");
					var amp = "https://" + ampDomain + ".cdn.ampproject.org/v/" + canonical.hostname + canonical.pathname + "?amp_js_v=a1";
					ampWindow.location.href = amp;
				} else {
					ampWindow.close();
					$('#NoAMP').modal('show');
				}
			});
		} else {
			$('#InvalidUrl').modal('show');
		}
	} else {
		$('#NoUrl').modal('show');
	}
}
// Bing Cache
document.getElementById("bingcache").onclick = function() {
	if (document.getElementById("url").value != "") {
		var test = document.getElementById("url").value;
		if (is_url(test) == true) {
			var bingWindow = window.open();
			bingWindow.document.write("<html><head><title>Bing Cache</title><meta name='viewport' content='width=400, initial-scale=1'></head><body><h1 style='font-family: Arial; text-align: center; margin-top:20%;'>Loading, please wait...</h1></body></html>");
			$.get("https://cors.bridged.cc/https://www.bing.com/search?q=url:" + encodeURIComponent(document.getElementById("url").value) + "&go=Search&qs=bs&form=QBRE", function(data) {
				const parser = new DOMParser();
				const dom = parser.parseFromString(data, 'text/html');
				if (dom.querySelector('ol#b_results li.b_algo:first-of-type div.b_attribution') != undefined) {
					const div = dom.querySelector('ol#b_results li.b_algo:first-of-type div.b_attribution');
					if (div) {
						const attr = div.getAttribute('u');
						if (attr) {
							const params = attr.split('|');
							const cacheUrl = `http://cc.bingj.com/cache.aspx?q=url:${encodeURIComponent(url)}&d=${params[2]}&mkt=en-WW&setlang=en-US&w=${params[3]}`;
							bingWindow.location.href = cacheUrl;
						} else {
							bingWindow.close();
							$('#NoBingCache').modal('show');
						}
					} else {
						bingWindow.close();
						$('#NoBingCache').modal('show');
					}
				} else {
					bingWindow.close();
					$('#NoBingCache').modal('show');
				}
			});
		} else {
			$('#InvalidUrl').modal('show');
		}
	} else {
		$('#NoUrl').modal('show');
	}
}
// Archive.org
document.getElementById("archiveorg").onclick = function() {
	if (document.getElementById("url").value != "") {
		var test = document.getElementById("url").value;
		if (is_url(test) == true) {
			var url = "https://web.archive.org/web/" + document.getElementById("url").value;
			window.open(url);
		} else {
			$('#InvalidUrl').modal('show');
		}
	} else {
		$('#NoUrl').modal('show');
	}
}
// Archive.today
document.getElementById("archivetoday").onclick = function() {
	if (document.getElementById("url").value != "") {
		var test = document.getElementById("url").value;
		if (is_url(test) == true) {
			var url = "http://archive.is/newest/" + document.getElementById("url").value;
			window.open(url);
		} else {
			$('#InvalidUrl').modal('show');
		}
	} else {
		$('#NoUrl').modal('show');
	}
}
// WebCite
document.getElementById("webcite").onclick = function() {
	if (document.getElementById("url").value != "") {
		var test = document.getElementById("url").value;
		if (is_url(test) == true) {
			var url = "http://www.webcitation.org/query?url=" + document.getElementById("url").value;
			window.open(url);
		} else {
			$('#InvalidUrl').modal('show');
		}
	} else {
		$('#NoUrl').modal('show');
	}
}
// Wikiwix
document.getElementById("wikiwix").onclick = function() {
	if (document.getElementById("url").value != "") {
		var test = document.getElementById("url").value;
		if (is_url(test) == true) {
			var url = "http://archive.wikiwix.com/cache/index2.php?url=" + document.getElementById("url").value;
			window.open(url);
		} else {
			$('#InvalidUrl').modal('show');
		}
	} else {
		$('#NoUrl').modal('show');
	}
}
// Memento
document.getElementById("memento").onclick = function() {
	if (document.getElementById("url").value != "") {
		var test = document.getElementById("url").value;
		if (is_url(test) == true) {
			var url = "https://timetravel.mementoweb.org/reconstruct/" + document.getElementById("url").value;
			window.open(url);
		} else {
			$('#InvalidUrl').modal('show');
		}
	} else {
		$('#NoUrl').modal('show');
	}
}