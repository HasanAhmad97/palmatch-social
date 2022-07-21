<?php
/**
 * Created by PhpStorm.
 * UserRequest: mohammedsobhei
 * Date: 5/2/18
 * Time: 11:43 PM
 */

namespace App\Repositories\Eloquents;

use App\Interest;
use App\InterestTranslation;
use App\Repositories\Interfaces\Repository;
use App\Repositories\Uploader;
use Illuminate\Support\Facades\Config;

class InterestEloquent extends Uploader implements Repository
{

    private $model, $translation;

    public function __construct(Interest $model, InterestTranslation $translation)
    {
        $this->model = $model;
        $this->translation = $translation;
    }

    function anyData()
    {

        $data = $this->model->orderByDesc('updated_at');

        return datatables()->of($data)
            ->addColumn('name', function ($item) {
                return $item->translation()->name;
            })->addColumn('action', function ($item) {

                return '
                                    <a href="' . url(admin_constants_url() . '/interest-edit/' . $item->id) . '" class="btn btn-circle btn-icon-only purple edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="' . url(admin_constants_url() . '/interest/' . $item->id) . '" class="btn btn-circle btn-icon-only red delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    ';
            })->addIndexColumn()
            ->rawColumns(['action'])->toJson();
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
        $model = new Interest();
        if ($model->save()) {
            $languages = Config::get('languages.supported');
            foreach ($languages as $language) {
                $model->translationModel($language)->update(['name' => $attributes['title'][$language]]);
            }
            return response_api(true, 200, __('app.success'), $model);
        }
        return response_api(false, 422, __('app.error'));


    }

    function update(array $attributes, $id = null)
    {
        // TODO: Implement update() method.
        $model = $this->model->find($id);
        if (isset($model)) {

            $languages = Config::get('languages.supported');
            foreach ($languages as $language) {
                $model->translationModel($language)->update(['name' => $attributes['title'][$language]]);
            }

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
