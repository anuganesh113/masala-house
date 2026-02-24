<?php

namespace App\Constants;

/**
 * class General
 */
class General
{
    const ONE = 1;

    const ZERO = 0;

    const TRUE = true;

    const FALSE = false;

    const IMAGE_MAX_SIZE = 2 * 1024;

    const VIDEO_MAX_SIZE = 10 * 1024;

    const DOCUMENT_MAX_SIZE = 5 * 1024;

    const GALLERY_ALLOWED = 5;

    const EVENT_GALLERY_ALLOWED = 5;

    const DEFAULT_DATE_FORMAT = 'Y-m-d';

    const DEFAULT_DATETIME_FORMAT = 'm-d-Y \a\t g:iA';

    const PREFIX_FILE_NAME = 'masala-house-files';

    const DEFAULT_ADMIN = 'default-profile.jpg';

    const DEFAULT_IMAGE = 'default-image.svg';

    const DEFAULT_IMAGE_PATH = '/site-assets/images/'.self::DEFAULT_IMAGE;

    const YOUTUBE_SHARE_LINK_REGEX = '/https:\/\/youtu\.be\/([a-zA-Z0-9_-]{11})\?si=[a-zA-Z0-9_-]+/';

    const NO_PAGES = [
        'directories',
    ];
}
