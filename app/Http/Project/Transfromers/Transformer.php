<?php


namespace App\Http\Project\Transfromers;


abstract class Transformer
{
    /**
     * Transform a collection of items
     * @param $items
     * @return array
     */
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transformElement'], $items);
    }

    /**
     *
     * @param $item
     * @return mixed
     */
    public abstract function transformElement($item);
}
