<?php

namespace Intercom\Resources;

use Intercom\Exceptions\IntercomApiException;
use Intercom\Models\Conversation\Conversation;

class Conversations extends BaseResource
{
    /**
     * Returns single Conversation.
     *
     * @see https://developers.intercom.com/docs/references/rest-api/api.intercom.io/conversations/retrieveconversation
     * @param int $id
     * @return Conversation
     *
     * @throws IntercomApiException
     */
    public function getConversation(int $id): Conversation
    {
        $path = $this->conversationPath($id);
        return new Conversation($this->client->get($path));
    }

    /**
     * @param int $id
     * @return string
     */
    private function conversationPath(int $id): string
    {
        return 'conversations/' . $id;
    }
}
