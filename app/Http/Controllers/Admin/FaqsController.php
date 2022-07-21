<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\FaqsRequest;
use App\Repositories\Eloquents\FaqsEloquent;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    //

    private $faqs;

    public function __construct(FaqsEloquent $faqs)
    {
        $this->faqs = $faqs;
    }

    public function index()
    {
        return view(admin_vw() . '.website.faqs.index');
    }

    public function create()
    {
        return view(admin_vw() . '.website.faqs.create');
    }

    public function edit($id)
    {
        $faqs = $this->faqs->getById($id);
        $data = [
            'faqs' => $faqs
        ];
        return view(admin_vw() . '.website.faqs.edit', $data);
    }

    public function anyData()
    {
        return $this->faqs->anyData();
    }


    public function store(FaqsRequest $request)
    {
        return $this->faqs->create($request->all());
    }

    public function update(FaqsRequest $request, $id)
    {
        return $this->faqs->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->faqs->delete($id);
    }

}
