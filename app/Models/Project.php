<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getFileAttribute($link): ?string
    {
        return env('APP_URL')  . $link;
    }

    public function images(): HasMany
    {
        return $this->hasMany(SliderImages::class, 'type_id', 'id')->where('type', Project::class);
    }
    
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($file) {
            // Perform file deletion
            $data = DB::table('projects')->where('id', $file->id)->first();
            
            $projectSliderImages = DB::table('slider_images')->where('type', Project::class)->where('type_id', $data->id)->get();
            
            if ($projectSliderImages) {
                foreach ($projectSliderImages as $slider) {
                    $filePath = public_path($slider->file);

                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }

            $filePath = public_path($data->file);

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        });
    }
}
