<?php
  $ver = "1.2.0";
  require_once('lang/class.translation.php');
  $lc = ""; 
  if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    $lc = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if($lc == "fr"){
      $lang = "fr";
      $description = "MetaCache est l'outil le plus simple pour trouver les versions mises en cache d'une page Web spécifique.";
    } else if($lc == "en") {
      $lang = "en";
      $description = "MetaCache is the easiest way to find cached versions of a specific web page.";
    }
    else {
      $lang = "en";
      $description = "MetaCache is the easiest way to find cached versions of a specific web page.";
    }
    $translate = new Translator($lang);
  }
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
  <meta charset="utf-8">
  <title>MetaCache</title>
  <link href="img/logo.png" rel="shortcut icon">
  <meta content="<?php echo $description; ?>" name="description">
  <meta content="MetaCache" property="og:title">
  <meta content="img/logo.png" property="og:image">
  <meta content="<?php echo $description; ?>" property="og:description">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/fork-awesome.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top gradient">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand navbar-brand-centered"><i class="fa fa-save"></i> MetaCache</a>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="jswarning" style="float:right;">
      <p><b aria-hidden="true" class="fa fa-exclamation-triangle" style="font-size: 100px;"></b></p>
    </div>
    <div class="jumbotron jswarning">
      <h1><?php $translate->__('We are sorry, yet MetaCache needs JavaScript support to work.'); ?></h1>
    </div>
    <div class="main">
      <div style="float:right;">
        <p><b aria-hidden="true" class="fa fa-save" style="font-size: 100px;"></b></p>
      </div>
      <div class="jumbotron">
        <h1><?php $translate->__('Welcome to MetaCache'); ?></h1>
        <p><?php $translate->__('MetaCache is the easiest way to find cached versions of a specific web page.'); ?><br>
        <?php $translate->__('It can find the latest available copy in Google’s web cache or AMP cache, in the Wayback Machine, in Archive.today, in WebCite or in the Wikiwix cache.'); ?></p>
      </div>
      <div class="center">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">http(s)://</span> <input aria-describedby="basic-addon1" autocomplete="off" autofocus="autofocus" class="form-control" id="url" name="address" placeholder="<?php $translate->__('Your URL...'); ?>" type="text">
        </div><br>
        <h3><?php $translate->__('Search for a cached version with:'); ?></h3><br>
        <div class="row">
          <button class="btn btn-default" id="googlecache" type="button"><i class="fa fa-google"></i> <?php $translate->__('Google Cache'); ?></button> <button class="btn btn-default" id="googleamp" type="button"><i class="fa fa-google"></i> <?php $translate->__('Google AMP Cache'); ?></button> <button class="btn btn-default" id="archiveorg" type="button"><i class="fa fa-archive-org"></i> <?php $translate->__('Wayback Machine'); ?></button> <button class="btn btn-default" id="archivetoday" type="button"><i class="fa fa-archive"></i> <?php $translate->__('Archive.today'); ?></button> <button class="btn btn-default" id="webcite" type="button"><i class="fa fa-globe"></i> <?php $translate->__('WebCite'); ?></button> <button class="btn btn-default" id="wikiwix" type="button"><i class="fa fa-wikipedia-w"></i> <?php $translate->__('Wikiwix’s cache'); ?></button>
        </div>
      </div>
    </div>
  </div><br>
  <footer class="footer gradient">
    <div class="container">
      <span class="text-muted text-white">MetaCache <?php echo $ver; ?> - <a class='text-muted' href='https://github.com/Atnode/MetaCache' style='color: #ffffff; text-decoration: none;'><?php $translate->__('Source code available on'); ?> <i class='fa fa-github'></i> GitHub</a></span>
    </div>
  </footer>
  <div class="modal fade" id="NoUrl" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal" type="button">&times;</button>
          <h4 class="modal-title"><i class='fa fa-exclamation-triangle'></i> <?php $translate->__('Oops...'); ?></h4>
        </div>
        <div class="modal-body">
          <p><?php $translate->__('You must enter an address.'); ?></p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" type="button"><?php $translate->__('Fermer'); ?></button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="InvalidUrl" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal" type="button">&times;</button>
          <h4 class="modal-title"><i class='fa fa-exclamation-triangle'></i> <?php $translate->__('Oops...'); ?></h4>
        </div>
        <div class="modal-body">
          <p><?php $translate->__('Your address is not valid.'); ?></p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" type="button"><?php $translate->__('Fermer'); ?></button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="NoAMP" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal" type="button">&times;</button>
          <h4 class="modal-title"><i class='fa fa-exclamation-triangle'></i> <?php $translate->__('Oops...'); ?></h4>
        </div>
        <div class="modal-body">
          <p><?php $translate->__('An AMP version of this page is not available.'); ?></p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" type="button"><?php $translate->__('Fermer'); ?></button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="ErrorAMP" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal" type="button">&times;</button>
          <h4 class="modal-title">Google AMP Cache</h4>
        </div>
        <div class="modal-body">
          <p><?php $translate->__('Unable to load this URL.'); ?></p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" type="button"><?php $translate->__('Fermer'); ?></button>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery.min.js" type="text/javascript">
  </script> 
  <script>
    $('div.jswarning').css('display','none');
    $('div.main').css('visibility','visible');
    $(document).ready(function() {
      $('a').tooltip('hide');
    });
  </script> 
  <script src="js/metacache.js" type="text/javascript"></script> 
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>