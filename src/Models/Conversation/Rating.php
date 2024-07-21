<?php

namespace Intercom\Models\Conversation;

use Carbon\Carbon;
use Intercom\Models\BaseModel;
use Intercom\Models\ContactReference;
use Intercom\Models\Reference;
use stdClass;

class Rating extends BaseModel
{
    /** @var int */
    protected int $rating;

    /** @var string|null */
    protected ?string $remark;

    /** @var Carbon */
    protected Carbon $createdAt;

    /** @var ContactReference */
    protected ContactReference $contact;

    /** @var Reference */
    protected Reference $teammate;

    /**
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->contact = new ContactReference($data->contact);
        $this->teammate = new Reference($data->teammate);

        $this->createdAt = $this->setTimestamp($data->created_at);

        parent::__construct($data);
    }
}
