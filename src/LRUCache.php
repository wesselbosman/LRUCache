<?php

namespace LRUCache;
use phpDocumentor\Reflection\Types\Array_;

/**
 * Created by PhpStorm.
 * User: wessel
 * Date: 10/3/2016
 * Time: 10:39 PM
 */
class LRUCache
{
    private $_max;
    private $_dictionary;

    public function getMax(){
        return $this->_max;
    }

    public function accessCache(){
        return $this->_dictionary;
    }


    /*
     * LRUCache constructor.
     */

    public function __construct($max)
    {
        $this->_max = $max;
        $this->_dictionary = array_pad(array(),$max, "");
    }

    public function put($string){
        //find in cache
        $item = $this->find($string);
        $cache = $this->accessCache();

        if ($item == null){
            array_pop($cache);
            array_unshift($cache,$string);
        }
        else{
            array_splice($cache,$item,$item+1);
            array_unshift($cache,$string);
        }


    }

    public function find($string){
        return array_search($string,$this->accessCache());
    }

    public function peek(){
        $cache = $this->accessCache();
        return $cache[0];
    }
}