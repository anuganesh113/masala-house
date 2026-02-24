<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * Class GalleryType
 *
 * @method static static IMAGE()
 * @method static static YOUTUBE()
 */
final class GalleryType extends Enum
{
    const IMAGE = 'image';

    const YOUTUBE = 'youtube';
}
