<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminAddAdmin extends Component
{
    public function addUser($user_id)
    {
        $user = User::find($user_id);
        $user->utype = 'USR';
        $user->save();
        session()->flash('message', 'user berhasil ditambahkan');
    }

    //fungsi untuk add admin
    public function addAdmin($user_id)
    {
        $user = User::find($user_id);
        // jika user tipenya "USR" maka jalankan if ini untuk mengubah jadi admin
        if ($user->utype == "USR") {
            $user->utype = 'ADM';
            $user->save();
            session()->flash('message', 'admin berhasil ditambahkan');
        } else {
            $user->utype = 'USR';
            $user->save();
            session()->flash('message', 'user berhasil ditambahkan');
        }
    }

    public function render()
    {
        // keseluruhan kompleksitas waktu dari kode ini didominasi oleh operasi pengurutan data dari database, 
        // yang memiliki kompleksitas O(log n), di mana n adalah jumlah pengguna dalam database.

        $users = User::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.admin-add-admin', ['users' => $users]);
    }
}
