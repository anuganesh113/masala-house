<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ADMIN_PATH()
 */
final class UploadFilePath extends Enum
{
    const ADMINS_PATH = 'uploads/profiles/admins/';

    const ADVERTISES_PATH = 'uploads/advertises/';

    const BANNERS_PATH = 'uploads/banners/';

    const BLOGS_PATH = 'uploads/blogs/';

    const FACILITIES_PATH = 'uploads/facilities/';

    const EDITOR_UPLOADS_PATH = 'uploads/editor-uploads/';

    const GALLERIES_PATH = 'uploads/galleries/';

    const MEMBERS_PATH = 'uploads/members/';
    const BRANDS_PATH = 'uploads/brands/';


    const MENUS_PATH = 'uploads/menus/';
    const CATEGORIES_PATH = 'uploads/categories/';


    const PAGES_PATH = 'uploads/pages/';

    const SERVICES_PATH = 'uploads/services/';

    const IMAGES_PATH = 'uploads/images/';

    const TESTIMONIALS_PATH = 'uploads/testimonials/';

    const LOGO_PATH = 'uploads/logo/';
    const POPUPS_PATH = 'uploads/popups/';
}
