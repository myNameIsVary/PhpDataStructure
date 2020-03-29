<?php
/**
 * @Tool       : VsCode.
 * @Date       : 2020-03-29 18:46:02
 * @Author     : rxm rxm@wiki361.com
 * @LastEditors: rxm rxm@wiki361.com
 */

namespace linked;

use template\Template;

require_once __DIR__ . '/./LinkedList.php';
require_once __DIR__ . '/./SingleLinkedList.php';
require_once __DIR__ . '/../template/Template.php';

/**
 * Class DoubleLinkedListStruct
 * @package linked
 */
class DoubleLinkedListStruct extends SingleLinkedListStruct
{
    /**
     * @var object previous node
     */
    public object $previous;
}

class DoubleLinkedList extends LinkedList implements Template
{
    protected static string $struct = DoubleLinkedListStruct::class;

    /**
     * set tailNode->previous to the headerNode
     * DoubleLinkedList constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tail->previous = $this->header;
    }

    /**
     * @param mixed $value
     */
    public function append($value): void
    {
        $tempNode                   = new static::$struct($value);
        $tempNode->next             = $this->tail;
        $tempNode->previous         = $this->tail->previous;
        $this->tail->previous->next = $tempNode;
        $this->tail->previous       = $tempNode;
    }

    /**
     * update value = $value when node = $nodeValue
     * @param mixed $nodeValue
     * @param mixed $value
     */
    public function update($nodeValue, $value): void
    {
        if (false != ($currentNode = $this->read($nodeValue))) {
            $currentNode->node = $value;
        }
    }

    /**
     * insert a value when node->node = $nodeValue after the find node
     * @param mixed $nodeValue position
     * @param mixed $value     value
     * @return mixed
     */
    public function insert($nodeValue, $value): void
    {
        if (false != ($currentNode = $this->read($nodeValue))) {
            $tempNode           = new static::$struct($value);
            $tempNode->previous = $currentNode;
            $tempNode->next     = $currentNode->next;
            $currentNode->next  = $tempNode;
        }
    }

    /**
     * delete node when value = $nodeValue
     * @param mixed $nodeValue position
     * @return bool
     */
    public function delete($nodeValue): bool
    {
        $currentNode = $this->header;

        while ($currentNode->node != $nodeValue && $currentNode->next != $this->tail) {
            $previous    = $currentNode;
            $currentNode = $currentNode->next;
        }

        if ($currentNode->node != $nodeValue) {
            return false;
        }

        $currentNode->next->next->previous = $previous;
        $previous->next                    = $currentNode->next;
        unset($currentNode);
        return true;
    }

    /**
     * clear other node
     */
    public function clear(): void
    {
        if ($this->header->next == $this->tail) {
            return;
        }

        $currentNode = $this->header->next;
        while ($currentNode->next != $this->tail) {
            $tempNode    = $currentNode;
            $currentNode = $currentNode->next;
            unset($tempNode);
        }

        unset($tempNode);

        $this->tail->previous = $this->header;
        $this->header->next   = $this->tail;
    }
}

//$double = new DoubleLinkedList();
//$double->append('A');
//$double->append('B');
//$double->append('C');
//$double->append('D');
//$double->append('E');
//$double->insert('A', 'Z');
//$double->update('A', '1');
//$double->delete('1');
////$double->clear();
//
//echo $double;

