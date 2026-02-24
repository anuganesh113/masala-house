<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static TEAM()
 * @method static static CHEF()
 */
final class MemberType extends Enum
{
    const TEAM = 'team';
    const CHEF = 'chef';
}
