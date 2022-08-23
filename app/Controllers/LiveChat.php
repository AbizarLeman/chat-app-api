<?php

namespace App\Controllers;

use App\Entities\ProfileEntity;
use App\Services\ProfileService;

class LiveChat extends BaseController
{
    protected $session;
    protected $profile_service;

    public function __construct() {
        $this->session = \Config\Services::session();
        $this->profile_service = new ProfileService;
    }
    
    public function index()
    {
        if ($this->session->session_data) {
            $profile = $this->profile_service->getProfileByUserAccountID($this->session->session_data['user_account_id']);

            if($profile) {                
                $profiles = $this->profile_service->getAllProfile();

                return view('live_chat/live_chat', ['profiles' => $profiles, 'user_account_id' => $this->session->session_data['user_account_id']]);
            } else {
                return view('live_chat/no_profile');
            }
        }

        return view('auth/login');
    }

    public function chat($id)
    {
        if ($this->session->session_data) {
            $profiles = $this->profile_service->getAllProfile();

            return view('live_chat/live_chat', ['profiles' => $profiles]);
        }

        return view('auth/login');
    }
}
