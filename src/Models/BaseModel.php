<?php

namespace Intercom\Models;

use Carbon\Carbon;
use stdClass;

abstract class BaseModel
{
    /**
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->setData($data);
    }

    /**
     * @param stdClass $data
     *
     * @return void
     */
    protected function setData(stdClass $data): void
    {
        foreach ($data as $key => $val) {
            $key = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            if (property_exists($this, $key) && !isset($this->$key)) {
                $this->$key = $val;
            }
        }
    }

    protected function setTimestamp(?int $timestamp): ?Carbon
    {
        return $timestamp ? Carbon::parse($timestamp) : null;
    }
}
