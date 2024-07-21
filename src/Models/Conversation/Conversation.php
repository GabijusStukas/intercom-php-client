<?php

namespace Intercom\Models\Conversation;

use Carbon\Carbon;
use Intercom\Models\BaseModel;
use Intercom\Models\Tag\Tag;
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

    /** @var Source */
    protected Source $source;

    /** @var Statistics */
    protected Statistics $statistics;

    /** @var Rating|null */
    protected ?Rating $rating;

    /** @var Tag[] */
    protected array $tags;

    /** @var stdClass */
    protected stdclass $customAttributes;

    /** @var Carbon */
    protected Carbon $createdAt;

    /** @var Carbon */
    protected Carbon $updatedAt;

    /**
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->source = new Source($data->source);
        $this->statistics = new Statistics($data->statistics);
        $this->rating = isset($data->conversation_rating) ? new Rating($data->conversation_rating) : null;

        $this->conversationParts = array_map(function ($part) {
            return new Part($part);
        }, $data->conversation_parts->conversation_parts);

        $this->tags = array_map(function ($tag) {
            return new Tag($tag);
        }, $data->tags->tags);

        $this->createdAt = Carbon::parse($data->created_at);
        $this->updatedAt = Carbon::parse($data->updated_at);

        parent::__construct($data);
    }

    /**
     * @param string $val
     *
     * @return mixed
     */
    public function getCustomAttribute(string $val): mixed
    {
        return $this->customAttributes->$val;
    }
}
