<?php

require '../src/LRUCache.php';

use LRUCache\LRUCache;
/**
 * Created by PhpStorm.
 * User: wessel
 * Date: 10/3/2016
 * Time: 10:23 PM
 */
class LRUCacheTest extends PHPUnit_Framework_TestCase
{
    /* Implement a least recently used cache class to store arbitrary length string values indexed by a unique integer key.
     * The cache size should be configurable, but need not be changed after construction. Include any class functions that
     * would be typical to a cache class like this.
     * */
    public function testCacheSizeIsConfigurable(){
        //The cache size should be configurable, but need not be changed after construction.

        //Arrange
        $Size = 100;
        $LRUCache = new LRUCache($Size);
        //Act
        $Max = $LRUCache->_max;

        //Assert
        $this->assertEquals($Size,$Max,'The maximum size is not the same as the size passed to the constructor');
    }

        /*Include any class functions that
        * would be typical to a cache class like this.*/

    public function testCanPlaceItemIntoCache(){
        //Arrange
        $LRUCache = new LRUCache(3);

        //Act
        $LRUCache->put("Bar");
        $LRUCache->put("Bar");
        $LRUCache->put("Foo");

        $this->assertEquals($LRUCache->peek(),"Foo",'The latest inserted item is not first in the list');
    }

    public function testWhenItemIsPlacedInCacheItIsMovedToTheTopAndNotDuplicated(){
        //Arrange
        $LRUCache = new LRUCache(6);
        $LRUCache->put("Bar");
        $LRUCache->put("Baz");
        $LRUCache->put("Foo");
        $LRUCache->put("Bar");
        $LRUCache->put("Bar");
        $LRUCache->put("Bar");
        $LRUCache->put("Bar");
        $LRUCache->put("Bar");
        $LRUCache->put("Bar");


        //Act
        var_dump($LRUCache->_dictionary);
        $instances = array_count_values($LRUCache->_dictionary);
        //var_dump($instances['Bar']);

        //Assert
        $this->assertEquals(true,$instances['Bar'] == 1,'The Cache has duplicates of the same arbitrary string');
    }

    public function testCacheDoesNotStoreMoreThanMaximumSize(){
        $size = 1;
        $LRUCache = new LRUCache($size);

        $LRUCache->put("Bar");
        $LRUCache->put("Bar");
        $LRUCache->put("Bar");
        $LRUCache->put("Bar");

        $this->assertTrue(sizeof($LRUCache)==1,'Size exceeds bounds set for cache');


    }
}
