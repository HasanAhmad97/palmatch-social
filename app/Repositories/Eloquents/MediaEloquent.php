<?php
/**
 * Created by PhpStorm.
 * UserRequest: mohammedsobhei
 * Date: 5/2/18
 * Time: 11:43 PM
 */

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\Repository;
use App\Repositories\Uploader;
use App\SocialMedia;
use App\Story;
use App\StoryTranslation;
use Illuminate\Support\Facades\Config;

class MediaEloquent extends Uploader implements Repository
{

    private $model, $translation;

    public function __construct(SocialMedia $model)
    {
        $this->model = $model;
    }

    function anyData()
    {

        $data = $this->model->orderByDesc('updated_at');

        return datatables()->of($data)
            ->editColumn('icon', function ($item) {

                return '<i class="' . $item->icon . '"></i>';
            })->addColumn('action', function ($item) {

                return '<a href="' . url(admin_web_url() . '/media-edit/' . $item->id) . '" class="btn btn-circle btn-icon-only purple edit-media-mdl">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="' . url(admin_web_url() . '/media/' . $item->id) . '" class="btn btn-circle btn-icon-only red delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    ';
            })->addIndexColumn()
            ->rawColumns(['icon', 'action'])->toJson();
    }

    public function modal_create()
    {
        $view = view()->make(admin_vw() . '.modal', [
            'modal_id' => 'add-media',
            'modal_title' => 'Add Social Links',
            'icon' => '<i class="fa fa-plus"></i>',
            'action' => '<button type="submit" class="btn green"><i class="fa fa-plus"></i> Add </button>',
            'form' => [
                'method' => 'POST',
                'url' => url(admin_web_url() . '/media-create'),
                'form_id' => 'formAdd',
                'fields' => [
                    'icon' => 'text',
                    'name' => 'text',
                    'link' => 'text',
                ], 'fields_name' => [
                    'icon' => 'Icon',
                    'name' => 'Name',
                    'link' => 'Name',
                ],
            ]
        ]);

        $html = $view->render();

        return $html;
    }

    public function modal_update($id)
    {
        $item = $this->model->find($id);

        if (isset($item)) {
            $view = view()->make(admin_vw() . '.modal', [
                'modal_id' => 'edit-media',
                'modal_title' => 'Edit Social Links',
                'icon' => '<i class="fa fa-edit"></i>',
                'action' => '<button type="submit" class="btn purple"><i class="fa fa-edit"></i> Edit </button>',
                'form' => [
                    'method' => 'PUT',
                    'url' => url(admin_web_url() . '/media-edit/' . $id),
                    'form_id' => 'formEdit',
                    'fields' => [
                        'icon' => 'text',
                        'name' => 'text',
                        'link' => 'text',
                    ], 'fields_name' => [
                        'icon' => 'Icon',
                        'name' => 'Name',
                        'link' => 'Link',
                    ], 'values' => [
                        'icon' => $item->icon,
                        'name' => $item->name,
                        'link' => $item->link,

                    ],
                ]
            ]);

            $html = $view->render();

            return $html;
        }
        return 'error';
    }

    function getAll(array $attributes)
    {
        // TODO: Implement getAll() method.
        $data = $this->model->all();
        if (request()->segment(1) == 'api') {
            return response_api(true, 200, null, $data);
        }
        return $data;
    }

    function getById($id)
    {
        // TODO: Implement getById() method.
        return $this->model->find($id);
    }

    function create(array $attributes)
    {
        // TODO: Implement create() method.
        $model = SocialMedia::create($attributes);
        if ($model) {
            return response_api(true, 200, __('app.success'), $model);
        }
        return response_api(false, 422, __('app.error'));


    }

    function update(array $attributes, $id = null)
    {
        // TODO: Implement update() method.
        $model = SocialMedia::where('id', $id)->update($attributes);
        if (isset($model)) {
            return response_api(true, 200, __('app.success'), $model);
        }
        return response_api(false, 422, __('app.error'));
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
        $model = $this->model->find($id);

        if (isset($model) && $model->delete())
            return response_api(true, 200, __('app.success'), []);
        return response_api(false, 422, __('app.error'), []);

    }

}
