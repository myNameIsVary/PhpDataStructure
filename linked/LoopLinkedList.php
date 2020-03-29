<?php
/**
 * @Tool       : VsCode.
 * @Date       : 2020-03-29 19:22:06
 * @Author     : rxm rxm@wiki361.com
 * @LastEditors: rxm rxm@wiki361.com
 */

namespace linked;

require_once __DIR__ . '/./DoubleLinkedList.php';

/**
 * Class LoopLinkedList
 * @package linked
 */
class LoopLinkedList extends DoubleLinkedList
{
    /**
     * set tailNode->next to the headerNode
     * LoopLinkedList constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tail->next = $this->header;
    }
}

//$loop= new LoopLinkedList();
//$loop->append('1');
//$loop->append('2');
//$loop->append('3');
//$loop->append('4');
//$loop->append('5');
//$loop->insert('1', '11');
//$loop->update('1', '100');
//$loop->delete('100');
//$loop->clear();
//
//echo $loop;

//var_dump($loop);
