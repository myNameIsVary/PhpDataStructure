<?php
/**
 * @Tool       : VsCode.
 * @Date       : 2020-03-30 01:55:00
 * @Author     : rxm rxm@wiki361.com
 * @LastEditors: rxm rxm@wiki361.com
 */

namespace template;

/**
 * Class Stack
 * @package stack
 */
trait LinkedInitialization
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
}