<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\StoryRequest;
use App\Http\Requests\Web\SubscriptionRequest;
use App\Repositories\Eloquents\StoryEloquent;
use App\Repositories\Eloquents\SubscriptionsEloquent;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
    private $subscription;

    public function __construct(SubscriptionsEloquent $subscription)
    {
        $this->subscription = $subscription;
    }

    public function index()
    {
        return view(admin_vw() . '.constants.subscriptions.index');
    }

    public function create()
    {
        return view(admin_vw() . '.constants.subscriptions.create');
    }

    public function edit($id)
    {
        $subscription = $this->subscription->getById($id);
        $data = [
            'subscription' => $subscription
        ];
        return view(admin_vw() . '.constants.subscriptions.edit', $data);
    }

    public function anyData()
    {
        return $this->subscription->anyData();
    }


    public function store(SubscriptionRequest $request)
    {
        return $this->subscription->create($request->all());
    }

    public function update(SubscriptionRequest $request, $id)
    {
        return $this->subscription->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->subscription->delete($id);
    }
}
