<?php
/**
 * @Tool       : VsCode.
 * @Date       : 2020-03-30 01:51:24
 * @Author     : rxm rxm@wiki361.com
 * @LastEditors: rxm rxm@wiki361.com
 */
namespace queue;

require_once __DIR__ . '/../linked/DoubleLinkedList.php';
require_once __DIR__ . '/../template/LinkedInitialization.php';
require_once __DIR__ . '/../template/StackQueue.php';

use linked\DoubleLinkedList;
use template\LinkedInitialization;
use template\StackQueue;

class LinkedQueue extends DoubleLinkedList implements StackQueue
{
    use LinkedInitialization;

    public function push($value)
    {
        if ($this->maxSize < $this->currentLength + 1) {
            throw new \Exception('max size overflow');
        }

        $this->append($value);
        $this->currentLength++;
    }

    public function pop()
    {
        if ($this->currentLength == 0) {
            throw new \Exception("min size overflow");
        }

        $value = $this->header->next->node;
        $this->delete($value);
        return $value;
    }
}

//$queue = new LinkedQueue();
//$queue->initialization(10);
//$queue->push(10);
//$queue->push(20);
//$queue->push(30);
//$value = $queue->pop();
//$value = $queue->pop();
//var_dump($value);
//die;