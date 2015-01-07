<?php if(!class_exists('raintpl')){exit;}?><div id="datasets">
  <h2>
    Datasets
  </h2>
  <form action="<?php echo $api_address;?>/dataset/add.json" method="post" class="form-inline apiForm" role="form">
    <input type="hidden" name="entity">
    <div class="input-group">
      <div class="input-group-btn">
        <div class="form-group">
          <button id="datasetEntitySelector" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <span id="newDatasetEntityName">New Dataset Entity</span>
            <span class="caret"></span>
          </button>
          
          <ul id="newDatasetEntityList" class="dropdown-menu" role="menu">
            <template id="newDatasetEntityListETemplate">  
              <li class="newDatasetEntityListE">
                <a href="javascript:void(0)" class="newDatasetEntityListEName"></a>
              </li>
            </template>
          </ul>
        </div>
      </div>
    </div>
    <button type="button" class="btn btn-primary" onclick="addDataset(this)">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </button>
  </form>
  
  <div id="datasetList">
    <template id="datasetCTemplate">
      <div class="datasetC">
        <h3>
          Set Type: <span class="datasetEntityName"></span>
          <div class="btn-group" role="group">
            <button role="button" class="btn btn-default glyphicon glyphicon-minus removeModelButton removeDatasetButton"></button> 
          </div>
        </h3>
        <div class="datasetDataList">
          
        </div> <!-- .datasetDataList -->
      </div> <!-- .datasetC -->
    </template>
  </div> <!-- #datasetList -->
</div> <!-- #datasets -->


<template id="datasetDataCTemplate">
    <div class="datasetDataC">
      <form action="<?php echo $api_address;?>/dataset/updateData.json" method="post" class="form-inline apiForm" role="form">
      <input name="id"     type="hidden">
      <input name="dataset" type="hidden">
        <div class="form-group">
          <div class="input-group">
          
            <span class="input-group-addon datasetDataName"></span>
            <input name="value" class="form-control datasetDataValue">
            

            <div class="input-group-btn">

              <button type="button" class="btn btn-default datasetUpdateDataButton" onclick="datasetUpdateDate(this)">
                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
              </button>

            </div> <!-- .input-group-btn -->
          </div> <!-- .input-group -->
        </div> <!-- .form-group -->
      </form>
    </div> <!-- .datasetDataC -->
  </template>

<script type="text/javascript">
  addDataset = function(element) {
    var $element  = $(element);
    
    var entity = $element.parents('form').find('input[name=entity]').val();
    var args   = {'entity': entity};

    apiRequest('datasets', 'add', 'json', args).done(function(data) {
      var dataset = data.dataset;
      appendDataset(dataset);
    });
  };

  removeDataset = function(element, id) {
    var $element = $(element);
    var args = {'id': id};
    apiRequest('datasets', 'delete', 'json', args).done(function() {
      $element.parents('.datasetC').remove();
    });
  };

  appendDataset = function(dataset){
    var $list     = $('#datasetList');
    var $template = $($('#datasetCTemplate').html().trim());
    var $dataList = $template.find(".datasetDataList");

    $template.find('.datasetEntityName')  .html(dataset.entity.name);
    $template.find('.removeDatasetButton').attr('onclick', 'removeDataset(this, ' + dataset.id + ')');


    for(var data in dataset.data){
      appendDatasetData(dataset.data[data], $dataList);
    }

    $template.appendTo($list);
  }

  appendDatasetData = function(datasetData, $list){
    var $template = $($('#datasetDataCTemplate').html().trim());

    $template.find('.datasetDataName')   .html(datasetData.name   );
    $template.find('.datasetDataValue')  .val (datasetData.value  );
    $template.find('input[name=dataset]').val (datasetData.dataset);
    $template.find('input[name=id]')     .val (datasetData.id     );

    $template.appendTo($list);
  }

  datasetUpdateDate = function(element) {
    var $element = $(element);
    var $form    = $element.parents('form');

    var dataset = $form.find('input[name=dataset]').val();
    var id      = $form.find('input[name=id]')     .val();
    var value   = $form.find('input[name=value]')     .val();
 
    var args = {
              'id'   : dataset, 
              'data' : id,
              'value': value
            };

    apiRequest('datasets', 'changeValue', 'json', args).done(function(data) {

    });
  };

  function selectDatasetEntity (element, id, name) {
    $element = $(element);
    $form = $element.parents('form');
    $form.find('input[name=entity]')   .val (id);
    $form.find('#newDatasetEntityName').html(name);
  }

  function getAllnewDatasetEntityListE() {
    var $template = $($("#newDatasetEntityListETemplate").html());
    $(".newDatasetEntityListE").remove();
    apiRequest("entities", "all", "json").done(function(data) {
      for (var entityI in data.entities) {
          var entity = data.entities[entityI];
          var $newElement = $template.clone();
          // $newElement.find("input[name=entity]").val(entity.id);
          $newElement.find(".newDatasetEntityListEName")
            .html(entity.name)
            .attr('onclick', "selectDatasetEntity(this, '" + entity.id + "', '" + entity.name + "')");
          $newElement.appendTo($("#newDatasetEntityList"));
      }
    });
  }

  showDatasets = function (argument) {
    datasetC.show();
    entitiesC.hide();
    attributesC.hide();

    navTabs.removeClass("active");
    datasetNav.addClass("active");
    
    $('.datasetC').remove();

    apiRequest('datasets', 'all').done(function(data) {
      var datasets = data.datasets;

      for(var dataset in datasets){
        appendDataset(datasets[dataset]);
      }
    });

    getAllnewDatasetEntityListE();
    
  }
</script>