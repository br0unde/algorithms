<?php declare(strict_types=1);

namespace Br0unde\Algoritms\Sorts;

use Br0unde\Algoritms\ISort;

class MergeSort implements ISort
{
    public function sort(array $array): array
    {
        $firstIndex = 0;
        $lastIndex = count($array) - 1;

        if ($lastIndex < 1) {
            return $array;
        }

        return $this->mergeSort($array, $firstIndex, $lastIndex);
    }

    private function mergeSort(
        array &$array,
        int $firstIndex,
        int $lastIndex): ?array
    {
        if ($lastIndex <= $firstIndex) {
            return null;
        }

        $middleIndex = (int)floor(($firstIndex + $lastIndex) / 2);
        $this->mergeSort($array, $firstIndex, $middleIndex);
        $this->mergeSort($array, $middleIndex+1, $lastIndex);
        return $this->merge($array, $firstIndex, $middleIndex, $lastIndex);
    }

    private function merge(
        array &$array,
        int $firstIndex,
        int $middleIndex,
        int $lastIndex
    ): array
    {

        $leftCount = $middleIndex - $firstIndex + 1;
        $rightCount = $lastIndex - $middleIndex ;

        $leftArray = [];
        $rightArray = [];

        for($i=0; $i<$leftCount; $i++) {
            $leftArray[] = $array[$firstIndex + $i];
        }
        $leftArray[] = INF;

        for($j=0; $j<$rightCount; $j++) {
            $rightArray[] = $array[$middleIndex + $j + 1];
        }
        $rightArray[] = INF;

        $i = 0;
        $j = 0;

        for ($k=$firstIndex; $k<=$lastIndex; $k++)
        {
            if ($leftArray[$i] <= $rightArray[$j]) {
                $array[$k] = $leftArray[$i];
                $i++;
            } else {
                $array[$k] = $rightArray[$j];
                $j++;
            }
        }

        return $array;
    }
}