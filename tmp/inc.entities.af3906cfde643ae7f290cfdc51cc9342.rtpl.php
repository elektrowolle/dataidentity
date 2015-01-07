<?php if(!class_exists('raintpl')){exit;}?><div id="entities">
  <h2>
    Entity Models
    <button role="button" class="btn btn-default glyphicon glyphicon-plus" onclick="$('#newEntityForm').toggle()"></button>
  </h2>
  <form action="<?php echo $api_address;?>/entities/add.json" method="post" class="form-inline apiForm" role="form">
    <div id="newEntityForm" class="input-group hide-on-load">
      <input name="name" class="form-control" placeholder="new name">
      <span class="input-group-btn">
        <button type="button" class="btn btn-default btn" onclick="addModel(this)">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
      </span>
    </div>
  </form>
  <div id="modelList">
  </div>
</div>

<template id="modelCTemplate">
  <div class="modelC"> 
    <h3>
      Model: <span class="modelName"></span>
      <div class="btn-group" role="group">
        <button role="button" class="btn btn-default glyphicon glyphicon-refresh changeNameButton"></button> 
        <button role="button" class="btn btn-default glyphicon glyphicon-minus removeModelButton"></button>
      </div>
    </h3>

    <form action="<?php echo $api_address;?>/entities/changename.json" method="post" class="form-inline apiForm" role="form">
      <input type="hidden" name="modelId" value="">
      <div class="input-group hide-on-load entitynameformDiv">
        <input name="name" class="form-control" placeholder="new name">
        
        <span class="input-group-btn">
          <button type="button" class="btn btn-default btn" onclick="changeModelName(this)">
            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
          </button>
        </span>
      </div>
    </form>

    <div class="modelAttributes">
      <h4>Attributes</h4>
      <form action="<?php echo $api_address;?>/entities/attribute.json" method="post" class="form-inline apiForm" role="form">
      <input type="hidden" name="attributeId" value="">
      <input type="hidden" name="modelId" value="">

        <div class="form-group">
          <div class="input-group">

            <div class="input-group-btn">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">New Attribute<span class="caret"></span></button>
              <ul class="dropdown-menu attribute-selector" role="menu">
                
                <?php $counter1=-1; if( isset($attributes) && is_array($attributes) && sizeof($attributes) ) foreach( $attributes as $key1 => $value1 ){ $counter1++; ?>

                <li class="modellAttributeSelector<?php echo $value1->id;?>"><a href="javascript:void(0)" onclick="selectAttribute($(this), '<?php echo $value1->id;?>', '<?php echo $value1->name;?>')" class="attributeName<?php echo $value1->id;?>"><?php echo $value1->name;?></a></li>
                <?php } ?>


              </ul>
            </div>
            <span class="input-group-addon">Default Value:</span>
            <input name="modelAttributeDefaultValue" class="form-control" placeholder="New default view for attribute">

            <div class="input-group-btn">

              <button type="button" class="btn btn-default addAtributeButton" onclick="addAttributeToEntity(this)">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              </button>
            </div>

          </div>
        </div>
      </form>
      <div class="modelAttributeList">
      </div> <!-- .modellAttributeList -->
    </div> <!-- .modelAttributes -->
    <hr>
  </div>
</template>

<template id="modelAttributeSelectorElementTemplate">
  <li><a href="javascript:void(0)" onclick="selectAttribute($(this), 'id', 'name')">name</a></li>
</template>

<template id="modelAttributeTemplate">
  <div class="modelAttributeC">
    <form action="<?php echo $api_address;?>/arrivals/announce.html" method="post" class="form-inline apiForm" role="form">
      <input type="hidden" name="attributeId" value="">
      <input type="hidden" name="modelId" value="">
      <div class="form-group">
        <div class="input-group">

          <span class="input-group-addon modelAttributeName"></span>
          <span class="input-group-addon">Default Value:</span>
          <input name="value" class="form-control modelAttributeDefaultValue" value="">

          <div class="input-group-btn">

            <button type="button" class="btn btn-default modelAttributeChangeValueButton" onclick="changeAttributeValue(this);">
            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
            </button>

            <button type="button" class="btn btn-default modelAttributeRemoveButton" onclick="removeModelAttribute(this);">
            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
            </button>
          </div> <!-- .input-group-btn -->
        </div> <!-- .input-group -->
      </div> <!-- .form-group -->
    </form>
  </div><!-- .modelAttributeC -->
</template>

<script type="text/javascript">
  var $modelCTemplate = $($('#modelCTemplate').html());

  removeModel = function(element, id) {
    var $element = $(element);
    var args = {'id': id};
    apiRequest('entities', 'delete', 'json', args).done(function() {
      $element.parents('.modelC').remove();
    });
  };

  changeModelName = function(element) {
    var $element = $(element);
    var $form    = $element.parents('form');
    var name     = $form.find('input[name=name]').val();
    var id       = $form.find('input[name=modelId]').val();

    var args = {'id': id, 'name': name};

    apiRequest('entities', 'changename', 'json', args).done(function(data) {
      var entity = data.entity;
      $element.parents('.modelC').find('.modelName').html(entity.name);
    });
  };

  changeAttributeValue = function(element) {
    var $element     = $(element);
    var $form        = $element.parents('form');
    var modelId      = $form.find('input[name=modelId]')    .val();
    var attributeId  = $form.find('input[name=attributeId]').val();
    var defaultValue = $form.find('input[name=value]')      .val();

    var args = {
              'id'       : modelId, 
              'attribute': attributeId,
              'value'    : defaultValue,
              'operation': 'defaultValue'
            };

    apiRequest('entities', 'attribute', 'json', args).done(function(data) {
      var attribute = data.attribute;
      $element.parents('.attributeC').find('.modelAttributeDefaultValue').html(attribute.value);
    });
  };

  removeModelAttribute = function(element) {
    var $element     = $(element);
    var $form        = $element.parents('form');
    var modelId      = $form.find('input[name=modelId]')    .val();
    var attributeId  = $form.find('input[name=attributeId]').val();
    var defaultValue = $form.find('input[name=value]')      .val();

    var args = {
              'id'       : modelId, 
              'attribute': attributeId,
              'operation': 'delete'
            };

    apiRequest('entities', 'attribute', 'json', args).done(function(data) {
      $element.parents('.modelAttributeC').remove();
    });
  };

  addModel = function(element) {
    var $element  = $(element);
    
    var name = $element.parents('form').find('input[name=name]').val();
    var args = {'name': name};

    apiRequest('entities', 'add', 'json', args).done(function(data) {
      var entity = data.entity;
      appendModel(entity);
    });
  };

  addAttributeToEntity = function(element) {
    var $element       = $(element);
    var $attributeList = $element.parents('.modelAttributes').find(".modelAttributeList");
    var $form          = $element.parents('form');

    var attributeId  = $form.find('input[name=attributeId]').val();
    var entityId     = $form.find('input[name=modelId]').val();
    var defaultValue = $form.find('input[name=modelAttributeDefaultValue]').val();

    var args        = {
                        'attribute'   : attributeId, 
                        'id'          : entityId, 
                        'defaultValue': defaultValue, 
                        'operation'   : 'add'
                      };

    apiRequest('entities', 'attribute', 'json', args).done(function(data) {
      var attribute = data.attribute;
      var entity    = data.entity;
      appendModelAttribute($attributeList, entity, attribute);
    });
  };

  appendModel = function(entity){
    var $list          = $('#modelList');
    var $template      = $modelCTemplate.clone();
    var $attributeList = $template.find(".modelAttributeList");

    $template.find('input[name=modelId]').val(entity.id);
    $template.find('.modelName')         .html(entity.name);
    $template.find('.entitynameformDiv') .attr('id', 'entitynameform' + entity.id).hide();
    $template.find('.changeNameButton')  .attr('onclick', "$('#entitynameform" + entity.id + "').toggle()");
    $template.find('.removeModelButton') .attr('onclick', 'removeModel(this, ' + entity.id + ')');


    for(var attribute in entity.attributes){
      appendModelAttribute($attributeList, entity, entity.attributes[attribute]);
    }

    $template.appendTo($list);
  }

  appendModelAttribute = function($attributeList, entity, attribute){
    var $template = $($('#modelAttributeTemplate').html().trim());

    $template.find('input[name=modelId]')        .val (entity.id);
    $template.find('input[name=attributeId]')    .val (attribute.id);
    $template.find('.modelAttributeName')        .html(attribute.name);
    $template.find('.modelAttributeDefaultValue').val (attribute.defaultValue);

    $template.appendTo($attributeList);
  }

  selectAttribute = function (element, id, name) {
    element.parents('form').children('input[name=attributeId]').attr('value', id);
    element.parents('.input-group-btn').children('button').html(name);
  }

  showEntities = function (argument) {
    $('.modelC').remove();

    datasetC.hide();
    entitiesC.show();
    attributesC.hide();

    navTabs.removeClass("active");
    entitiesNav.addClass("active");

    apiRequest('entities', 'all', 'json').done(function(data){
      entities = data.entities;
      for(var entity in entities){
        appendModel(entities[entity]);
      }
    });
    
  }

</script>
