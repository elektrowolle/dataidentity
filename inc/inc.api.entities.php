<?php
  /**
  * 
  */
  class EntitiesApi extends apiModule
  {
    
    function __construct($args = array('' => '')) {
        parent::__construct($args);
        $this->template = 'api';
    }

    public function defaultApi($value) {

    }

    public function changeName($args)
    {
      error_log(print_r($args, true));
      $entity = new Entity($args["id"]);
      $entity->name = $args["name"];

      $entity->save();

      $this->setContent('entity', $entity->asArray());
    }

    public function add($value='')
    {
      $entity = new Entity(null);
      $entity->name = $value["name"];
      $entity->save();

      $this->setContent('entity', $entity->asArray());
    }

    public function delete($value='')
    {
      $entity = new Entity($value["id"]);
      $entity->delete();

      $this->setContent('empty', 'empty');
    }

    public function attribute($value='')
    {
      $entity = new Entity($value["id"]);

      switch ($value["operation"]) {
        case 'add':
          $this->addAttribute($entity, $value);
          break;

        case 'defaultValue':
          $this->attributeDefaultValue($entity, $value);
          break;

        case 'delete':
          $this->deleteAttribute($entity, $value);
          break;
        
        default:
          # code...
          break;
      }
      $this->setContent('entity', $entity->asArray());
      error_log(print_r($entity->asArray(),true));
    }

    private function addAttribute($entity, $value='')
    {
      $newAttribute = $entity->addAttribute(
            $value["attribute"],
            $value["defaultValue"]
            );

      $this->setContent('attribute', $newAttribute->asArray());
    }
    private function attributeDefaultValue($entity, $value='')
    {
      $entityData = $entity->entityData[$value['attribute']];
      $entityData->defaultValue = $value['value'];
      $entityData->save();

      $this->setContent('attribute', $entityData->asArray());
    }
    private function deleteAttribute($entity, $value='')
    {
      $entityData = $entity->entityData[$value['attribute']];
      $entityData->delete();
    }
  }

  API::registerApi('EntitiesApi', 'entities');
?>