<?php
namespace Czim\CmsMediaModule\Http\Controllers;

use Czim\CmsCore\Contracts\Core\CoreInterface;
use Czim\CmsMediaModule\Contracts\Repositories\MediaFileRepositoryInterface;

class MediaFileController extends Controller
{

    /**
     * @var MediaFileRepositoryInterface
     */
    protected $fileRepository;

    /**
     * @param CoreInterface           $core
     * @param MediaFileRepositoryInterface $fileRepository
     */
    public function __construct(
        CoreInterface $core,
        MediaFileRepositoryInterface $fileRepository
    ) {
        parent::__construct($core);

        $this->fileRepository = $fileRepository;
    }


    /**
     * Action: media file record listing.
     *
     * @return mixed
     */
    public function index()
    {
        return null;
    }

    /**
     * Action: form to create a new media file record.
     *
     * @return mixed
     */
    public function create()
    {
        return null;
    }

    /**
     * Action: store a new media file record.
     *
     * @return mixed
     */
    public function store()
    {
        return null;
    }

    /**
     * Action: form to edit a media file record.
     *
     * @param int $id
     * @return mixed
     */
    public function edit($id)
    {
        return null;
    }

    /**
     * Action: update a new media file record.
     *
     * @param int $id
     * @return mixed
     */
    public function update($id)
    {
        return null;
    }

    /**
     * Action: delete an existing media file record.
     *
     * @param int $id
     * @return mixed
     */
    public function destroy($id)
    {
        return null;
    }

}
