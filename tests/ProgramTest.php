<?php
declare(strict_types=1);

namespace Diconvergent\Meeting\test;

use DateTimeImmutable;
use Diconvergent\Meeting\Meeting;
use Diconvergent\Meeting\Program;
use Diconvergent\Meeting\ProgramSlot;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

final class MeetingTest extends TestCase
{

    /**
     * @dataProvider provideInvalidTitles
     */
    public function testMeetingShouldComplainWhenGivenTitleNotValid($title)
    {

        $this->expectException(\Exception::class);

        new Meeting(
            Uuid::uuid4(),
            $title,
            'This is a silly workshop, don\'t come',
            new DateTimeImmutable('2017-12-15 19:00'),
            new DateTimeImmutable('2017-12-15 21:00'),
            new Program([
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
            ])
        );
    }

    public function testThatAProgramShouldHaveAtLeastOneSLot()
    {
        $this->expectException(\Exception::class);

        new Program([]);
    }


    public function testThatValidMeetingsCanBeInstantiated()
    {
        $this->assertInstanceOf(Meeting::class, new Meeting(
            Uuid::uuid4(),
            '(Di|con)vergent mob refactoring',
            'This is a silly workshop, don\'t come',
            new DateTimeImmutable('2017-12-15 19:00'),
            new DateTimeImmutable('2017-12-15 21:00'),
            new Program([
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
            ])
        ));
    }

     /**
 * @dataProvider provideDates
 */
    public function testMeetingCantStartAfterEnd($start, $end)
    {
        $this->expectException(\Exception::class);
        $this->assertInstanceOf(Meeting::class, new Meeting(
            Uuid::uuid4(),
            '(Di|con)vergent mob refactoring',
            'This is a silly workshop, don\'t come',
            new DateTimeImmutable($start),
            new DateTimeImmutable($end),
            new Program([
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
            ])
        ));

    }

    public function provideInvalidTitles()
    {
        return [
            'empty string' => [''],
            '1 character' => ['T'],
            '2 character' => ['Ti'],
            '3 character' => ['Tit'],
            '4 character' => ['Titl'],
            // '5 character' => ['Title'],
        ];
    }

    public function provideDates()
    {
        return [
            'obviously wrong' => ['2020-12-21 20:00', '2018-12-01 19:00'],
            'same day wrong time' => ['2020-12-21 20:00', '2020-12-21 19:00'],
            //'obviously wrong' => ['2020-12-21 20:00', '2018-12-01 19:00'],
        ];
    }
}
