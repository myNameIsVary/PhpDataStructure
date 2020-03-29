<?php
/**
 * @Tool       : VsCode.
 * @Date       : 2020-03-29 18:17:50
 * @Author     : rxm rxm@wiki361.com
 * @LastEditors: rxm rxm@wiki361.com
 */

namespace linked;

use template\Template;

require_once __DIR__ . '/./LinkedList.php';
require_once __DIR__ . '/../template/Template.php';

class SingleLinkedListStruct
{
    /**
     * @var mixed current node
     */
    public $node;

    /**
     * @var mixed next node
     */
    public object $next;

    public function __construct($value)
    {
        $this->node = $value;
    }
}

class SingleLinkedList extends LinkedList implements Template
{
    protected static string $struct = SingleLinkedListStruct::class;

    /**
     * append a value at the end
     * end node equal to newNode then newNode->next = tail
     * @param mixed $value
     */
    public function append($value): void
    {
        $currentNode = $this->header;
        while ($currentNode->next != $this->tail) {
            $currentNode = $currentNode->next;
        }
        $node              = new static::$struct($value);
        $node->next        = $this->tail;
        $currentNode->next = $node;
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
            $node              = new static::$struct($value);
            $node->next        = $currentNode->next;
            $currentNode->next = $node;
        }
    }

    /**
     * delete node when value = $nodeValue
     * @param mixed $nodeValue position
     * @return bool
     */
    public function delete($nodeValue): bool
    {
        $currentNode = $previous = $this->header;

        while ($currentNode->node != $nodeValue && $currentNode->next != $this->tail) {
            $previous    = $currentNode;
            $currentNode = $currentNode->next;
        }

        if ($currentNode->node != $nodeValue) {
            return false;
        }

        $previous->next = $currentNode->next;
        unset($currentNode);
        return true;
    }

    /**
     * clear struct Keep header->next = tail
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

        $this->header->next = $this->tail;
    }
}

//$single = new SingleLinkedList();
//$single->append('a');
//$single->append('b');
//$single->append('c');
//$single->append('d');
//$single->append('e');
//$single->update('b', 'z');
//$single->insert('a', 'y');
//$single->insert('a', 'x');
//$single->delete('y');
////$single->clear();
//echo $single;
