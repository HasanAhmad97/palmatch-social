<?php
/**
 * Created by PhpStorm.
 * UserRequest: mohammedsobhei
 * Date: 5/2/18
 * Time: 11:43 PM
 */

namespace App\Repositories\Eloquents;

use App\EmailsSubscription;
use App\Mail\SendEmail;
use App\Repositories\Interfaces\Repository;
use App\Repositories\Uploader;
use App\Story;
use App\StoryTranslation;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class EmailSubscriptionsEloquent extends Uploader implements Repository
{

    private $model, $translation;

    public function __construct(EmailsSubscription $model)
    {
        $this->model = $model;
    }

    function anyData()
    {

        $data = $this->model->orderByDesc('updated_at');

        return datatables()->of($data)
            ->editColumn('icon', function ($item) {

                return '<i class="' . $item->icon . '"></i>';
            })
            ->editColumn('sendAll', function ($item) {
                return '<input type="checkbox" class="sub_chk" name="email_id[]" value=' . $item->id . ' data-id="' . $item->id . '">';
            })
            ->addColumn('action', function ($item) {

                return '<a href="' . url(admin_Subscriptions_url() . '/email-edit/' . $item->id) . '" class="btn btn-circle btn-icon-only purple edit-email-mdl">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="' . url(admin_Subscriptions_url() . '/send-email/' . $item->id) . '" class="btn btn-circle btn-icon-only blue send-email-mdl">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                    <a href="' . url(admin_Subscriptions_url() . '/email-delete/' . $item->id) . '" class="btn btn-circle btn-icon-only red delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    ';
            })->addIndexColumn()
            ->rawColumns(['icon', 'sendAll', 'action'])->toJson();
    }

    public function modal_create()
    {
        $view = view()->make(admin_vw() . '.modal', [
            'modal_id' => 'add-email',
            'modal_title' => 'Add Email',
            'icon' => '<i class="fa fa-plus"></i>',
            'action' => '<button type="submit" class="btn green"><i class="fa fa-plus"></i> Add </button>',
            'form' => [
                'method' => 'POST',
                'url' => url(admin_Subscriptions_url() . '/email-create'),
                'form_id' => 'formAdd',
                'fields' => [
                    'email' => 'email',
                ], 'fields_name' => [
                    'email' => 'Email',
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
                'modal_id' => 'edit-email',
                'modal_title' => 'Edit Email',
                'icon' => '<i class="fa fa-edit"></i>',
                'action' => '<button type="submit" class="btn purple"><i class="fa fa-edit"></i> Edit </button>',
                'form' => [
                    'method' => 'PUT',
                    'url' => url(admin_Subscriptions_url() . '/email-edit/' . $id),
                    'form_id' => 'formEdit',
                    'fields' => [
                        'email' => 'email',
                    ], 'fields_name' => [
                        'email' => 'Email',
                    ], 'values' => [
                        'email' => $item->email,

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
        $model = EmailsSubscription::create($attributes);
        if ($model) {
            return response_api(true, 200, __('app.success'), $model);
        }
        return response_api(false, 422, __('app.error'));


    }

    function update(array $attributes, $id = null)
    {
        // TODO: Implement update() method.
        $model = EmailsSubscription::where('id', $id)->update($attributes);
        if (isset($model)) {
            return response_api(true, 200, __('app.success'), $model);
        }
        return response_api(false, 422, __('app.error'));
    }

    function SendEmail(array $attributes, $id = null)
    {
        // TODO: Implement update() method.


        $message = $this->model->find($id);
        Mail::send(new SendEmail($message, $attributes['message']));

        if ($message->save()) {
            return response_api(true, 200, trans('app.success'), $message);
        }
        return response_api(false, 422, trans('app.error'));
    }

    function sendEmailToAll(array $attributes)
    {
        // TODO: Implement update() method.

        $emails_id = $attributes['emails'][0];

        if (isset($emails_id))
            $emails_id = explode(',', $emails_id);
        else
            return response_api(false, 422, trans('app.not_updated'));

        $emails = EmailsSubscription::whereIn('id', $emails_id)->pluck('email');

        foreach ($emails as $email)
            Mail::send(new SendEmail($email, $attributes['message']));

//        if ($message->save()) {
        return response_api(true, 200, __('app.updated'), $attributes['message']);
//        }
//        return response_api(false, 422, trans('app.not_updated'));
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
