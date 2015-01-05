<?php if(!class_exists('raintpl')){exit;}?><div id="datasets">
  <h2>Datasets <span class="label label-default" onclick="">add</span></h2>
  <?php $counter1=-1; if( isset($datasets) && is_array($datasets) && sizeof($datasets) ) foreach( $datasets as $key1 => $value1 ){ $counter1++; ?>

  <h3>Entity <?php echo $value1->id;?></h3>
    <?php $counter2=-1; if( isset($value1->data) && is_array($value1->data) && sizeof($value1->data) ) foreach( $value1->data as $key2 => $value2 ){ $counter2++; ?>

      <form action="<?php echo $api_address;?>/arrivals/announce.html" method="post" class="form-inline apiForm" role="form">
      <input name="api" type="hidden" class="form-control" value="arrivals">
      <input name="request" type="hidden" class="form-control" value="announce">
      <input name="output" type="hidden" class="form-control" value="html">
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