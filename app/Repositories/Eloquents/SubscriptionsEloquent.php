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
use App\Story;
use App\StoryTranslation;
use App\Subscription;
use App\SubscriptionTranslation;
use Illuminate\Support\Facades\Config;

class SubscriptionsEloquent extends Uploader implements Repository
{

    private $model, $translation;

    public function __construct(Subscription $model, SubscriptionTranslation $translation)
    {
        $this->model = $model;
        $this->translation = $translation;
    }

    function anyData()
    {

        $data = $this->model->orderByDesc('updated_at');

        return datatables()->of($data)
            ->addColumn('title', function ($item) {
                return $item->translation()->title;
            })
            ->editColumn('duration_type', function ($item) {
                if($item->duration_type == "month")
                    return "Monthly";

                if($item->duration_type == "year")
                    return "Yearly";

            })
            ->editColumn('cost', function ($item) {
                    return "$" . $item->cost;

            })->addColumn('action', function ($item) {

                return '
                                    <a href="' . url(admin_constants_url() . '/subscription-edit/' . $item->id) . '" class="btn btn-circle btn-icon-only purple edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="' . url(admin_constants_url() . '/subscription/' . $item->id) . '" class="btn btn-circle btn-icon-only red delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    ';
            })->addIndexColumn()
            ->rawColumns([ 'action'])->toJson();
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
//        dd($attributes);
        // TODO: Implement create() method.
        $model = Subscription::create(
            ['duration' => $attributes['duration']
            ,'duration_type' => $attributes['duration_type']
            ,'cost' => $attributes['cost']
            ]);
        if ($model) {
            $languages = Config::get('languages.supported');
            foreach ($languages as $language) {
                $model->translationModel($language)->update(
                    ['title' => $attributes['title'][$language]
                    ,'description' => $attributes['description'][$language]]
                );
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

            $model->update(
                ['duration' => $attributes['duration']
                    ,'duration_type' => $attributes['duration_type']
                    ,'cost' => $attributes['cost']
                ]);

            $languages = Config::get('languages.supported');
            foreach ($languages as $language) {
                $model->translationModel($language)->update(['title' => $attributes['title'][$language], 'description' => $attributes['description'][$language]]);
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
