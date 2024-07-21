<?php

namespace Intercom\Models\Conversation;

use Intercom\Models\BaseModel;

class PartAuthor extends BaseModel
{
    /** @var string */
    protected string $id;

    /** @var string */
    protected string $type;

    /** @var string */
    protected string $name;

    /** @var string */
    protected string $email;
}
