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
use App\User;
use App\UserSubscription;
use App\StoryTranslation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class SubscriptionManagementEloquent extends Uploader implements Repository
{

    private $model;

    public function __construct(UserSubscription $model)
    {
        $this->model = $model;
    }

    function anyData()
    {

        $data = $this->model->orderByDesc('updated_at')->get()->unique('user_id');

        return datatables()->of($data)

            ->addColumn('subscription_duration', function ($item) {

                return isset($item->Subscription) ? $item->Subscription->duration: '-';
            })
            ->addColumn('subscription_cost', function ($item) {

                return isset($item->Subscription) ? "$" . $item->Subscription->cost: '-';
            })
            ->addColumn('subscription_type', function ($item) {

                return isset($item->Subscription) ? $item->Subscription->duration_type: '-';
            })
            ->editColumn('subscription_type', function ($item) {
                if($item->Subscription->duration_type == "month")
                    return "Monthly";

                if($item->Subscription->duration_type == "year")
                    return "Yearly";

            })
            ->addColumn('subscription_name', function ($item) {

                return isset($item->Subscription) ? $item->Subscription->translation()->title: '-';
            })
            ->addColumn('user_name', function ($item) {
                $userName= isset($item->User) ? $item->User->name : '-';
                $url= url('/admin/users/' . $item->User->id . '/view');
                return ' <a href="'.$url.'">'. $userName.'</a>';})

            ->addColumn('action', function ($item) {
                return '<a href="' . url('/admin/subscriptions_management/' . $item->id . '/view') . '" class="btn btn-circle btn-icon-only blue">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    ';
            })->addIndexColumn()
            ->rawColumns([ 'action' , 'user_name'])->toJson();
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

    }

    function update(array $attributes, $id = null)
    {
        // TODO: Implement update() method.
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
    }


}
