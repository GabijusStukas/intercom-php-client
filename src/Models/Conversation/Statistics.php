<?php

namespace Intercom\Models\Conversation;

use Carbon\Carbon;
use Intercom\Models\BaseModel;
use stdClass;

class Statistics extends BaseModel
{
    /** @var int|null */
    protected ?int $timeToAssignment;

    /** @var int|null */
    protected ?int $timeToAdminReply;

    /** @var int|null */
    protected ?int $timeToFirstClose;

    /** @var int|null */
    protected ?int $timeToLastClose;

    /** @var int|null */
    protected ?int $medianTimeToReply;

    /** @var Carbon|null */
    protected ?Carbon $firstContactReplyAt;

    /** @var Carbon|null */
    protected ?Carbon $firstAssignmentAt;

    /** @var Carbon|null */
    protected ?Carbon $firstAdminReplyAt;

    /** @var Carbon|null */
    protected ?Carbon $firstCloseAt;

    /** @var Carbon|null */
    protected ?Carbon $lastAssignmentAt;

    /** @var Carbon|null */
    protected ?Carbon $lastAssignmentAdminReplyAt;

    /** @var Carbon|null */
    protected ?Carbon $lastContactReplyAt;

    /** @var Carbon|null */
    protected ?Carbon $lastAdminReplyAt;

    /** @var Carbon|null */
    protected ?Carbon $lastCloseAt;

    /** @var string|null */
    protected ?string $lastClosedById;

    /** @var int */
    protected int $countReopens;

    /** @var int */
    protected int $countAssignments;

    /** @var int */
    protected int $countConversationParts;

    /**
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->firstContactReplyAt = $this->setTimestamp($data->first_contact_reply_at);
        $this->firstAssignmentAt = $this->setTimestamp($data->first_assignment_at);
        $this->firstAdminReplyAt = $this->setTimestamp($data->first_admin_reply_at);
        $this->firstCloseAt = $this->setTimestamp($data->first_close_at);
        $this->lastAssignmentAt = $this->setTimestamp($data->last_assignment_at);
        $this->lastAssignmentAdminReplyAt = $this->setTimestamp($data->last_assignment_admin_reply_at);
        $this->lastContactReplyAt = $this->setTimestamp($data->last_contact_reply_at);
        $this->lastAdminReplyAt = $this->setTimestamp($data->last_admin_reply_at);
        $this->lastCloseAt = $this->setTimestamp($data->last_close_at);

        parent::__construct($data);
    }
}
