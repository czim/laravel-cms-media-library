<?php
namespace Czim\CmsMediaModule\Modules;

use Czim\CmsCore\Contracts\Core\CoreInterface;
use Czim\CmsCore\Support\Enums\MenuPresenceType;
use Czim\CmsMediaModule\Support\Route\ApiRouteMapper;
use Czim\CmsMediaModule\Support\Route\WebRouteMapper;
use Czim\CmsCore\Contracts\Modules\ModuleInterface;
use Czim\CmsCore\Support\Enums\AclPresenceType;
use Illuminate\Routing\Router;

class MediaModule implements ModuleInterface
{

    /**
     * @var string
     */
    const VERSION = '1.0.0';


    /**
     * @var CoreInterface
     */
    protected $core;

    /**
     * @param CoreInterface $core
     */
    public function __construct(CoreInterface $core)
    {
        $this->core = $core;
    }


    /**
     * Returns unique identifying key for the module.
     * This should also be able to perform as a slug for it.
     *
     * @return string
     */
    public function getKey()
    {
        return 'media-library';
    }

    /**
     * Returns display name for the module.
     *
     * @return string
     */
    public function getName()
    {
        return 'Media Library';
    }

    /**
     * Returns release/version number of module.
     *
     * @return string
     */
    public function getVersion()
    {
        return static::VERSION;
    }

    /**
     * Returns the FQN for a class mainly associated with this module.
     *
     * @return string|null
     */
    public function getAssociatedClass()
    {
        return null;
    }

    /**
     * Generates web routes for the module given a contextual router instance.
     * Note that the module is responsible for ACL-checks, including route-based.
     *
     * @param Router $router
     */
    public function mapWebRoutes(Router $router)
    {
        (new WebRouteMapper())->mapRoutes($router);
    }

    /**
     * Generates API routes for the module given a contextual router instance.
     * Note that the module is responsible for ACL-checks, including route-based.
     *
     * @param Router $router
     */
    public function mapApiRoutes(Router $router)
    {
        (new ApiRouteMapper())->mapRoutes($router);
    }

    /**
     * @return array
     */
    public function getAclPresence()
    {
        return [
            [
                'id'          => 'media-library',
                'label'       => 'Media Library',
                'type'        => AclPresenceType::GROUP,
                'permissions' => [
                    'medialibrary.file.show',
                    'medialibrary.file.create',
                    'medialibrary.file.edit',
                    'medialibrary.file.delete',
                ],
            ],
        ];
    }

    /**
     * Returns data for CMS menu presence.
     *
     * @return null
     */
    public function getMenuPresence()
    {
        return [
            [
                'id'          => 'media-library-home',
                'label'       => 'Media Library',
                'type'        => MenuPresenceType::ACTION,
                'permissions' => 'medialibrary.file.*',
                'action'      => $this->core->prefixRoute('medialibrary.file.index'),
                'parameters'  => [],
            ],
        ];
    }

}
