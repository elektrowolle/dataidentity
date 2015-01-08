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
    <h1>Dataidentity</h1>
    <h2>Resource</h2>
    <div class="datasetC">
      <h3>
        <span class="datasetEntityName"><?php echo $dataset->entity->name;?></span>
      </h3>
      <div class="datasetDataList">
        <?php $counter1=-1; if( isset($dataset->data) && is_array($dataset->data) && sizeof($dataset->data) ) foreach( $dataset->data as $key1 => $value1 ){ $counter1++; ?>

          <div class="datasetDataC">
            <form action="<?php echo $api_address;?>/dataset/updateData.json" method="post" class="form-inline apiForm" role="form">
              <input name="dataset"      type="hidden" value="<?php echo $dataset->id;?>">
              <input name="id" type="hidden" value="<?php echo $value1->id;?>">
              <div class="form-group">
                <div class="input-group">
                
                  <span class="input-group-addon datasetDataName"><?php echo $value1->attribute->name;?></span>
                  <input name="value" class="form-control datasetDataValue" value="<?php echo $value1->value;?>">
                  
                  <div class="input-group-btn">

                    <button type="button" class="btn btn-default datasetUpdateDataButton" onclick="datasetUpdateDate(this)">
                      <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                    </button>

                  </div> <!-- .input-group-btn -->
                </div> <!-- .input-group -->
              </div> <!-- .form-group -->
            </form>
          </div> <!-- .datasetDataC -->
        <?php } ?>

      </div> <!-- .datasetDataList -->
    </div> <!-- .datasetC -->
  </div>
  <script type="text/javascript">
    var api_adrress   = "<?php echo $api_address;?>";
    var restFulLinks  = "<?php echo $restful_links;?>";

    datasetUpdateDate = function(element) {
      var $element = $(element);
      var $form    = $element.parents('form');

      $element.addClass('btn-warning');

      var dataset = $form.find('input[name=dataset]').val();
      var id      = $form.find('input[name=id]')     .val();
      var value   = $form.find('input[name=value]')     .val();
   
      var args = {
                'id'   : dataset, 
                'data' : id,
                'value': value
              };

      apiRequest('datasets', 'changeValue', 'json', args).done(function(data) {
        $element.removeClass('btn-warning');
      });
    };
  </script>
</body>
</html>
