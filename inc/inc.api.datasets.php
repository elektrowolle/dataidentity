<?php
/**
* 
*/
class DatasetsApi extends apiModule
{
  
  function __construct($args = array('' => '')) {
      parent::__construct($args);
      $this->template = 'api';
  }

  public function defaultApi($value) {

  }

  public function all($value='')
  {
    $datasets = Dataset::getAll();
    $datasetArrays = array();

    foreach ($datasets as $key => $dataset) {
      $datasetArrays[] = $dataset->asArray();
    }
    $this->setContent('datasets', $datasetArrays);
  }

  public function changeName($args)
  {
    error_log(print_r($args, true));
    $dataset = new Entity($args["id"]);
    $dataset->name = $args["name"];

    $dataset->save();

    $this->setContent('dataset', $dataset->asArray());
  }

  public function add($value='')
  {
    $entity  = new Entity($value["entity"]);
    $dataset = $entity->makeNewDataset();
    $dataset->save();

    $this->setContent('dataset', $dataset->asArray());
  }

  public function delete($value='')
  {
    $dataset = new Dataset($value["id"]);
    $dataset->delete();

    $this->setContent('empty', 'empty');
  }


  public function changeValue($value='')
  {
    $dataset = new Dataset($value['id']);
    $data = $dataset->data[$value['data']];
    
    $data->value = $value['value'];
    $data->save();

    $this->setContent('data', $data->asArray());
  }
}

API::registerApi('DatasetsApi', 'datasets');
?>