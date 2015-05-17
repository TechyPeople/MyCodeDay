<?php
namespace CodeDay\Clear\Controllers\Manage\Docs;

use \CodeDay\Clear\Models;

class ModelController extends \Controller {

    public function getIndex()
    {
        $modelName = \Route::input('model');
        $modelClass = '\CodeDay\Clear\ModelContracts\\'.$modelName;

        if (!class_exists($modelClass)) {
            \App::abort(404);
        }

        return \View::make('docs/model', [
            'name' => $modelName,
            'fields' => $modelClass::getFields()
        ]);
    }
} 