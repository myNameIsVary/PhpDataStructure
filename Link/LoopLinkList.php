<?php
/**
 * @Tool       : VsCode.
 * @Date       : 2020-03-28 02:03:12
 * @Author     : rxm rxm@wiki361.com
 * @LastEditors: rxm rxm@wiki361.com
 */

/**
 * 循环列表结构体
 * Struct Node
 */
class Node
{
    /**
     * @var mixed 当前节点数据
     */
    public $node;

    /**
     * @var mixed 下一节点
     */
    public $next;

    /**
     * 构建结构体
     * Node constructor.
     * @param mixed $data 节点值
     */
    public function __construct($value)
    {
        $this->node = $value;
    }
}

/**
 * 循环列表
 * Class LoopLinkList
 */
class LoopLinkList
{
    /**
     * @var mixed 头结点
     */
    protected $header;

    public function __construct()
    {
        $this->header       = new Node('header');
        $this->header->next = $this->header;
    }

    /**
     * find $node return $node struct if not exists return the last node
     * 查找节点为node的值 如果不存在 返回最后一个节点
     * @param mixed $node
     * @return object
     */
    protected function read($node): object
    {
        $currentNode = $this->header;
        while ($currentNode->node == $node || $currentNode->next != $this->header) {
            $previous    = $currentNode;
            $currentNode = $currentNode->next;
        }

        return $previous;
    }

    /**
     * insert into last
     * 末尾插入
     * @param mixed $value 要插入的值 insert value
     */
    public function insert($value): void
    {
        $currentNode = $this->header;

        while ($currentNode->next != $this->header) {
            $currentNode = $currentNode->next;
        }
        $node              = new Node($value);
        $node->next        = $this->header;
        $currentNode->next = $node;
    }

    /**
     * insert into position
     * 插入指定节点
     * @param mixed $node  insert into position 要插入的位置
     * @param mixed $value insert value  插入的节点
     * @return bool
     */
    public function insertInto($node, $value): bool
    {
        $currentNode = $this->read($node);

        if ($currentNode->node == $node) {
            $insetNode         = new Node($value);
            $insetNode->next   = $currentNode->next;
            $currentNode->next = $insetNode;
            return true;
        }

        return false;
    }

    /**
     * delete value is $node if has $node return false
     * @param mixed $node find value
     * @return bool
     */
    public function delete($node): bool
    {
        if ($this->header->next == $this->header) {
            return false;
        }
        $currentNode = $this->header;
        $previous = null;
        while ($currentNode->next != $this->header && $currentNode->node != $node) {
            $previous    = $currentNode;
            $currentNode = $currentNode->next;
        }

        if ($currentNode->next == $this->header) {
            return false;
        }

        $previous->next = $currentNode->next;
        unset($currentNode);
        return true;
    }

    public function __toString()
    {
        $str = $this->header->node;
        if ($this->header->next == $this->header) {
            return $str . '->' . $str;
        }
        $currentNode = $this->header;
        while ($currentNode->next != $this->header) {
            $str         .= "->[{$currentNode->next->node}|";
            $currentNode = $currentNode->next;
            $str         .= "{$currentNode->next->node}]";
        }
        return $str;
    }
}

$list = new LoopLinkList();
$list->insert('A');
$list->insert('B');
$list->insert('C');
$list->insertInto('B', 'D');
$a = $list->delete('B');
echo $list;