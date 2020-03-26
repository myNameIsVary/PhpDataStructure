<?php
/**
 * @Tool       : VsCode.
 * @Date       : 2020-03-26 01:17:26
 * @Author     : rxm rxm@wiki361.com
 * @LastEditors: rxm rxm@wiki361.com
 */

/**
 * 单链表结构体
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

class SingleLinkList
{
    /**
     * @var mixed 头结点
     */
    protected $header;

    public function __construct()
    {
        $this->header = new Node('header');
    }

    /**
     * 查找value为node的节点
     * @param $node
     * @return mixed
     */
    protected function read($node)
    {
        $currentNode = $this->header->next;
        while ($currentNode != null && $currentNode->node != $node && $currentNode->next != null) {
            $currentNode = $currentNode->next;
        }

        return $currentNode;
    }

    /**
     * 插入节点 在末尾
     * @param mixed $value 节点值
     * @return void
     */
    public function insert($value)
    {
        if (!$this->header) {
            return;
        }

        $currentNode = $this->header;
        while ($currentNode->next != null) {
            $currentNode = $currentNode->next;
        }

        $currentNode->next = new Node($value);
    }

    /**
     * 指定位置插入
     * @param mixed $node  要插入节点的位置
     * @param mixed $value 要插入的值
     * @return bool
     */
    public function insertInto($node, $value)
    {
        if (!$this->header) {
            return false;
        }

        $currentNode = $this->read($node);
        if ($currentNode && $currentNode->node == $node) {
            $node = new Node($value);
            $node->next = $currentNode->next;
            $currentNode->next = $node;
            return true;
        }

        return false;
    }

    /**
     * 指定位置插入节点
     * @param mixed $node
     * @param mixed $value
     * @return bool
     */
    public function update($node, $value)
    {
        if (!$this->header) {
            return false;
        }

        $currentNode = $this->read($node);

        if ($currentNode->node == $node) {
            $currentNode->node = $value;
            return true;
        }

        return false;
    }

    public function __toString()
    {
        if (!$this->header) {
            return '';
        }

        $currentNode = $this->header;

        $str = $currentNode->node;

        while ($currentNode->next != null) {
            $next = @$currentNode->next->next->node;
            $str .= '->[' . $currentNode->next->node . '|' . $next . ']';
            $currentNode = $currentNode->next;
        }
        return $str;
    }

    /**
     * 删除节点 不允许删除头结点
     * @param mixed $node 要删除的节点
     * @return bool
     */
    public function delete($node)
    {
        if (!$this->header) {
            return false;
        }

        $currentNode = $this->header->next;
        while ($currentNode != null && $currentNode->node != $node && $currentNode->next != null) {
            $preNode = $currentNode;
            $currentNode = $currentNode->next;
        }

        if ($currentNode->node == $node) {
            $preNode->next = $currentNode->next;
            unset($currentNode);
            return true;
        }

        return false;
    }

    // 清空链表
    public function clear()
    {
        $this->header = null;
    }
}

$linkedList = new SingleLinkList();
$linkedList->insert('China');
//$linkedList->clear();
$linkedList->insert('Usa');
$linkedList->insert('Usa1');
$linkedList->insertInto('Usa', 'Usa2');
$linkedList->update('Usa2', 'Usa3');
$linkedList->delete('Usa3');

echo $linkedList;
