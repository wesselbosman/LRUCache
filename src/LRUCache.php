<?php

namespace LRUCache;

/**
 * Created by PhpStorm.
 * User: wessel
 * Date: 10/3/2016
 * Time: 10:39 PM
 */
class LRUCache
{
    public $_max;
    public $_dictionary;
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

        if (in_array($string,$this->_dictionary)){
            $item = $this->find($string);
            array_splice($this->_dictionary,$item,1);
            array_unshift($this->_dictionary,$string);
            //echo '|found |';

        }
        else{
            array_pop($this->_dictionary);
            array_unshift($this->_dictionary,$string);
            //echo '|not found |';
        }

    }

    public function find($string){
        return array_search($string,$this->_dictionary);
    }

    public function peek(){
        $cache = $this->_dictionary;
        return $cache[0];
    }
}