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
    if (document.getElementById("address").value != "") {
        var test = document.getElementById("address").value;
        if (is_url(test) == true) {
            var url = "http://webcache.googleusercontent.com/search?q=cache:" + document.getElementById("address").value;
            window.open(url);
        } else {
            $('#InvalidUrl').modal('show');
        }
    } else {
        $('#NoUrl').modal('show');
    }
}

// Archive.org
document.getElementById("archiveorg").onclick = function() {
    if (document.getElementById("address").value != "") {
        var test = document.getElementById("address").value;
        if (is_url(test) == true) {
            var url = "https://web.archive.org/web/" + document.getElementById("address").value;
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
    if (document.getElementById("address").value != "") {
        var test = document.getElementById("address").value;
        if (is_url(test) == true) {
            var url = "http://archive.today/" + document.getElementById("address").value;
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
    if (document.getElementById("address").value != "") {
        var test = document.getElementById("address").value;
        if (is_url(test) == true) {
            var url = "http://www.webcitation.org/query?url=" + document.getElementById("address").value;
            window.open(url);
        } else {
            $('#InvalidUrl').modal('show');
        }
    } else {
        $('#NoUrl').modal('show');
    }
}