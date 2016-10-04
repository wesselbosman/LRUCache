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
        $Size = 3;
        $LRUCache = new LRUCache($Size);
        //Act
        $Max = $LRUCache->getMax();

        //Assert
        $this->assertEquals($Size,$Max,'The maximum size is not the same as the size passed to the constructor');
    }

        /*Include any class functions that
        * would be typical to a cache class like this.*/

    public function testCanPlaceItemIntoCache(){
        //Arrange
        $LRUCache = new LRUCache(3);

        //Act
        $LRUCache->put("Foo");
        $LRUCache->put("Bar");
        $LRUCache->put("Baz");

        $this->assertEquals($LRUCache->peek(),"Bar");
    }

    public function testWhenItemIsPlacedInCacheItIsMovedToTheTop(){
        throw new BadMethodCallException();
    }

    public function testCacheDoesNotStoreMoreThanMaximumSize(){
        throw new BadMethodCallException();
    }
}
