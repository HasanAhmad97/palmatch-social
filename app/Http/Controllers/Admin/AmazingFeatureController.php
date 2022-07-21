<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\FeatureRequest;
use App\Repositories\Eloquents\AmazingFeatureEloquent;
use Illuminate\Http\Request;

class AmazingFeatureController extends Controller
{
    //

    private $amazingFeature;

    public function __construct(AmazingFeatureEloquent $amazingFeature)
    {
        $this->amazingFeature = $amazingFeature;
    }

    public function index()
    {
        return view(admin_vw() . '.website.amazing.index');
    }

    public function create()
    {
        return view(admin_vw() . '.website.amazing.create');
    }

    public function edit($id)
    {
        $amazingFeature = $this->amazingFeature->getById($id);
        $data = [
            'amazingFeature' => $amazingFeature
        ];
        return view(admin_vw() . '.website.amazing.edit', $data);
    }

    public function anyData()
    {
        return $this->amazingFeature->anyData();
    }


    public function store(FeatureRequest $request)
    {
        return $this->amazingFeature->create($request->all());
    }

    public function update(FeatureRequest $request, $id)
    {
        return $this->amazingFeature->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->amazingFeature->delete($id);
    }

}
