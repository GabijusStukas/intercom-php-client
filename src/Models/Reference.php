<?php

namespace Intercom\Models;

class Reference extends BaseModel
{
    /** @var string */
    protected string $type;

    /** @var string|null */
    protected ?string $id;
}
