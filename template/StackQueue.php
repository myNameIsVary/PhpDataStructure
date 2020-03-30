<?php
/**
 * @Tool       : VsCode.
 * @Date       : 2020-03-30 01:48:08
 * @Author     : rxm rxm@wiki361.com
 * @LastEditors: rxm rxm@wiki361.com
 */

namespace template;

interface StackQueue
{
    /**
     * append a value at the end
     * @return mixed
     */
    public function push($value);

    /**
     * get last value
     * @return mixed
     */
    public function pop();
}