<?php

namespace Intercom\Models\Conversation;

use Intercom\Models\BaseModel;
use stdClass;

class Conversation extends BaseModel
{
    /** @var int */
    protected int $id;

    /** @var int|null */
    protected ?int $adminAssigneeId = null;

    /** @var int|null */
    protected ?int $teamAssigneeId = null;

    /** @var string */
    protected string $state;

    /** @var Part[] */
    protected array $conversationParts;

    /**
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->conversationParts = array_map(function ($part) {
            return new Part($part);
        }, $data->conversation_parts->conversation_parts);

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
