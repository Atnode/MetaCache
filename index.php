<?php
   $lc = ""; 
   if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
   	$lc = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
   if($lc == "fr"){
   	$lang = "fr";
	$description = "MetaCache est l'outil le plus simple pour trouver les versions mises en cache d'une page Web spécifique.";
   } else if($lc == "en"){
   	$lang = "en";
	$description = "MetaCache is the easiest way to find cached versions of a specific web page.";
   }
   else{
   	$lang = "en";
   }
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
<meta charset="utf-8" />
	<title>MetaCache</title>
	<link rel="shortcut icon" href="img/logo.png">
    <meta name="description" content="<?php echo $description; ?>" />
	<meta property="og:title" content="MetaCache" />
	<meta property="og:image" content="img/logo.png" />
    <meta property="og:description" content="<?php echo $description; ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand navbar-brand-centered"> <i class="fas fa-save"></i> MetaCache</a>
            </div>

        </div>
    </nav>

    <div class="container">

        <div style="float:right;">
            <p><b class="fas fa-save" style="font-size: 100px;" aria-hidden="true"></b></p>
        </div>

        <div class="jumbotron">

            <h1 id="ml-title"></h1>
            <p id="ml-desc"></p>
        </div>

        <div class="center">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">http(s)://</span>
                <input type="text" class="form-control" name="address" id="address" placeholder="URL..." autofocus="autofocus" autocomplete="off" aria-describedby="basic-addon1">
            </div><br/>
            <div class="row">
                <button type="button" class="btn btn-default" id="googlecache"><i class="fab fa-google"></i> Google Cache</button>
                <button type="button" class="btn btn-default" id="archiveorg"><i class="fas fa-archive"></i> Archive.org</button>
                <div class="hidden-lg"><br/></div>
                <button type="button" class="btn btn-default" id="archivetoday"><i class="fas fa-archive"></i> Archive.today</button>
                <button type="button" class="btn btn-default" id="webcite"><i class="fas fa-globe"></i> WebCite</button>
            </div>
        </div>
    </div>
    </div>
    <br/>
    <footer class="footer">
        <div class="container">
            <span class="text-muted text-white" id="ml-footer"></span>
        </div>
    </footer>

    <div id="NoUrl" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="ml-modal-nourl-title"></h4>
                </div>
                <div class="modal-body">
                    <p id="ml-modal-nourl-text"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="ml-modal-nourl-btnclose"></button>
                </div>
            </div>

        </div>
    </div>

    <div id="InvalidUrl" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="ml-modal-invalidurl-title"></h4>
                </div>
                <div class="modal-body">
                    <p id="ml-modal-invalidurl-text"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="ml-modal-invalidurl-btnclose"></button>
                </div>
            </div>

        </div>
    </div>

</body>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.MultiLanguage.min.js"></script>
<script>
    $(document).ready(function() {
    		$('a').tooltip('hide');
					$.MultiLanguage('lang/metacache.json', '<?php echo $lang; ?>')
    	});
</script>
<script src="js/metacache.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

</html>