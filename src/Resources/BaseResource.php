<?php

namespace Intercom\Resources;

use Intercom\IntercomClient;

abstract class BaseResource
{
    /**
     * @var IntercomClient
     */
    protected IntercomClient $client;

    /**
     * IntercomResource constructor.
     *
     * @param IntercomClient $client
     */
    public function __construct(IntercomClient $client)
    {
        $this->client = $client;
    }
}
