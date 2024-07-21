<?php

namespace Intercom\Models\Tag;

use Carbon\Carbon;
use Intercom\Models\BaseModel;
use Intercom\Models\Reference;
use stdClass;

class Tag extends BaseModel
{
    /** @var string */
    protected string $id;

    /** @var string */
    protected string $type;

    /** @var string */
    protected string $name;

    /** @var string */
    protected string $appliedAt;

    /** @var Reference */
    protected Reference $reference;

    /**
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->reference = new Reference($data->applied_by);
        $this->appliedAt = Carbon::parse($data->applied_at);

        parent::__construct($data);
    }
}
