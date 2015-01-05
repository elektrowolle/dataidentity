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

      $this->setContent('entity', $entity);
    }

    public function attribute($value='')
    {
      $entity = new Entity($value["id"]);

      switch ($value["operation"]) {
        case 'add':
          $this->addAtribute($entity, $value);
          break;

        case 'defaultValue':
          $this->addAtribute($entity, $value);
          break;

        case 'removeValue()':
          $this->addAtribute($entity, $value);
          break;
        
        default:
          # code...
          break;
      }
      $this->setContent('entity', $entity->asArray());
      error_log(print_r($entity->asArray(),true));
    }

    public function addAtribute($entity, $value='')
    {
      $entity->addAttribute(
            $value["attribute"],
            $value["defaultValue"]
            );
    }
  }

  API::registerApi('EntitiesApi', 'entities');
?>