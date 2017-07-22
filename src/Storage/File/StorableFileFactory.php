<?php
namespace Czim\CmsMediaModule\Storage\File;

use Czim\CmsMediaModule\Contracts\Storage\StorableFileInterface;
use RuntimeException;
use SplFileInfo;

class StorableFileFactory
{

    /**
     * Makes a normalized storable file instance.
     *
     * @param mixed       $data
     * @param string|null $name     the file name, if data does not include it
     * @return StorableFileInterface
     */
    public function make($data, $name = null)
    {
        if ($data instanceof SplFileInfo) {
            /** @var SplFileInfoStorableFile $file */
            $file = app(SplFileInfoStorableFile::class);

            return $file->setData($data);
        }

        if (is_string($data)) {

            // todo
            // determine, if string, if it is a path
            // a url
            // a datauri
            // or plain file content

        }



        throw new RuntimeException('Could not make storable file for given data type');
    }

}
