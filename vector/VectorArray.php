<?php
/**
 * @Tool       : VsCode.
 * @Date       : 2020-03-30 01:06:55
 * @Author     : rxm rxm@wiki361.com
 * @LastEditors: rxm rxm@wiki361.com
 */
namespace vector;

use template\Template;

require_once __DIR__ . '/../template/Template.php';

/**
 * Class VectorArray
 * @package vector
 */
class VectorArray implements Template
{
    /**
     * @var int max length of data
     */
    protected int $maxLength;

    /**
     * @var int current length of data
     */
    protected int $currentLength;

    /**
     * @var array data
     */
    protected array $data;

    public function __construct($maxSize)
    {
        $this->maxLength     = $maxSize;
        $this->currentLength = 0;
    }

    /**
     * append a value at the end
     * @param mixed $value
     * @throws \Exception
     */
    public function append($value): void
    {
        if ($this->maxLength < $this->currentLength + 1) {
            throw new \Exception("overflow");
        }
        $this->currentLength++;
        $this->data[] = $value;
    }

    /**
     * set index value = $value when index = $index
     * @param int   $index index
     * @param mixed $value
     * @throws \Exception
     */
    public function update($index, $value): void
    {
        if ($index < 0 || $index > $this->maxLength) {
            throw new \Exception('index illegal');
        }

        if ($index > $this->currentLength) {
            throw new \Exception('index offside');
        }

        $this->data[$index] = $value;
    }

    /**
     * insert a value at the specified position
     * value move backward one position until before index = $index then set $index = $value last currentLength + 1
     * @param int   $index index
     * @param mixed $value
     * @throws \Exception
     */
    public function insert($index, $value): void
    {
        if ($index < 0 || $index > $this->maxLength) {
            throw new \Exception('index illegal');
        }

        if ($index > $this->currentLength) {
            throw new \Exception('index offside');
        }

        $i = $this->currentLength;
        while ($i > $index) {
            $this->data[$i] = $this->data[$i - 1];
            $i--;
        }

        $this->data[$index] = $value;
        $this->currentLength++;
    }

    /**
     * from index all values ​​are the last digit of his index begin $index
     * @param int $index
     * @return bool
     * @throws
     */
    public function delete($index): bool
    {
        if ($index < 0 || $index > $this->maxLength) {
            throw new \Exception('index illegal');
        }

        if ($this->currentLength == 0 || $index > $this->currentLength - 1) {
            throw new \Exception('index offside');
        }

        while ($index < $this->currentLength - 1) {
            $this->data[$index] = $this->data[$index + 1];
            $index++;
        }

        unset($this->data[$this->currentLength - 1]);
        $this->currentLength--;
        return true;
    }

    /**
     * clear data all value
     */
    public function clear(): void
    {
        $i = 0;

        while ($i < $this->currentLength) {
            unset($this->data[$i]);
            $i++;
        }

        $this->data          = [];
        $this->currentLength = 0;
    }
}

//$array = new VectorArray(10);
//$array->append(1);
//$array->append(2);
//$array->append(3);
//$array->update(2, 20);
//$array->insert(1, 100);
//$array->delete(3);
//$array->clear();