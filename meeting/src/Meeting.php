<?php
declare(strict_types=1);

namespace Diconvergent\Meeting;

use DateTimeImmutable;
use Ramsey\Uuid\UuidInterface;

final class Meeting
{
    /** @var UuidInterface */
    private $meetingId;

    /** @var MeetingTitle */
    private $title;

    /** @var string */
    private $description;

    /** @var Program */
    private $program;
    /**
     * @var Timebox
     */
    private $timebox;

    /**
     * Meeting constructor.
     *
     * @param UuidInterface $meetingId
     * @param MeetingTitle  $title
     * @param string        $description
     * @param Timebox       $timebox
     * @param Program       $program
     */
    public function __construct(
        UuidInterface $meetingId,
        MeetingTitle $title,
        string $description,
        Timebox $timebox,
        Program $program
    ) {
        $this->meetingId = $meetingId;
        $this->title = $title;
        $this->description = $description;
        $this->program = $program;
        $this->timebox = $timebox;
    }

//    public function reschedule()
//    {
//
//    }

}
