<?php

namespace App\Models\Traits;


trait GetterSetterTrait
{
    /**
     * Get value by the column name.
     *
     * @return string
     */
    public function getColumn($column_name)
    {
        return $this->$column_name ?? '';
    }

    /**
     * Set value of the column_name.
     *
     * @param $column_name
     * @param $value
     */
    public function setColumn($column_name, $value)
    {
        try {
            $this->$column_name = $value;
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            \Log::error($e->getTraceAsString());
        }
    }
}