<?php
namespace CodeDay\Clear\Controllers\Manage\Tools;

use \CodeDay\Clear\Models;

class StatusController extends \Controller {

    public function getIndex()
    {
        return \View::make('tools/status');
    }
} 