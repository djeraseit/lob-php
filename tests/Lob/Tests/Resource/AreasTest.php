<?php

namespace Lob\Tests\Resource;

use Lob\Tests\Resource\AddressesTest;

class AreasTest extends \Lob\Tests\ResourceTest
{
  protected $resourceMethodName = 'areas';

  public function testCreateWithSuccess()
  {
     $area = $this->resource->create(array(
        'name' => 'Demo Area',
        'to' => AddressesTest::$validCreateData,
        'front' => 'https://assets.lob.com/sam_back_template.pdf',
        'back' => 'https://assets.lob.com/sam_back_template.pdf',
        'routes' => '94158-C001',
        'target_type' => 'all',
      ));

     $this->assertTrue(is_array($area));
     $this->assertTrue(array_key_exists('id', $area));
  }

  public function testGet()
  {
     $area = $this->resource->create(array(
        'name' => 'Demo Area',
        'to' => AddressesTest::$validCreateData,
        'front' => 'https://assets.lob.com/sam_back_template.pdf',
        'back' => 'https://assets.lob.com/sam_back_template.pdf',
        'routes' => '94158-C001',
        'target_type' => 'all',
        'name' => 'Demo Check',
     ));
     $id = $area['id'];
     $getArea = $this->resource->get($id);

     $this->assertTrue(is_array($getArea));
     $this->assertTrue(array_key_exists('id', $getArea));
  }

  public function testAll()
  {
    $areas = $this->resource->all();
    $this->assertTrue(is_array($areas));
  }

  /**
  * @expectedException BadMethodCallException
  */
  public function testDeleteFail()
  {
    $this->resource->delete('1');
  }

}
