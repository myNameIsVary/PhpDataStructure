<?php
/**
 * @Tool       : VsCode.
 * @Date       : 2020-03-28 23:22:53
 * @Author     : rxm rxm@wiki361.com
 * @LastEditors: rxm rxm@wiki361.com
 */
namespace order;

require_once __DIR__ . '/../template/Template.php';

use template\Template;

/**
 * order array struct
 * Class OrderTable
 * @package order
 */
class OrderTableStruct
{
    /**
     * @var int max length of data data的最大长度
     */
    public int $maxLength;

    /**
     * @var int current length of data data当前的长度
     */
    public int $currentLength;

    /**
     * @var array data 数据data
     */
    public array $data;

    public function __construct($maxLength)
    {
        $this->data          = [];
        $this->currentLength = 0;
        $this->maxLength     = $maxLength;
    }
}

/**
 * order array table
 * Class ArrayList
 * @package order
 */
class ArrayList implements Template
{
    /**
     * @var object OrderTable object 对象数组
     */
    protected object $array;

    public function __construct(int $maxLength) { $this->array = new OrderTableStruct($maxLength); }

    /**
     * append a value at the end
     * set endIndex = $value then currentLength + 1
     * 在末尾插入值 表长度加1
     * @param mixed $value value
     * @return void
     * @throws
     */
    public function append($value): void
    {
        if ($this->array->currentLength > $this->array->maxLength) {
            throw new \Exception('out of space');
        }

        $this->array->data[] = $value;
        $this->array->currentLength++;
    }

    /**
     * set index value = $value when index = $index
     * @param mixed $index
     * @param mixed $value
     * @throws
     */
    public function update($index, $value): void
    {
        if ($index < 0 || $index > $this->array->maxLength) {
            throw new \Exception('index illegal');
        }

        if ($index > $this->array->currentLength) {
            throw new \Exception('index offside');
        }

        $this->array->data[$index] = $value;
    }

    /**
     * insert a value at the specified position
     * first all value move backward one position until $index then set $index = $value last currentLength + 1
     * 所有的值都向后移动一位 直到遇到$index 把$index下标的设为$value 表长度加1
     * @param mixed $index
     * @param mixed $value
     * @throws
     */
    public function insert($index, $value): void
    {
        if ($index < 0 || $index > $this->array->maxLength) {
            throw new \Exception('index illegal');
        }

        if ($index > $this->array->currentLength) {
            throw new \Exception('index offside');
        }

        $tempIndex = $this->array->currentLength;

        while ($index < $tempIndex) {
            $this->array->data[$tempIndex] = $this->array->data[$tempIndex - 1];
            $tempIndex--;
        }
        $this->array->data[$index] = $value;
        $this->array->currentLength++;
    }

    /**
     * delete value at specified position
     * first all values ​​starting from the subscript are the values ​​shifted by one bit Until the end
     * then unset empty's $index last  currentLength - 1
     * 从下标$index开始的所有值都是$index+1的值 直到末尾 删除空掉的位置
     * @param mixed $index
     * @return bool
     * @throws
     */
    public function delete($index): bool
    {
        if ($index < 0 || $index > $this->array->maxLength) {
            throw new \Exception('index illegal');
        }

        if ($this->array->currentLength == 0 || $index > $this->array->currentLength - 1) {
            throw new \Exception('index offside');
        }

        while ($index < $this->array->currentLength - 1) {
            $this->array->data[$index] = $this->array->data[$index + 1];
            $index++;
        }

        unset($this->array->data[$this->array->currentLength - 1]);
        $this->array->currentLength--;
        return true;
    }

    /**
     * clear
     * clear data set currentLength 0 set data []
     */
    public function clear(): void
    {
        unset($this->array->data);
        $this->array->data          = [];
        $this->array->currentLength = 0;
    }

    public function __toString()
    {
        $str = '';
        if (!$this->array->currentLength) {
            return $str;
        } else {
            $str .= $this->array->data[0];
        }

        $i = 1;
        while ($i < $this->array->currentLength) {
            $str .= '->' . $this->array->data[$i];
            $i++;
        }

        return $str;
    }
}

$array = new ArrayList(100);
$array->append(1);
$array->append(2);
$array->append(3);
$array->append(4);
$array->insert(1, 5);
$array->delete(1);
$array->clear();
$array->append(1);
$array->append(2);

echo $array;