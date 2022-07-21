<?php
/**
 * Created by PhpStorm.
 * UserRequest: mohammedsobhei
 * Date: 5/2/18
 * Time: 11:43 PM
 */

namespace App\Repositories\Eloquents;

use App\ContactUs;
use App\Repositories\Interfaces\Repository;
use App\Repositories\Uploader;
use App\Story;
use App\StoryTranslation;
use App\Subscription;
use App\SubscriptionTranslation;
use Illuminate\Support\Facades\Config;

class ContactEloquent extends Uploader implements Repository
{

    private $model;

    public function __construct(ContactUs $model)
    {
        $this->model = $model;
    }

    function anyData()
    {

        $data = $this->model->orderByDesc('updated_at');

        return datatables()->of($data)
            ->addColumn('action', function ($item) {

                return '

                                    <a href="' . url(admin_contactus_url() . '/' . $item->id) . '" class="btn btn-circle btn-icon-only red delete">
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

    }

    function update(array $attributes, $id = null)
    {
        // TODO: Implement update() method.
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
