<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getFileAttribute($link): ?string
    {
        return env('APP_URL')  . $link;
    }
    
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($file) {
            // Perform file deletion
            $data = DB::table('members')->where('id', $file->id)->first();
            $filePath = public_path($data->file);

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        });
    }
}
