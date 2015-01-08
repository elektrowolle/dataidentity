<?php
  /**
  * 
  */
  class AttributesApi extends apiModule
  {
    
    function __construct($args = array('' => '')) {
        parent::__construct($args);
        $this->template = 'api';
    }

    public function defaultApi($value) {

    }

    public function all($value='')
    {
      $attributes = Attribute::getAll();
      $attributeArrays = array();

      foreach ($attributes as $key => $attribute) {
        $attributeArrays[] = $attribute->asArray();
      }
      if(isDebug())error_log(print_r($attributeArrays, true));
      $this->setContent('attributes', $attributeArrays);
    }

    public function changeName($args)
    {
      if(isDebug())error_log("changeName");
      if(isDebug())error_log(print_r($args, true));
      $attribute = new Attribute($args["id"]);
      $attribute->name = $args["name"];

      $attribute->save();

      $this->setContent('attribute', $attribute->asArray());
    }

    public function add($value='')
    {
      $attribute = new Attribute(null);
      $attribute->name = $value["name"];
      $attribute->save();

      $this->setContent('attribute', $attribute->asArray());
    }

    public function delete($value='')
    {
      $attribute = new Attribute($value["id"]);
      $attribute->delete();

      $this->setContent('empty', 'empty');
    }

  }

  API::registerApi('AttributesApi', 'attributes');
?>