<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Flavour;
class FlavourController extends Controller
{
    /**
     * Make sure the auth is running
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Finds every flavours or searched ones.
     * @return view Form to list the flavours
     */
    public function retrieve()
    {
        $name = request()->name ? : '';
        $flavour_retrieve = Flavour::where('name', 'like', "%$name%")
            ->orderBy('name', 'asc')
            ->get();
        return view('crud.flavours.retrieve')
            ->with('flavour_retrieve', $flavour_retrieve)
            ->with('name', $name);
    }

    /**
     * Calls the form to edit a flavour.
     * @param integer $id
     * @return view Form to edit the flavour
     */
    public function edit($id)
    {
        $Flavour = Flavour::find($id);
        if (empty($Flavour)) {
            return view('404');
        }

        return view('crud.flavours.edit')
            ->with('Flavour', $Flavour);
    }

    /**
     * Edit the flavour on database.
     * @param integer $id
     */
    public function save($id = false)
    {
        $name = request()->name;
        $old_value = request()->old_value;
        $new_value = request()->new_value ? request()->new_value : 0;
        if ($id) {
            $Flavour = Flavour::find($id);
            if (empty($Flavour)) {
                return view('404');
            }
        } else {
            $Flavour = new Flavour();
        }

        $action = $id ? self::ACTION_EDIT : self::ACTION_ADD;
        $validation = $this->validateInput($name,
            $old_value,
            $action);

        if ($validation !== true) {
            return $validation;
        }

        $Flavour->name = $name;
        $Flavour->old_value = $old_value;
        $Flavour->new_value = $new_value;
        $Flavour->save();
        return redirect()->action('FlavourController@retrieve');
    }

    /**
     * Delete on database the flavour selected.
     * @param integer $id
     */
    public function delete($id)
    {
        $Flavour = Flavour::find($id);
        if (empty($Flavour)) {
            return view('404');
        }
        $Flavour->delete();
        return redirect()->action('FlavourController@retrieve');
    }

    /**
     * Calls the form to add or add on database a crud.flavours.
     */
    public function add()
    {
        return view('crud.flavours.add');
    }

    /**
     * Validates inputs from form
     * @param  String $name               Name of flavour
     * @param  Array  $old_value          Old value of a flavour
     * @param  String $action             Action to return in fail case
     * @param  Integer|null $id           ID of flavour
     * @return redirect|boolean
     */
    private function validateInput(
        $name,
        $old_value,
        $action,
        $id = null
    ) {
        $validate = Validator::make([
                'nome do sabor' => $name,
                'valor' => $old_value
            ], [
                'nome do sabor' => 'required|min:4',
                'valor' => 'required'
            ], [
                'required' => ':attribute é obrigatório.',
                'min' => ':attribute precisa ter no mínimo 4 caracteres.'
        ]);
        if ($validate->fails()) {
            $action = "FlavourController@$action";
            return redirect()
                ->action($action, $id)
                ->withErrors($validate)
                ->withInput();
        }

        return true;
    }
}
