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
use App\Setting;
use App\SettingTranslation;
use App\Story;
use App\StoryTranslation;
use Illuminate\Support\Facades\Config;

class SettingsEloquent extends Uploader implements Repository
{

    private $model, $translation;

    public function __construct(Setting $model, SettingTranslation $translation)
    {
        $this->model = $model;
        $this->translation = $translation;
    }

    function anyData()
    {

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

    }

    function update(array $attributes, $id = null)
    {
        // TODO: Implement update() method.
//        dd($attributes);
        $model = $this->model->find(1);
        if (isset($model)) {
            if (isset($attributes['meet_prople_image'])) {
                $model->meet_prople_image = $this->upload($attributes, 'meet_prople_image');
                $model->save();
            }
            $languages = Config::get('languages.supported');
            foreach ($languages as $language) {
                $model->translationModel($language)->update(
                    ['meet_prople_content' => $attributes['meet_prople_content'][$language]
                    , 'amazing_feature_content' => $attributes['amazing_feature_content'][$language]
                    , 'stories_content' => $attributes['stories_content'][$language]
                    , 'membership_content' => $attributes['membership_content'][$language]
                    , 'register_member_content' => $attributes['register_member_content'][$language]
                    , 'about_us_content' => $attributes['about_us_content'][$language]
                    , 'terms_content' => $attributes['terms_content'][$language]
                    , 'policy_content' => $attributes['policy_content'][$language]
                    // , 'faqs_content' => $attributes['faqs_content'][$language]
                    , 'how_work_content' => $attributes['how_work_content'][$language]
                    , 'why_content' => $attributes['why_content'][$language]
                    ]);
            }

            return response_api(true, 200, __('app.success'), $model);
        }
        return response_api(false, 422, __('app.error'));
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
    }

}
