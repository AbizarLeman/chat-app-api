<?php

namespace App\Services;

use App\Models\ProfileModel;
use App\Entities\ProfileEntity;

interface ProfileServiceInterface {
    public function createProfile($profile_entity) : bool;
    public function getAllProfile();
    public function getProfileByUserAccountID($user_account_id);
    public function updateProfile($profile_entity): bool;
}

class ProfileService implements ProfileServiceInterface {

    protected $profile_model;

    public function __construct($_profile_model = new ProfileModel()) {
        $this->profile_model = $_profile_model;
    }

    public function createProfile($profile_entity) : bool {
        return $this->profile_model->save($profile_entity);
    }

    public function getAllProfile() {
        $profiles = $this->profile_model->findAll();

        if (!empty($profiles)) {
            foreach ($profiles as $profile) {
                $date = date_create($profile->date_of_birth);
                $profile->date_of_birth = date_format($date,"Y-m-d");
            }

            return $profiles;
        }
    }

    public function getProfileByUserAccountID($user_account_id) {
        $profile = $this->profile_model->findByUserAccountID($user_account_id);

        if ($profile) {
            $date = date_create($profile->date_of_birth);
            $profile->date_of_birth = date_format($date,"Y-m-d");

            return $profile;
        }
    }

    public function updateProfile($profile_entity) : bool {
        return $this->profile_model->update($profile_entity->profile_id, $profile_entity);
    }
}