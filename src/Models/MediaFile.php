<?php
namespace Czim\CmsMediaModule\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MediaFile
 *
 * @property int $id
 * @property string $slug
 * @property string $reference
 * @property string $folder
 * @property string $name
 * @property string $description
 * @property string $file
 * @property string $uploader
 * @property bool $image
 */
class MediaFile extends Model
{
    protected $table = 'media_files';

    protected $fillable = [
        'slug',
        'reference',
        'folder',
        'name',
        'description',
        'file',
        'uploader',
        'image',
    ];

    protected $casts = [
        'image' => 'boolean',
    ];


    /**
     * Override to add configured database prefix
     *
     * {@inheritdoc}
     */
    public function getTable()
    {
        return $this->getCmsTablePrefix() . parent::getTable();
    }

    /**
     * Override to force the database connection
     *
     * {@inheritdoc}
     */
    public function getConnectionName()
    {
        return $this->getCmsDatabaseConnection() ?: $this->connection;
    }

    /**
     * @return string
     */
    protected function getCmsTablePrefix()
    {
        return config('cms-core.database.prefix', '');
    }

    /**
     * @return string|null
     */
    protected function getCmsDatabaseConnection()
    {
        return config('cms-core.database.driver');
    }

}
