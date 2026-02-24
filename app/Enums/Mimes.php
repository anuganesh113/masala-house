<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * Class Mimes
 *
 * @method static static PDF()
 * @method static static DOC()
 * @method static static IMG()
 * @method static static CSV()
 * @method static static EXCEL()
 * @method static static VIDEO()
 */
final class Mimes extends Enum
{
    const PDF = 'pdf';

    const DOC = 'doc,docx';

    const IMG = 'jpg,jpeg,png,gif,bmp,svg,webp';

    const CSV = 'txt,csv';

    const EXCEL = 'xlsx,xls';

    const VIDEO = 'mp4';

    /**
     * @param  string[]  $mimes
     */
    public static function buildMimes(array $mimes = []): string
    {
        return sprintf('mimes:%s', implode(',', $mimes));
    }
}
