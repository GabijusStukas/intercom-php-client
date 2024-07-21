<?php

namespace Intercom\Models\Conversation;

use Intercom\Models\BaseModel;
use stdClass;

class Source extends BaseModel
{
    /** @var string */
    protected string $id;

    /** @var string|null */
    protected ?string $type;

    /** @var string */
    protected string $body;

    /** @var string */
    protected string $deliveredAs;

    /** @var string */
    protected string $subject;

    /** @var PartAuthor */
    protected PartAuthor $author;

    /**
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->author = new PartAuthor($data->author);

        parent::__construct($data);
    }
}
