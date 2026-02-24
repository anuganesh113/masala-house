<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * Class Max
 *
 * @method static static IMAGE()
 * @method static static VIDEO()
 * @method static static FILE()
 * @method static static COLOR_LOGO()
 * @method static static WHITE_LOGO()
 * @method static static ADMIN()
 */
final class Max extends Enum
{
    const IMAGE = '5mb';

    const VIDEO = '25mb';

    const FILE = '5mb';

    const COLOR_LOGO = '10mb';

    const WHITE_LOGO = '10mb';

    const ADMIN = '5mb';
}
