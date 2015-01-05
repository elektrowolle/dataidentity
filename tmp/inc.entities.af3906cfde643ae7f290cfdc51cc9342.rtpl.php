<?php if(!class_exists('raintpl')){exit;}?><div id="entities">
  <h2>
    Entity Models
    <button role="button" class="btn btn-default glyphicon glyphicon-plus" onclick="$('#newEntityForm').toggle()"></button>
    </h2>
  <form action="<?php echo $api_address;?>/entities/add.json" method="post" class="form-inline apiForm" role="form">
  <input name="api"     type="hidden" value="entities">
  <input name="request" type="hidden" value="changename">
  <input name="output"  type="hidden" value="json">

    <div id="newEntityForm" class="input-group hide-on-load">
      <input name="name" class="form-control" placeholder="new name">
      <span class="input-group-btn">
        <button type="button" class="btn btn-default btn" onclick="$(this).closest('form').submit();">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
      </span>
    </div>
  </form>

  <?php $counter1=-1; if( isset($entities) && is_array($entities) && sizeof($entities) ) foreach( $entities as $key1 => $value1 ){ $counter1++; ?>

  <h3>
  Model: <?php echo $value1->name;?> 
    <div class="btn-group" role="group">
      <button role="button" class="btn btn-default glyphicon glyphicon-refresh" onclick="$('#entitynameform<?php echo $value1->id;?>').toggle()"></button> 
      <button role="button" class="btn btn-default glyphicon glyphicon-minus" onclick="removeModel(this, '<?php echo $value1->id;?>')"></button>
    </div>
  </h3>

  <form action="<?php echo $api_address;?>/entities/changename.json" method="post" class="form-inline apiForm" role="form">
    <input type="hidden" name="id" value="<?php echo $value1->id;?>">
    <input name="api" type="hidden" class="form-control" value="entities">
    <input name="request" type="hidden" class="form-control" value="changename">
    <input name="output" type="hidden" class="form-control" value="json">

    <div id="entitynameform<?php echo $value1->id;?>" class="input-group hide-on-load">
      <input name="name" class="form-control" placeholder="new name">
      <span class="input-group-btn">
        <button type="button" class="btn btn-default btn" onclick="$(this).closest('form').submit();">
          <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
        </button>
      </span>
    </div>
  </form>
  <h4>Attributes</h4>

  <form action="<?php echo $api_address;?>/entities/attribute.json" method="post" class="form-inline apiForm" role="form">
  <input name="api" type="hidden" value="entities">
  <input name="request" type="hidden" value="attribute">
  <input name="output" type="hidden" value="json">

  <input type="hidden" name="id" value="<?php echo $value1->id;?>">
  <input type="hidden" name="operation" value="add">
  <input type="hidden" name="attribute" value="">

    <div class="form-group">
      <div class="input-group">

        <div class="input-group-btn">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">New Attribute<span class="caret"></span></button>
          <ul class="dropdown-menu attribute-selector" role="menu">
            <?php $counter2=-1; if( isset($attributes) && is_array($attributes) && sizeof($attributes) ) foreach( $attributes as $key2 => $value2 ){ $counter2++; ?>

            <li><a href="javascript:void(0)" onclick="selectAttribute($(this), '<?php echo $value2->id;?>', '<?php echo $value2->name;?>')"><?php echo $value2->name;?></a></li>
            <?php } ?>

          </ul>
        </div>
        <span class="input-group-addon">Default Value:</span>
        <input name="defaultValue" class="form-control" placeholder="New default view for attribute">

        <div class="input-group-btn">

          <button type="button" class="btn btn-default" onclick="$(this).parents('form').submit();">
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

<hr>
  <?php } ?>

</div>