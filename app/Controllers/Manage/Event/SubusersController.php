<?php
namespace CodeDay\Clear\Controllers\Manage\Event;

use \CodeDay\Clear\Models;

class SubusersController extends \Controller {
    public function getIndex()
    {
        return \View::make('event/subusers', [
            's5_invite_link' => \Config::get('s5.invite_link')
        ]);
    }

    public function postRevoke()
    {
        $event = \Route::input('event');

        Models\User\Grant::where('batches_event_id', '=', $event->id)
            ->where('username', '=', \Input::get('username'))
            ->firstOrFail()
            ->delete();

        \Session::flash('status_message', \Input::get('username').' removed');

        return \Redirect::to('/event/'.$event->id.'/subusers');
    }

    public function postGrant()
    {
        $event = \Route::input('event');
        $user = Models\User::fromS5Username(\Input::get('username'));

        if ($user->username == $event->manager_username) {
            \Session::flash('error', 'Cannot add the event manager as a subuser of the event');
            return \Redirect::to('/event/'.$event->id.'/subusers');
        }

        if ($user->username) {
            $grant = new Models\User\Grant;
            $grant->username = \Input::get('username');
            $grant->batches_event_id = $event->id;
            $grant->save();

            return \Redirect::to('/event/'.$event->id.'/subusers');
        } else {
            \Session::flash('error', 'User not found');
            return \Redirect::to('/event/'.$event->id.'/subusers');
        }
    }
} 