<?php
namespace Czim\CmsMediaModule\Support\Route;

use Illuminate\Routing\Router;

class ApiRouteMapper
{

    /**
     * @param Router $router
     */
    public function mapRoutes(Router $router)
    {
        $router->group(
            [
                'as'        => 'medialibrary.',
                'prefix'    => 'media',
                'namespace' => '\\Czim\\CmsMediaModule\\Http\\Controllers\\Api',
            ],
            function (Router $router)  {

                $router->group(
                    [
                        'as'         => 'file.',
                        'prefix'     => 'file',
                        'middleware' => [cms_mw_permission('medialibrary.file.*')],
                    ],
                    function (Router $router) {

                        //$router->post('/', [
                        //    'as'         => 'store',
                        //    'middleware' => [cms_mw_permission('medialibrary.file.create')],
                        //    'uses'       => 'MediaFileController@store',
                        //]);
                        //
                        //$router->post('{id}', [
                        //    'as'         => 'update',
                        //    'middleware' => [cms_mw_permission('medialibrary.file.edit')],
                        //    'uses'       => 'MediaFileController@update',
                        //]);
                        //
                        //$router->delete('{id}', [
                        //    'as'         => 'delete',
                        //    'middleware' => [cms_mw_permission('medialibrary.file.delete')],
                        //    'uses'       => 'MediaFileController@destroy',
                        //]);
                    }
                );
            }
        );
    }

}
