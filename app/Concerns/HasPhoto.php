<?php

namespace App\Concerns;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasPhoto
{
    /**
     * Update the model's photo.
     *
     * @param  string  $storagePath
     * @return void
     */
    public function updatePhoto(UploadedFile $photo, $storagePath = 'photos')
    {
        tap($this->photo_path, function ($previous) use ($photo, $storagePath) {
            $this->forceFill([
                'photo_path' => $photo->store(
                    $storagePath,
                    ['disk' => $this->photoDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->photoDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the model's photo.
     *
     * @return void
     */
    public function deletePhoto()
    {
        if (is_null($this->photo_path)) {
            return;
        }

        Storage::disk($this->photoDisk())->delete($this->photo_path);

        $this->forceFill([
            'photo_path' => null,
        ])->save();
    }

    /**
     * Get the URL to the model's photo.
     */
    public function photoUrl(): Attribute
    {
        return Attribute::get(function (): string {
            return $this->photo_path
                    ? Storage::disk($this->photoDisk())->url($this->photo_path)
                    : $this->defaultPhotoUrl();
        });
    }

    /**
     * Get the default photo URL if no photo has been uploaded.
     *
     * @return string
     */
    protected function defaultPhotoUrl()
    {
        $name = trim(collect(explode(' ', $this->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name='.urlencode($name).'&color=FFF&background=f59e0b';
    }

    /**
     * Get the disk that photos should be stored on.
     */
    protected function photoDisk(): string
    {
        return config('filesystems.photo_disk');
    }
}
