<?php
namespace Czim\CmsMediaModule\Storage\File;

use Czim\CmsMediaModule\Contracts\Storage\StorableFileInterface;

abstract class AbstractStorableFile implements StorableFileInterface
{

    /**
     * @var string|null
     */
    protected $mimeType;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var int|null
     */
    protected $size;


    /**
     * Initializes the storable file with mixed data.
     *
     * @param mixed $data
     * @return $this
     */
    abstract public function setData($data);

    /**
     * Sets the name for the file.
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Sets the mime type for the file.
     *
     * @param string $type
     * @return $this
     */
    public function setMimeType($type)
    {
        $this->mimeType = $type;

        return $this;
    }

    /**
     * Returns the content type of the file.
     *
     * @return string|null
     */
    public function mimeType()
    {
        return $this->mimeType;
    }

    /**
     * Returns the (storage) name for the file.
     *
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * Returns the extension for the file.
     *
     * @return string|null
     */
    public function extension()
    {
        if (null === $this->name) {
            return null;
        }

        return pathinfo($this->name, PATHINFO_EXTENSION);
    }

    /**
     * Returns the size of the file in bytes.
     *
     * @return int
     */
    public function size()
    {
        return $this->size;
    }

}
