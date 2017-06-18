<?php
namespace Czim\CmsMediaModule\Support\Route;

use Illuminate\Routing\Router;

class WebRouteMapper
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
                'namespace' => '\\Czim\\CmsMediaModule\\Http\\Controllers',
            ],
            function (Router $router)  {

                $router->group(
                    [
                        'as'         => 'file.',
                        'prefix'     => 'file',
                        'middleware' => [cms_mw_permission('fileupload.file.*')],
                    ],
                    function (Router $router) {

                        $router->get('/', [
                            'as'   => 'index',
                            'uses' => 'MediaFileController@index',
                        ]);

                        $router->get('create', [
                            'as'         => 'create',
                            'middleware' => [cms_mw_permission('medialibrary.file.create')],
                            'uses'       => 'MediaFileController@create',
                        ]);

                        $router->post('/', [
                            'as'         => 'store',
                            'middleware' => [cms_mw_permission('medialibrary.file.create')],
                            'uses'       => 'MediaFileController@store',
                        ]);

                        $router->get('edit', [
                            'as'         => 'edit',
                            'middleware' => [cms_mw_permission('medialibrary.file.edit')],
                            'uses'       => 'MediaFileController@edit',
                        ]);

                        $router->post('{id}', [
                            'as'         => 'update',
                            'middleware' => [cms_mw_permission('medialibrary.file.edit')],
                            'uses'       => 'MediaFileController@update',
                        ]);

                        $router->delete('{id}', [
                            'as'         => 'delete',
                            'middleware' => [cms_mw_permission('medialibrary.file.delete')],
                            'uses'       => 'MediaFileController@destroy',
                        ]);
                    }
                );
            }
        );
    }

}
