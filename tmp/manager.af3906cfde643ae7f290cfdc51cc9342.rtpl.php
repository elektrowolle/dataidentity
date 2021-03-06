<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html>
<head>
  <title><?php echo $title;?></title>
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "basicHeaders" );?>

  </head>

<body>
<div data-role="page" id="page" class="container">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/#">Manager</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li id="datasetsLi" class="navTab active">
            <a href="javascript:void(0)" onclick="showDatasets()" role="button">Datasets
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li id="entitiesLi" class="navTab">
            <a href="javascript:void(0)" onclick="showEntities()" role="button">Entities</a>
          </li>
          <li id="attributesLi" class="navTab">
            <a href="javascript:void(0)" onclick="showAttributes()" role="button">Attributes</a>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "inc.datasets" );?>


<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "inc.entities" );?>


<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "inc.attributes" );?>




<script type="text/javascript">
  var api_adrress   = "<?php echo $api_address;?>";
  var restFulLinks  = "<?php echo $restful_links;?>"; 

  var datasetC      = $("#datasets");
  var datasetNav    = $("#datasetsLi");
  var entitiesC     = $("#entities");
  var entitiesNav   = $("#entitiesLi");
  var attributesC   = $("#attributes");
  var attributesNav = $("#attributesLi");
  var navTabs       = $(".navTab");
  
  onload = function (argument) {
    showDatasets();
    initForms();
    $('.hide-on-load').hide();
  }
  
</script>
</body>
</html>
