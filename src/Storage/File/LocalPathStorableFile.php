<?php
namespace Czim\CmsMediaModule\Storage\File;

use Illuminate\Support\Facades\File;
use UnexpectedValueException;

class LocalPathStorableFile extends AbstractStorableFile
{

    /**
     * @var string
     */
    protected $localPath;


    /**
     * Initializes the storable file with mixed data.
     *
     * @param mixed $data
     * @return $this
     */
    public function setData($data)
    {
        if ( ! is_string($data)) {
            throw new UnexpectedValueException('Expected string with local path');
        }

        $this->localPath = $data;

        $this->setDerivedFileProperties();

        return $this;
    }

    /**
     * Sets properties based on the given data.
     */
    protected function setDerivedFileProperties()
    {
        if ( ! File::exists($this->localPath)) {
            throw new \RuntimeException("Local file not found at {$this->localPath}");
        }

        $this->size     = File::size($this->localPath);
        $this->mimeType = File::mimeType($this->localPath);

        if (null === $this->name) {
            $this->name = pathinfo($this->localPath, PATHINFO_BASENAME);
        }
    }

    /**
     * Returns raw content of the file.
     *
     * @return string
     */
    public function content()
    {
        return File::get($this->localPath);
    }

}
