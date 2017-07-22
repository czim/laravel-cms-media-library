<?php
namespace Czim\CmsMediaModule\Storage\File;

use Illuminate\Support\Facades\File;
use SplFileInfo;
use Symfony\Component\HttpFoundation\File\File as SymfonyFile;
use UnexpectedValueException;

class SplFileInfoStorableFile extends AbstractStorableFile
{

    /**
     * @var SplFileInfo
     */
    protected $file;


    /**
     * Initializes the storable file with mixed data.
     *
     * @param mixed $data
     * @return $this
     */
    public function setData($data)
    {
        if ( ! ($data instanceof SplFileInfo)) {
            throw new UnexpectedValueException('Expected SplFileInfo instance');
        }

        $this->file = $data;

        $this->setDerivedFileProperties();

        return $this;
    }

    /**
     * Sets properties based on the given data.
     */
    protected function setDerivedFileProperties()
    {
        if ( ! File::exists($this->file->getRealPath())) {
            throw new \RuntimeException("Local file not found at {$this->file->getRealPath()}");
        }

        $this->size = $this->file->getSize();
        $this->name = $this->file->getBasename();

        if ($this->file instanceof SymfonyFile) {
            $this->mimeType = $this->file->getMimeType();
        } else {
            $this->mimeType = File::mimeType($this->file->getRealPath());
        }
    }

    /**
     * Returns raw content of the file.
     *
     * @return string
     */
    public function content()
    {
        return File::get($this->file->getRealPath());
    }

}
