<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cache;
use Validator;
use Storage;

class HomepageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * [editHomePageForm description]
     * @return [type] [description]
     */
    public function editHomePageForm($saved = false)
    {
        $Cache = new Cache();
        $cache = $Cache->getAllCache();
        return view('crud.homePageEdit')
            ->with('cache', $cache)
            ->with('saved', $saved);
    }

    public function editHomePageEdit()
    {
        $inputs = [];
        $desconsider_inputs = ['submit', '_token', 'fundo_tela'];
        if (!is_null(request()->fundo_tela)) {
            $path = request()->fundo_tela->storeAs('public/images', 'header.jpg');
        }

        foreach (request()->input() as $key => $value) {
            if (in_array($key, $desconsider_inputs)) {
                continue;
            }

            $Cache = new Cache();
            $Cache->saveCache($key, $value);
            $inputs[$key] = $value;
            $validate = $this->validateInput($key, $value);
            if ($validate !== true) {
                return $validate;
            }
        }
        return redirect(action('HomepageController@editHomePageForm', ['saved' => true]));
    }

    private function validateInput($key, $value)
    {
        $validate = Validator::make([
                $key => $value
            ], [
                $key => 'required|min:10'
            ], [
                'required' => ':attribute é obrigatório.',
                'min' => ':attribute precisa ter no mínimo 10 caracteres.'
        ]);
        if ($validate->fails()) {
            $action = "HomepageController@editHomePageForm";
            return redirect()
                ->action($action)
                ->withErrors($validate)
                ->withInput();
        }

        return true;
    }
}
