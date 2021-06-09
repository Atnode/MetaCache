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
        // Test if it is a URL
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
        // Test if it's a URL
        var test = document.getElementById("url").value;
        if (is_url(test) == true) {
            // Create the window first, because creating it later will trigger a popup block
            var ampWindow = window.open();
            ampWindow.document.write("<html><head><title>Google AMP Cache</title><meta name='viewport' content='width=400, initial-scale=1'></head><body><h1 style='font-family: Arial; text-align: center; margin-top:20%;'>Loading, please wait...</h1></body></html>");
            $.get("https://cors.bridged.cc/" + document.getElementById("url").value, function(data) {
                if ($(data).filter('link[rel="amphtml"]').attr("href") != undefined) {
                    var url = $(data).filter('link[rel="amphtml"]').attr("href");
                    // Convert scheme-relative URLs into HTTPS URLs
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
                    // Create AMP link
                    var ampDomain = canonical.hostname.replace(/\./g, "-");
                    var amp = "https://" + ampDomain + ".cdn.ampproject.org/v/" + canonical.hostname + canonical.pathname + "?amp_js_v=a1";
                    // Load AMP page in Window
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

// Archive.org
document.getElementById("archiveorg").onclick = function() {
    if (document.getElementById("url").value != "") {
        // Test if it's a URL
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
        // Test if it's a URL
        var test = document.getElementById("url").value;
        if (is_url(test) == true) {
            var url = "http://archive.ph/" + document.getElementById("url").value;
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
        // Test if it's a URL
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

// WebCite
document.getElementById("wikiwix").onclick = function() {
    if (document.getElementById("url").value != "") {
        // Test if it's a URL
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