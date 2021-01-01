<?php

namespace App\Services;

use App\Repositories\UserRepository;
Use App\Utils\Files\Uploader;

class RegisterService {
    
    use Uploader;

    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function saveRegistrationDetails(array $userData) {

        if(array_key_exists('image' , $userData))
            $userData['image'] = $this->uploadAs('image' , 'profile');

        $user = $this->userRepository->create($userData);
        return $user;
    }
}
