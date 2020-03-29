<?php
/**
 * @Tool       : VsCode.
 * @Date       : 2020-03-29 20:36:15
 * @Author     : rxm rxm@wiki361.com
 * @LastEditors: rxm rxm@wiki361.com
 */
namespace stack;

use linked\DoubleLinkedList;

require_once __DIR__ . '/../linked/DoubleLinkedList.php';

/**
 * Class LinkedStack
 * @package stack
 */
class LinkedStack extends DoubleLinkedList
{
    protected int $maxSize = 0;

    protected int $currentLength = 0;

    /**
     * initialization max size
     * @param $maxSize
     */
    public function initialization($maxSize)
    {
        $this->maxSize = $maxSize;
    }

    /**
     * push value
     * @param mixed $value
     * @throws
     */
    public function push($value)
    {
        if ($this->maxSize < $this->currentLength + 1) {
            throw new \Exception('max size overflow');
        }

        $this->currentLength++;
        $this->append($value);
    }

    /**
     * pop value
     * @return mixed
     * @throws
     */
    public function pop()
    {
        if ($this->currentLength == 0) {
            throw new \Exception("min size overflow");
        }

        $value                                = $this->tail->previous->node;
        $this->tail->previous->previous->next = $this->tail;
        $this->tail->previous                 = $this->tail->previous->previous;
        $this->currentLength--;
        return $value;
    }
}

$linkStack = new LinkedStack();
$linkStack->initialization(3);
$linkStack->push(1);
$linkStack->push(2);
$linkStack->push(3);
//$value = $linkStack->pop();
//$value = $linkStack->pop();
//$linkStack->pop();
$value = $linkStack->pop();
var_dump($value);
//die;
//
//var_dump($linkStack);
//die;



