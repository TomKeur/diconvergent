<?php
/**
 * Copyright (c) 2018. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

declare(strict_types=1);

namespace Diconvergent\Meeting\test;

use DateTimeImmutable;
use Diconvergent\Meeting\Meeting;
use Diconvergent\Meeting\Program;
use Diconvergent\Meeting\ProgramSlot;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

final class ProgramTest extends TestCase
{

    public function testThatAProgramShouldHaveAtLeastOneSLot()
    {
        $this->expectException(\Exception::class);

        new Program([]);
    }
}
