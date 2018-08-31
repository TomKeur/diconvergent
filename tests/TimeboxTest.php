<?php
/**
 * Copyright (c) 2018. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace Diconvergent\Meeting;

use DateTimeImmutable;

class TimeboxTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideDates
     */
    public function testMeetingCantStartAfterEnd($start, $end)
    {
        $this->expectException(\Exception::class);
        new Timebox(
            new DateTimeImmutable($start),
            new DateTimeImmutable($end)
        );
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
