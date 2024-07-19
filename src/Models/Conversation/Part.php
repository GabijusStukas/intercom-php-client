<?php

namespace Intercom\Models\Conversation;

use Intercom\Models\BaseModel;
use stdClass;

class Part extends BaseModel
{
    /** @var string */
    protected string $id;

    /** @var string */
    protected string $partType;

    /** @var string|null */
    protected ?string $body = null;

    /** @var PartAuthor */
    protected PartAuthor $author;

    /**
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->author = new PartAuthor($data->author);

        $this->setData($data);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;

    }
}
