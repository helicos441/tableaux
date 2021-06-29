<?php

namespace App\Business;

use App\Models\Picture;

class PictureBusiness
{
    const PICTURES_DIRECTORY = 'images';

    public function createPicture(array $validatedData): Picture
    {
        $picture = Picture::create($validatedData);

        // Enregistrement de l'image dans le storage
        if (isset($validatedData['image'])) {
            $imageName = $this->generatePictureName($validatedData['image']->extension());
            $validatedData['image']->move(public_path(self::PICTURES_DIRECTORY), $imageName);

            // TODO redimensionnement de l'image si nécessaire

            $picture->path = $imageName;
            $picture->save();
        }

        return $picture;
    }

    public function updatePicture(Picture $picture, array $validatedData): Picture
    {
        $picture->update($validatedData);

        // Enregistrement de l'image dans le storage
        if (isset($validatedData['image'])) {
            // Si une image existe déjà, on la supprime
            if ($picture->path) {
                $this->removePictureFile($picture);
            }

            // TODO redimensionnement de l'image si nécessaire

            $imageName = $this->generatePictureName($validatedData['image']->extension());
            $validatedData['image']->move(public_path(self::PICTURES_DIRECTORY), $imageName);
            $picture->path = $imageName;
            $picture->save();
        }

        return $picture;
    }

    public function deletePicture(Picture $picture)
    {
        if ($picture->path) {
            $this->removePictureFile($picture);
        }

        $picture->delete();
    }

    private function generatePictureName(string $extension): string
    {
        return time(). '.' .$extension;
    }

    private function removePictureFile(Picture $picture)
    {
        $path = $picture->getPath();
        unlink(public_path($path));
    }
}
