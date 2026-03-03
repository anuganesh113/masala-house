<?php

namespace App\Constants;

/**
 * class Message
 */
class Message
{
    /**
     * @var array
     */
    public const GENERAL_MESSAGE = [
        'IMAGE_NOT_FOUND' => 'Image Not Found',
        'UNAUTHORIZED_ACTION' => 'Unauthorized Action',
    ];

    /**
     * @var array
     */
    public const ADMIN_MESSAGE = [
        'CREATE_SUCCESS' => 'Admin Create Success',
        'UPDATE_SUCCESS' => 'Admin Update Success',
        'DELETE_SUCCESS' => 'Admin Delete Success',
        'PASSWORD_CHANGE' => 'Password Change Success',
        'PASSWORD_RESET' => 'Password Reset Success',
        'PASSWORD_NOT_MATCH' => 'Current Password Not Match',
        'CANNOT_DELETE_OWN' => 'Cannot Delete Own',
    ];

    /**
     * @var array
     */
    public const ACTIVITY_MESSAGE = [
        'CREATE_SUCCESS' => 'Activity Create Success',
        'UPDATE_SUCCESS' => 'Activity Update Success',
        'DELETE_SUCCESS' => 'Activity Delete Success',
    ];

    /**
     * @var array
     */
    public const BRANDS_MESSAGE = [
        'CREATE_SUCCESS' => 'Brand Create Success',
        'UPDATE_SUCCESS' => 'Brand Update Success',
        'DELETE_SUCCESS' => 'Brand Delete Success',
    ];

    /**
     * @var array
     */
    public const AMENITY_MESSAGE = [
        'CREATE_SUCCESS' => 'Amenity Create Success',
        'UPDATE_SUCCESS' => 'Amenity Update Success',
        'DELETE_SUCCESS' => 'Amenity Delete Success',
    ];

    /**
     * @var array
     */
    public const ADVERTISE_MESSAGE = [
        'CREATE_SUCCESS' => 'Advertise Create Success',
        'UPDATE_SUCCESS' => 'Advertise Update Success',
        'DELETE_SUCCESS' => 'Advertise Delete Success',
    ];

    /**
     * @var array
     */
    public const BANNER_MESSAGE = [
        'CREATE_SUCCESS' => 'Banner Create Success',
        'UPDATE_SUCCESS' => 'Banner Update Success',
        'DELETE_SUCCESS' => 'Banner Delete Success',
    ];

        /**
     * @var array
     */
    public const POPUP_MESSAGE = [
        'CREATE_SUCCESS' => 'Popup Create Success',
        'UPDATE_SUCCESS' => 'Popup Update Success',
        'DELETE_SUCCESS' => 'Popup Delete Success',
    ];


    /**
     * @var array
     */
    public const BLOG_MESSAGE = [
        'CREATE_SUCCESS' => 'Blog Create Success',
        'UPDATE_SUCCESS' => 'Blog Update Success',
        'DELETE_SUCCESS' => 'Blog Delete Success',
    ];

    /**
     * @var array
     */
    public const CATEGORY_MESSAGE = [
        'CREATE_SUCCESS' => 'Category Create Success',
        'UPDATE_SUCCESS' => 'Category Update Success',
        'DELETE_SUCCESS' => 'Category Delete Success',
    ];

    /**
     * @var array
     */
    public const CONTACT_MESSAGE = [
        'SUBMIT_SUCCESS' => 'Contact Submitted Success',
        'DELETE_SUCCESS' => 'Contact Delete Success',
    ];

    /**
     * @var array
     */
    public const INQUIRY_MESSAGE = [
        'SUBMIT_SUCCESS' => 'Inquiry Submitted Success',
        'SUBMIT_FAILED' => 'Inquiry Submitted Failed',
        'DELETE_SUCCESS' => 'Inquiry Delete Success',
    ];

    /**
     * @var array
     */
    public const EDITOR_MESSAGE = [
        'UPLOAD_SUCCESS' => 'File Upload Success',
    ];

    /**
     * @var array
     */
    public const GALLERY_MESSAGE = [
        'CREATE_SUCCESS' => 'Gallery Create Success',
        'UPDATE_SUCCESS' => 'Gallery Update Success',
        'DELETE_SUCCESS' => 'Gallery Delete Success',
        'INVALID_IMAGE' => 'Invalid Image, Cannot Delete',
    ];

    /**
     * @var array
     */
    public const MEMBER_MESSAGE = [
        'CREATE_SUCCESS' => 'Member Message Create Success',
        'UPDATE_SUCCESS' => 'Member Message Update Success',
        'DELETE_SUCCESS' => 'Member Message Delete Success',
    ];

    /**
     * @var array
     */
    public const MENU_MESSAGE = [
        'CREATE_SUCCESS' => 'Menu Create Success',
        'UPDATE_SUCCESS' => 'Menu Update Success',
        'DELETE_SUCCESS' => 'Menu Delete Success',
    ];

    /**
     * @var array
     */
    public const FAQ_MESSAGE = [
        'CREATE_SUCCESS' => 'FAQ Create Success',
        'UPDATE_SUCCESS' => 'FAQ Update Success',
        'DELETE_SUCCESS' => 'FAQ Delete Success',
    ];

    /**
     * @var array
     */
    public const FACILITY_MESSAGE = [
        'CREATE_SUCCESS' => 'Facility Create Success',
        'UPDATE_SUCCESS' => 'Facility Update Success',
        'DELETE_SUCCESS' => 'Facility Delete Success',
    ];

    /**
     * @var array
     */
    public const PAGE_MESSAGE = [
        'CREATE_SUCCESS' => 'Page Create Success',
        'UPDATE_SUCCESS' => 'Page Update Success',
        'DELETE_SUCCESS' => 'Page Delete Success',
        'PAGE_HAS_CHILD' => 'Page Has Child, Cannot Delete',
    ];

    /**
     * @var array
     */
    public const SERVICE_MESSAGE = [
        'CREATE_SUCCESS' => 'Service Create Success',
        'UPDATE_SUCCESS' => 'Service Update Success',
        'DELETE_SUCCESS' => 'Service Delete Success',
    ];

    /**
     * @var array
     */
    public const SETTING_MESSAGE = [
        'UPDATE_SUCCESS' => 'Setting Update Success',
    ];

    /**
     * @var array
     */
    public const TESTIMONIAL_MESSAGE = [
        'CREATE_SUCCESS' => 'Testimonial Create Success',
        'UPDATE_SUCCESS' => 'Testimonial Update Success',
        'DELETE_SUCCESS' => 'Testimonial Delete Success',
    ];

    /**
     * @var array
     */
    public const FEATURE_MESSAGE = [
        'CREATE_SUCCESS' => 'Feature Create Success',
        'UPDATE_SUCCESS' => 'Feature Update Success',
        'DELETE_SUCCESS' => 'Feature Delete Success',
    ];

    /**
     * @var array
     */
    public const PRODUCT_FEATURE_MESSAGE = [
        'CREATE_SUCCESS' => 'Product Feature Create Success',
        'UPDATE_SUCCESS' => 'Product Feature Update Success',
        'CANNOT_UPDATE' => 'Cannot Update the Feature as it does not belong to the Product',
        'DELETE_SUCCESS' => 'Product Feature Delete Success',
        'CANNOT_DELETE' => 'Cannot Delete the Feature as it does not belong to the Product',
    ];

    /**
     * @var array
     */
    public const PRODUCT_APPLICATION_MESSAGE = [
        'CREATE_SUCCESS' => 'Product Application Create Success',
        'UPDATE_SUCCESS' => 'Product Application Update Success',
        'CANNOT_UPDATE' => 'Cannot Update the Application as it does not belong to the Product',
        'DELETE_SUCCESS' => 'Product Application Delete Success',
        'CANNOT_DELETE' => 'Cannot Delete the Application as it does not belong to the Product',
    ];

    /**
     * @var array
     */
    public const PRODUCT_FAQ_MESSAGE = [
        'CREATE_SUCCESS' => 'Product FAQ Create Success',
        'UPDATE_SUCCESS' => 'Product FAQ Update Success',
        'CANNOT_UPDATE' => 'Cannot Update the FAQ as it does not belong to the Product',
        'DELETE_SUCCESS' => 'Product FAQ Delete Success',
        'CANNOT_DELETE' => 'Cannot Delete the FAQ as it does not belong to the Product',
    ];
}
