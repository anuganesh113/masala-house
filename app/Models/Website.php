<?php

namespace App\Models;

use App\Enums\UploadFilePath;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    
  protected $fillable = [
        'name',
        'value',
    ];

    public function getFullBackgroundImageLinkAttribute(): ?string
    {
        if (empty($this->section_2_background_image)) {
            return  asset('site-assets/images/menu.png');
        }

        return asset(sprintf('%s%s', UploadFilePath::HOME_PATH, $this->section_2_background_image));
    }

}
