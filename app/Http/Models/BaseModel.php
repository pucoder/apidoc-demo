<?php


namespace App\Http\Models;

use DateTimeInterface;

trait BaseModel
{
    /**
     * 序列化日期格式
     *
     * @param DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
