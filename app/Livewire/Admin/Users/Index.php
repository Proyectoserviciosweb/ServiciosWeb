<?php

namespace App\Livewire\Admin\Users;
use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

   // public $perPage = 10;
    use WithPagination;
    protected $paginationTheme="bootstrap";
    
    public function render()
    {
        $users=User::paginate(15);
        return view('livewire.admin.users.index',compact('users'));

    }
}
