<?php
namespace Czim\CmsMediaModule\Repositories;

use Czim\CmsMediaModule\Contracts\Repositories\MediaFileRepositoryInterface;
use Czim\CmsMediaModule\Models\MediaFile;
use Illuminate\Support\Collection;

class MediaFileRepository implements MediaFileRepositoryInterface
{

    /**
     * Returns all media files.
     *
     * @return Collection|MediaFile[]
     */
    public function getAll()
    {
        return MediaFile::all();
    }

    /**
     * Returns a media file by ID.
     *
     * @param int $id
     * @return MediaFile|null
     */
    public function findById($id)
    {
        return MediaFile::find($id);
    }

    /**
     * Returns media files by reference.
     *
     * @param string $reference
     * @return Collection|MediaFile[]
     */
    public function findByReference($reference)
    {
        return MediaFile::where('reference', $reference)->get();
    }

    /**
     * Returns uploaded files by reference.
     *
     * @param string $slug
     * @return null|MediaFile
     */
    public function findBySlug($slug)
    {
        return MediaFile::where('slug', $slug)->first();
    }

    /**
     * Deletes a media file.
     *
     * @param int  $id
     * @return bool
     */
    public function delete($id)
    {
        if ( ! ($file = $this->findById($id))) {
            return true;
        }

        return $file->delete();
    }

}
