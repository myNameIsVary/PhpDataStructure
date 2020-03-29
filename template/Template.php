<?php
/**
 * @Tool       : VsCode.
 * @Date       : 2020-03-28 23:21:25
 * @Author     : rxm rxm@wiki361.com
 * @LastEditors: rxm rxm@wiki361.com
 */
namespace template;

/**
 * interface of the struct data
 * Interface Template
 * @package template
 */
interface Template
{
    /**
     * append a value at the end
     * @param mixed $value value
     * @return void
     */
    public function append($value): void;

    /**
     * update value = $value when node = $nodeValue
     * @param mixed $nodeValue
     * @param mixed $value
     */
    public function update($nodeValue, $value): void;

    /**
     * insert a value when node->node = $nodeValue after the find node
     * @param mixed $nodeValue position
     * @param mixed $value value
     * @return mixed
     */
    public function insert($nodeValue, $value): void;

    /**
     * delete node when value = $nodeValue
     * @param mixed $nodeValue position
     * @return bool
     */
    public function delete($nodeValue): bool;

    /**
     * clear struct Keep header->next = tail
     */
    public function clear(): void;
}