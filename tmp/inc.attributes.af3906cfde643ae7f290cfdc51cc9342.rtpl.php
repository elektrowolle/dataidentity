<?php if(!class_exists('raintpl')){exit;}?><div id="attributes">
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