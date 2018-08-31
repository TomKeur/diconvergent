<?php
declare(strict_types=1);

namespace Diconvergent\Meeting\test;

use DateTimeImmutable;
use Diconvergent\Meeting\Meeting;
use Diconvergent\Meeting\MeetingTitle;
use Diconvergent\Meeting\Program;
use Diconvergent\Meeting\ProgramSlot;
use Diconvergent\Meeting\Timebox;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

final class MeetingTest extends TestCase
{

    public function testThatValidMeetingsCanBeInstantiated()
    {
        $meeting = new Meeting(
            Uuid::uuid4(),
            new MeetingTitle('(Di|con)vergent mob refactoring'),
            'This is a silly workshop, don\'t come',
            new Timebox(
                new DateTimeImmutable('2017-12-15 19:00'),
                new DateTimeImmutable('2017-12-15 21:00')
            ),
            new Program(
                [
                    new ProgramSlot(
                        new DateTimeImmutable('2017-12-15 19:00'),
                        new DateTimeImmutable('2017-12-15 20:00'),
                        'Divergence',
                        'Main room'
                    ),
                    new ProgramSlot(
                        new DateTimeImmutable('2017-12-15 20:00'),
                        new DateTimeImmutable('2017-12-15 21:00'),
                        'Convergence',
                        'Main room'
                    ),
                ]
            )
        );
        $this->assertInstanceOf(
            Meeting::class,
            $meeting
        );
        return $meeting;
    }

    /**
     * @depends testThatValidMeetingsCanBeInstantiated
     * @param $meeting
     */
    public function testThatMeetingCanBeRescheduled(Meeting $meeting)
    {
        $meeting->reschedule();
    }
}
