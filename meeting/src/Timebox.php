<?php
/**
 * Copyright (c) 2018. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

declare(strict_types=1);

namespace Diconvergent\Meeting;

final class Timebox
{
    /**
     * @var \DateTimeImmutable
     */
    private $start;

    /**
     * @var \DateTimeImmutable
     */
    private $end;

    /**
     * @param \DateTimeImmutable $start
     * @param \DateTimeImmutable $end
     *
     * @throws \Exception
     */
    public function __construct(\DateTimeImmutable $start, \DateTimeImmutable $end)
    {
        if ($end <= $start) {
            throw new \Exception('Meeting must end after start');
        }

        $this->start = $start;
        $this->end = $end;
    }
}
