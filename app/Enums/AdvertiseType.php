<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static POPUP()
 * @method static static NORMAL()
 */
final class AdvertiseType extends Enum
{
    const POPUP = 'popup';

    const NORMAL = 'normal';
}
