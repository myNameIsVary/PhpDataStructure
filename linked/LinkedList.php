<?php
/**
 * @Tool       : VsCode.
 * @Date       : 2020-03-29 18:16:09
 * @Author     : rxm rxm@wiki361.com
 * @LastEditors: rxm rxm@wiki361.com
 */
namespace linked;

abstract class LinkedList
{
    /**
     * @var string bind struct
     */
    protected static string $struct;

    /**
     * @var object header node
     */
    protected object $header;

    /**
     * @var object tail node
     */
    protected object $tail;

    public function __construct()
    {
        $this->header       = new static::$struct('header');
        $this->tail         = new static::$struct('tail');
        $this->header->next = $this->tail;
    }

    /**
     * find node with value
     * @param mixed $nodeValue value
     * @return object|bool
     */
    public function read($nodeValue)
    {
        $currentNode = $this->header;

        while ($currentNode->node != $nodeValue && $currentNode->next != $this->tail) {
            $currentNode = $currentNode->next;
        }

        return $currentNode->node == $nodeValue ? $currentNode : false;
    }

    /**
     * show linked
     * @return string
     */
    public function __toString()
    {
        $str = '';
        if (empty($this->header) || $this->header->next == $this->tail) {
            return $str;
        }

        $currentNode = $this->header->next;

        $str .= $currentNode->node;

        while ($currentNode->next != $this->tail) {
            $currentNode = $currentNode->next;
            $str         .= "->$currentNode->node";
        }

        return $str;
    }
}