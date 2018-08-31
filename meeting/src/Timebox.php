<?php
declare(strict_types=1);

namespace Diconvergent\Meeting;

use Webmozart\Assert\Assert;

final class Program
{
    /** @var ProgramSlot[] */
    private $programSlots;

    /**
     * @param ProgramSlot[] $programSlots
     */
    public function __construct(array $programSlots)
    {
        if ($programSlots === []) {
           throw new \Exception('At leeast one program slot should be given.');
        }

        Assert::allIsInstanceOf($programSlots, ProgramSlot::class);
        $this->programSlots = $programSlots;
    }
}
