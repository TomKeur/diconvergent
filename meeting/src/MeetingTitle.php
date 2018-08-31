<?php

namespace Diconvergent\Meeting;

class MeetingTitle
{
    /**
     * MeetingTitle constructor.
     *
     * @param string $title
     *
     * @throws \Exception
     */
    public function __construct(string $title)
    {
        if (\strlen($title) < 5) {
            throw new \Exception('Title must consist of at least 5 characters');
        }
    }
}
