<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Br0unde\Algoritms\Sorts\MergeSort;

final class MergeSortTest extends TestCase
{

    public function testMergeSortClassIsDefined()
    {
        $class = new MergeSort();

        $this->assertIsObject($class);
    }

    public function testMergeEmptyArray()
    {
        $class = new MergeSort();
        $array = [];

        $result = $class->sort($array);

        $this->assertIsArray($result);

        $this->assertEquals($result, [], 'Array sorted');
    }

    public function testMergeOnceArray()
    {
        $class = new MergeSort();
        $array = [2];

        $result = $class->sort($array);

        $this->assertIsArray($result);

        $this->assertEquals($result, [2], 'Array sorted');
    }

    public function testSort()
    {
        $class = new MergeSort();
        $array = [2, 5, 6, 7, 3, 9];

        $result = $class->sort($array);

        $this->assertIsArray($result);

        $this->assertEquals($result, [2, 3, 5, 6, 7, 9], 'Array sorted');
    }
}