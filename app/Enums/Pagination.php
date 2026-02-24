<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static SMALL_PAGE()
 * @method static static MEDIUM_PAGE()
 * @method static static LARGE_PAGE()
 */
final class Pagination extends Enum
{
    const SMALL_PAGE = 8;

    const MEDIUM_PAGE = 12;

    const LARGE_PAGE = 16;
}
