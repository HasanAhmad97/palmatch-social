<?php

namespace App\Http\Controllers\Admin;

use App\EmailsSubscription;
use App\Http\Controllers\Controller;
use App\Http\Requests\emailSubscriptions\CreateEmailSubscriptionsRequest;
use App\Repositories\Eloquents\EmailSubscriptionsEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use MongoDB\Driver\Session;

class EmailSubscriptionsController extends Controller
{
    private $mail;

    public function __construct(EmailSubscriptionsEloquent $mail)
    {
        $this->mail = $mail;
    }

    public function index()
    {
        $emails = EmailsSubscription::all();
        return view(admin_vw() . '.emailSubscriptions.index', compact('emails'));
    }

    public function create()
    {
        return $this->mail->modal_create();
    }

    public function edit($id)
    {
        return $this->mail->modal_update($id);

    }

    public function anyData()
    {
        return $this->mail->anyData();
    }


    public function store(CreateEmailSubscriptionsRequest $request)
    {
        return $this->mail->create($request->all());
    }

    public function update(CreateEmailSubscriptionsRequest $request, $id)
    {
        return $this->mail->update($request->only(['email']), $id);
    }


    public function replay($id)
    {
        $message = $this->mail->getById($id);
        $f1 = [
            'email' => 'text',
            'message' => 'textarea',
        ];
        $v1 = [
            'email' => $message->email,
            'message' => '',
        ];
        $f_n = [
            'email' => 'Email',
            'message' => 'Message',
        ];

        $html = 'This item does not exist';
        if (isset($message)) {
            $view = view()->make(admin_vw() . '.email-modal', [
                'modal_id' => 'send-email',
                'modal_title' => 'Send Email',
                'icon' => '<i class="fa fa-edit"></i>',
                'action' => '<button type="submit" class="btn purple"><i class="fa fa-edit"></i> Send </button>',
                'form' => [
                    'method' => 'PUT',
                    'url' => url(admin_Subscriptions_url() . '/send-email/' . $id),
                    'form_id' => 'formEdit',
                    'fields' => $f1,
                    'values' => $v1,
                    'fields_name' => $f_n
                ]
            ]);

            $html = $view->render();
        }
        return $html;
    }


    public function sendEmail($id, Request $request)
    {
        return $this->mail->SendEmail($request->all(), $id);
    }

    public function sendEmailToAll(Request $request)
    {

        return $this->mail->sendEmailToAll($request->all());
    }

    public function replyEmailToAll(Request $request)
    {
//        $message= $this->mail->getAll();
//            dd($request->all());
        $message = EmailsSubscription::where('id', $request->email_id)->get();
//        dd($message);


        $f1 = [
            'message' => 'textarea',
        ];
        $v1 = [
            'message' => '',
        ];
        $f_n = [
            'message' => 'Message',
        ];

        $html = 'This item does not exist';
        if (isset($message)) {
            $view = view()->make(admin_vw() . '.email-modal', [
                'modal_id' => 'send-email-all',
                'modal_title' => 'Send Email',
                'icon' => '<i class="fa fa-edit"></i>',
                'action' => '<button type="submit" class="btn purple"><i class="fa fa-edit"></i> Send </button>',
                'form' => [
                    'method' => 'POST',
                    'url' => url(admin_Subscriptions_url() . '/send-email-all'),
                    'form_id' => 'formEdit',
                    'fields' => $f1,
                    'values' => $v1,
                    'fields_name' => $f_n
                ]
            ]);

            $html = $view->render();
        }
        return $html;
    }

    public function delete($id)
    {
        return $this->mail->delete($id);
    }
}
