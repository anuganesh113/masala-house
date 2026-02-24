<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static VEG()
 * @method static static NON_VEG()
 */
final class FoodType extends Enum
{
    const VEG = 'veg';
    const NON_VEG = 'non-veg';
}
