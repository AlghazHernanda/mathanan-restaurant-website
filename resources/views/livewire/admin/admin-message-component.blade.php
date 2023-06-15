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
                    <span></span> Message             
                </div>
            </div>
        </div>

       

        <section class="mt-50 mb-50">
            
            <div class="container">
                <div class="row align-items-center">

                   
                  
                </div>

                <div class="row">    
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                               <h2>Message and Feedback</h2>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Nomor Telepon</th>
                                            <th>Subjek</th>
                                            <th>Isi Pesan</th>
                                            <th>tanggal</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = ($message_users->currentPage()-1)*$message_users->perPage();
                                        @endphp
                                        @foreach ($message_users as $message_user)
                                       
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $message_user->name }}</td>
                                                {{--<td><img src="{{ asset('assets/imgs/shop/message_user-') }}{{ $message_user->id }}-1.jpg" width="60" alt="{{ $message_user->name }}"></td> --}}
                                                <td>{{ $message_user->email }}</td>
                                                <td>{{ $message_user->phonenumber }}</td>
                                                <td>{{ $message_user->subject }}</td>
                                                <td>{{ $message_user->message }}</td>
                                                <td>{{ $message_user->created_at->toDayDateTimeString() }}</td>                                               
                                                {{-- <td>
                                                    <a href="#"   wire:click.prevent="accept({{ $message_user->id}})" class="button">Sudah di antar</a>
                                                    <a href="#" class="text-danger"  wire:click.prevent="deletemessage_user({{ $message_user->id}})" style="margin-left: 20px;">Delete</a>
                                                </td> --}}
                                            </tr>
                                          
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $message_users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

