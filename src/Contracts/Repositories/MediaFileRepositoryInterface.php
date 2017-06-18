<?php
namespace Czim\CmsMediaModule\Contracts\Repositories;

use Czim\CmsMediaModule\Models\MediaFile;
use Illuminate\Support\Collection;

interface MediaFileRepositoryInterface
{

    /**
     * Returns all media files.
     *
     * @return Collection|MediaFile[]
     */
    public function getAll();

    /**
     * Returns a media file by ID.
     *
     * @param int $id
     * @return MediaFile|null
     */
    public function findById($id);

    /**
     * Returns media files by reference.
     *
     * @param string $reference
     * @return Collection|MediaFile[]
     */
    public function findByReference($reference);

    /**
     * Returns uploaded files by reference.
     *
     * @param string $slug
     * @return null|MediaFile
     */
    public function findBySlug($slug);

    /**
     * Deletes a media file.
     *
     * @param int  $id
     * @return bool
     */
    public function delete($id);

}
