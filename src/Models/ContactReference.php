<?php

namespace Intercom\Models;

class ContactReference extends BaseModel
{
    /** @var string */
    protected string $type;

    /** @var string */
    protected string $id;

    /** @var string|null */
    protected ?string $externalId;
}
