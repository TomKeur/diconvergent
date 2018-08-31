<?php

namespace Diconvergent\Meeting;

class MeetingTitleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideInvalidTitles
     */
    public function testMeetingShouldComplainWhenGivenTitleNotValid($title)
    {
        $this->expectException(\Exception::class);

        new MeetingTitle($title);
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
}
