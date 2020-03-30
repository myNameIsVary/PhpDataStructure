<?php
/**
 * @Tool       : VsCode.
 * @Date       : 2020-03-30 01:51:10
 * @Author     : rxm rxm@wiki361.com
 * @LastEditors: rxm rxm@wiki361.com
 */
namespace queue;

use template\StackQueue;
use vector\VectorArray;

require_once __DIR__ . '/../vector/VectorArray.php';
require_once __DIR__ . '/../template/StackQueue.php';

/**
 * Class VectorQueue
 * @package queue
 */
class VectorQueue extends VectorArray implements StackQueue
{
    public function push($value)
    {
        $this->append($value);
    }

    public function pop()
    {
        $value = $this->data[0];
        $this->delete(0);
        return $value;
    }
}

//$queue = new VectorQueue(10);
//$queue->push(1);
//$queue->push(2);
//$queue->push(3);
//$value = $queue->pop();
//$value = $queue->pop();
//var_dump($value);
//var_dump($queue);
