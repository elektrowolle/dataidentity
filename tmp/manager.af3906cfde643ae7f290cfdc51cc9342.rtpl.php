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
        <li id="datasetsLi" class="navTab active"><a href="javascript:void(0)" onclick="showDatasets()" role="button">Datasets <span class="sr-only">(current)</span></a></li>
        <li id="entitiesLi" class="navTab"><a href="javascript:void(0)" onclick="showEntities()" role="button">Entities</a></li>
        <li id="attributesLi" class="navTab"><a href="javascript:void(0)" onclick="showAttributes()" role="button">Attributes</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div id="datasets">
  <h2>Datasets <span class="label label-default" onclick="">add</span></h2>
  <?php $counter1=-1; if( isset($datasets) && is_array($datasets) && sizeof($datasets) ) foreach( $datasets as $key1 => $value1 ){ $counter1++; ?>

  <h3>Entity <?php echo $value1->id;?></h3>
    <?php $counter2=-1; if( isset($value1->data) && is_array($value1->data) && sizeof($value1->data) ) foreach( $value1->data as $key2 => $value2 ){ $counter2++; ?>

      <form action="<?php echo $api_address;?>/arrivals/announce.html" method="post" class="form-inline apiForm" role="form">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><?php echo $value2->attribute->name;?></span>
            <input class="form-control" value="<?php echo $value2->defaultValue;?>">

            <div class="input-group-btn">

                <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                </button>

                <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                </button>
            </div>

          </div>
        </div>
      </form>
    <?php } ?>

  <?php } ?>

</div>

<div id="entities">
  <h2>Entity Models</h2>
  <?php $counter1=-1; if( isset($entities) && is_array($entities) && sizeof($entities) ) foreach( $entities as $key1 => $value1 ){ $counter1++; ?>

  <h3>Model name: <?php echo $value1->name;?> <span class="label label-default" onclick="$('#entitynameform<?php echo $value1->id;?>').show()">change</span></h3>

  <form action="<?php echo $api_address;?>/arrivals/announce.html" method="post" class="form-inline apiForm" role="form">
    <div id="entitynameform<?php echo $value1->id;?>" class="input-group" onload="$('#entitynameform<?php echo $value1->id;?>').hide()">
      
      <input class="form-control" placeholder="new name">
      <span class="input-group-btn">
        <button type="button" class="btn btn-default btn">
          <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
        </button>
      </span>
    </div>
  </form>
  <h4>Attributes</h4>

  <form action="<?php echo $api_address;?>/arrivals/announce.html" method="post" class="form-inline apiForm" role="form">
    <div class="form-group">
      <div class="input-group">

        <div class="input-group-btn">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">New Attribute<span class="caret"></span></button>
          <ul class="dropdown-menu" role="menu">
            <?php $counter2=-1; if( isset($attributes) && is_array($attributes) && sizeof($attributes) ) foreach( $attributes as $key2 => $value2 ){ $counter2++; ?>

            <li><a href="/#"><?php echo $value2->name;?></a></li>
            <?php } ?>

          </ul>
        </div>
        <span class="input-group-addon">Default Value:</span>
        <input class="form-control" placeholder="New default view for attribute">

        <div class="input-group-btn">

          <button type="button" class="btn btn-default">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          </button>
        </div>

      </div>
    </div>
  </form>


    <?php $counter2=-1; if( isset($value1->entityData) && is_array($value1->entityData) && sizeof($value1->entityData) ) foreach( $value1->entityData as $key2 => $value2 ){ $counter2++; ?>

      <form action="<?php echo $api_address;?>/arrivals/announce.html" method="post" class="form-inline apiForm" role="form">
        <div class="form-group">
          <div class="input-group">

            <div class="input-group-btn">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $value2->attribute->name;?> <span class="caret"></span></button>
              <ul class="dropdown-menu" role="menu">
                <?php $counter3=-1; if( isset($attributes) && is_array($attributes) && sizeof($attributes) ) foreach( $attributes as $key3 => $value3 ){ $counter3++; ?>

                <li><a href="/#"><?php echo $value3->name;?></a></li>
                <?php } ?>

              </ul>
            </div>
            <span class="input-group-addon">Default Value:</span>
            <input class="form-control" value="<?php echo $value2->defaultValue;?>">

            <div class="input-group-btn">

                <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                </button>

                <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                </button>
            </div>

          </div>
        </div>
      </form>
    <?php } ?>


  <?php } ?>

</div>

<div id="attributes">
  <h2>Attributes</h2>
  <form action="<?php echo $api_address;?>/arrivals/announce.html" method="post" class="form-inline apiForm" role="form">
    <div class="form-group">
      <div class="input-group">
        <input class="form-control" placeholder="New Name">

        <div class="input-group-btn">

          <button type="button" class="btn btn-default">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          </button>

        </div>
      </div>
    </div>
  </form>

  <?php $counter1=-1; if( isset($attributes) && is_array($attributes) && sizeof($attributes) ) foreach( $attributes as $key1 => $value1 ){ $counter1++; ?>

    <form action="<?php echo $api_address;?>/arrivals/announce.html" method="post" class="form-inline apiForm" role="form">
      <div class="form-group">
        <div class="input-group">
          <input class="form-control" value="<?php echo $value1->name;?>">

          <div class="input-group-btn">

            <button type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
            </button>

            <button type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
            </button>
          </div>
        </div>
      </div>
    </form>
  <?php } ?>

</div>



<script type="text/javascript">
  var datasetC      = $("#datasets");
  var datasetNav    = $("#datasetsLi");
  var entitiesC     = $("#entities");
  var entitiesNav   = $("#entitiesLi");
  var attributesC   = $("#attributes");
  var attributesNav = $("#attributesLi");
  var navTabs       = $(".navTab");
  
  onload = function (argument) {
    showDatasets();
  }

  showDatasets = function (argument) {
    datasetC.show();
    entitiesC.hide();
    attributesC.hide();
    navTabs.removeClass("active");
    datasetNav.addClass("active");
  }
  showEntities = function (argument) {
    datasetC.hide();
    entitiesC.show();
    attributesC.hide();
    navTabs.removeClass("active");
    entitiesNav.addClass("active");
  }
  showAttributes = function (argument) {
    datasetC.hide();
    entitiesC.hide();
    attributesC.show();
    navTabs.removeClass("active");
    attributesNav.addClass("active");
  }
</script>
</body>
</html>