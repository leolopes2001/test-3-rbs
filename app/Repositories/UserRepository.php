<?php 

namespace App\Repositories;

use App\Models\UserModel;

class UserRepository extends BaseRepository
{
    public function __construct(UserModel $userModel)
    {
        parent::__construct($userModel);
    }
}
