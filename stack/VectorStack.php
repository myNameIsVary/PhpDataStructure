<?php
/**
 * @Tool       : VsCode.
 * @Date       : 2020-03-30 01:35:50
 * @Author     : rxm rxm@wiki361.com
 * @LastEditors: rxm rxm@wiki361.com
 */

namespace stack;

require_once __DIR__ . '/../vector/VectorArray.php';

use vector\VectorArray;

/**
 * Class VectorStack
 * @package stack
 */
class VectorStack extends VectorArray
{
    /**
     * @param $value
     * @throws \Exception
     */
    public function push($value)
    {
        $this->append($value);
    }

    /**
     * get the end value
     * @return mixed
     * @throws \Exception
     */
    public function pop()
    {
        $value = $this->data[$this->currentLength - 1];
        $this->delete($this->currentLength - 1);
        return $value;
    }
}

//$stack = new VectorStack(10);
//$stack->push(1);
//$stack->push(2);
//$stack->push(3);
//$stack->push(4);
//$value = $stack->pop();
//$value = $stack->pop();
//$value = $stack->pop();
//$value = $stack->pop();
//$value = $stack->pop();
//var_dump($value);