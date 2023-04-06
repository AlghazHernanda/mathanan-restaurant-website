<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display:block !important;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Add Admin             
                </div>
            </div>
        </div>

       

        <section class="mt-50 mb-50">
            
            <div class="container">
               

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                               <h2>Daftar pengguna</h2>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nomor Telepon</th>
                                            <th>Nama</th>
                                            <th>email</th>
                                            <th>tipe akun</th>
                                            <th>alamat</th>
                                            <th>tanggal daftar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = ($users->currentPage()-1)*$users->perPage();
                                        @endphp
                                        @foreach ($users as $user)
                                        {{-- @php
                                        $user->cart = json_decode($user->cart);
                                        @endphp --}}
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $user->phonenumber }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->utype }}</td>
                                                <td>{{ $user->address }}</td>
                                                <td>{{ $user->created_at->toDayDateTimeString() }}</td>                                               
                                                <td>
                                                    <a href="#"   wire:click.prevent="addAdmin({{ $user->id}})" class="btn btn-brand text-white btn-shadow-brand hover-up btn-lg">Tambah Admin</a> 
                                                    <br><br>
                                                    <a href="#"   wire:click.prevent="addUser({{ $user->id}})" class="btn btn-brand text-white btn-shadow-brand hover-up btn-lg">Tambah User</a>
                                                    {{-- <a href="#" class="text-danger"  wire:click.prevent="deleteuser({{ $user->id}})" style="margin-left: 20px;">Delete</a> --}}
                                                </td>
                                            </tr>
                                         
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
</div>
