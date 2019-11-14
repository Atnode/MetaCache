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
				<a class="navbar-brand navbar-brand-centered"><i class="fas fa-save"></i> MetaCache</a>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="jswarning" style="float:right;">
			<p><b aria-hidden="true" class="fa fa-exclamation-triangle" style="font-size: 100px;"></b></p>
		</div>
		<div class="jumbotron jswarning">
			<h1>We are sorry, yet MetaCache needs JavaScript support to work.</h1>
			<p>Nous sommes désolé, mais MetaCache a besoin que le support de JavaScript soit activé pour fonctionner.</p>
		</div>
		<div class="main">
			<div style="float:right;">
				<p><b aria-hidden="true" class="fas fa-save" style="font-size: 100px;"></b></p>
			</div>
			<div class="jumbotron">
				<h1 id="ml-title"></h1>
				<p id="ml-desc"></p>
			</div>
			<div class="center">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">http(s)://</span> <input aria-describedby="basic-addon1" autocomplete="off" autofocus="autofocus" class="form-control" id="url" name="address" placeholder="URL..." type="text">
				</div><br>
				<div class="row">
					<button class="btn btn-default" id="googlecache" type="button"><i class="fab fa-google"></i> Google Cache</button> <button class="btn btn-default" id="archiveorg" type="button"><i class="fas fa-archive"></i> Archive.org</button> <button class="btn btn-default" id="archivetoday" type="button"><i class="fas fa-archive"></i> Archive.today</button> <button class="btn btn-default" id="webcite" type="button"><i class="fas fa-globe"></i> WebCite</button>
				</div>
			</div>
		</div>
	</div><br>
	<footer class="footer">
		<div class="container">
			<span class="text-muted text-white" id="ml-footer"></span>
		</div>
	</footer>
	<div class="modal fade" id="NoUrl" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal" type="button">&times;</button>
					<h4 class="modal-title" id="ml-modal-nourl-title"></h4>
				</div>
				<div class="modal-body">
					<p id="ml-modal-nourl-text"></p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal" id="ml-modal-nourl-btnclose" type="button"></button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="InvalidUrl" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal" type="button">&times;</button>
					<h4 class="modal-title" id="ml-modal-invalidurl-title"></h4>
				</div>
				<div class="modal-body">
					<p id="ml-modal-invalidurl-text"></p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal" id="ml-modal-invalidurl-btnclose" type="button"></button>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.MultiLanguage.min.js"></script>
<script>
    $('div.jswarning').css('display','none');
    $('div.main').css('visibility','visible');
    $(document).ready(function() {
    		$('a').tooltip('hide');
					$.MultiLanguage('lang/metacache.json', '<?php echo $lang; ?>')
    	});
</script>
<script src="js/metacache.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

</html>