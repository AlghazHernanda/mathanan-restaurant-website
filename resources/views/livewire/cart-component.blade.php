<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Cart
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            @if (Session::has('success_message'))
                            <div class="alert alert-success">
                                <strong>Sucess | {{ Session::get('success_message') }}</strong>
                            </div>
                            
                        @endif
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @if (Cart::count() > 0) 
                                    @foreach (Cart::content() as $item)
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{ asset('assets/imgs/menu') }}/{{ $item->model->image }}" alt="#"></td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name"><a href="product-details.html">{{ $item->model->name }}</a></h5>
                                            {{-- <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy magndapibus.
                                            </p> --}}
                                        </td>
                                        <td class="price" data-title="Price"><span>Rp{{ format_uang($item->model->regular_price) }}</span></td>
                                        <td class="text-center" data-title="Stock">
                                            <div class="detail-qty border radius  m-auto">
                                                <a href="#" class="qty-down"  wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')" ><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">{{ $item->qty }}</span>
                                                <a href="#" class="qty-up"  wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            <span>Rp{{ format_uang($item->subtotal) }}</span>
                                        </td>
                                        <td class="action" data-title="Remove"><a href="#" class="text-muted" wire:click.prevent="destroy('{{ $item->rowId }}')"><i class="fi-rs-trash"></i></a></td>
                                    </tr>
                                    @endforeach
                                   
                                  
                                        <td colspan="6" class="text-end">
                                            <a href="#" class="text-muted" wire:click.prevent="clearAll()"> <i class="fi-rs-cros s-small"></i> Clear Cart</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @else
                            <p>No Item in Cart</p>
                        @endif
                        </div>
                        <div class="cart-action text-end">
                            {{-- <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a> --}}
                            <a href="{{ route('menu') }}" class="btn "><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        <div class="row mb-50">

                        @if(Session::has('message'))
                            <div class="alert alert-danger" role="alert">{{ Session::get('message') }}</div>
                          @endif
                           
                            <div class="col-lg-6 col-md-12">

                                {{-- jika sudah login, tampilkan form yang ini --}}
                                @auth
                                    <form action="/checkoutget" method="POST">
                                        @csrf

                                        <div class="border p-md-4 p-30 border-radius cart-totals">
                                            <div class="heading_s1 mb-3">
                                                <h4>Cart Totals</h4>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="cart_total_label">Cart Subtotal</td>
                                                            <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">Rp{{ Cart::subtotal() }}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">Tax</td>
                                                            <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">Rp{{ Cart::tax() }}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">Name</td>
                                                            <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> 
                                                                <input type="text" id="name" name="name"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                 value="{{ Auth::user()->name }}" required>
                                                                 @error('name')
                                                                 <p class="text-danger">{{ $message }}</p>
                                                                 @enderror
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">Email</td>
                                                            <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> 
                                                                <input type="email" id="email" name="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                 value="{{ Auth::user()->email }}" required>
                                                                @error('email')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">Phone Number</td>
                                                            <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> 
                                                                <input type="number" min="1"
                                                                step="1"
                                                                class="form-control @error('phonenumber') is-invalid @enderror"
                                                                onkeypress="return event.keyCode === 8 || event.charCode >= 48 && event.charCode <= 57" id="name" name="phonenumber" value="{{ Auth::user()->phonenumber }}" required>
                                                                @error('phonenumber')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="cart_total_label">Address</td>
                                                            <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> 
                                                                <input type="text" id="address" name="address"
                                                                class="form-control @error('address') is-invalid @enderror"  
                                                                value="{{ Auth::user()->address }}" required>
                                                                @error('address')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="cart_total_label">Total</td>
                                                            <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">Rp{{ Cart::total() }}</span></strong></td>
                                                        </tr>

                                                        <input type="hidden" name="cart" value="{{ Cart::content() }}">

                                                        <input type="hidden" name="total_price" value="{{ Cart::total() }}">

                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="submit" class="btn"> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</button>
                                        </div>
                                    </div>
                                    </form>

                                    {{-- jika tidak login, tampilkan form yang ini --}}
                                    @else
                                    <form action="/checkoutget" method="POST">
                                    @csrf

                                    <div class="border p-md-4 p-30 border-radius cart-totals">
                                        <div class="heading_s1 mb-3">
                                            <h4>Cart Totals</h4>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="cart_total_label">Cart Subtotal</td>
                                                        <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">Rp{{ Cart::subtotal() }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart_total_label">Tax</td>
                                                        <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">Rp{{ Cart::tax() }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart_total_label">Name</td>
                                                        <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> 
                                                            <input type="text" id="name"
                                                            class="form-control @error('name') is-invalid @enderror" 
                                                            name="name" required>
                                                            @error('name')
                                                            <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart_total_label">Email</td>
                                                        <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> 
                                                            <input type="email" id="email" name="email" 
                                                            class="form-control @error('email') is-invalid @enderror" 
                                                            required>
                                                            @error('email')
                                                            <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart_total_label">Phone Number</td>
                                                        <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> 
                                                            <input type="number" min="1"
                                                            step="1"
                                                            class="form-control @error('phonenumber') is-invalid @enderror"
                                                            onkeypress="return event.keyCode === 8 || event.charCode >= 48 && event.charCode <= 57" id="name" name="phonenumber" required>
                                                            @error('phonenumber')
                                                            <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart_total_label">Address</td>
                                                        <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> 
                                                            <input type="text" id="address" name="address" 
                                                            class="form-control @error('address') is-invalid @enderror"
                                                            required>
                                                            @error('address')
                                                            <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart_total_label">Total</td>
                                                        <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">Rp{{ Cart::total() }}</span></strong></td>
                                                    </tr>

                                                    <input type="hidden" name="cart" value="{{ Cart::content() }}">

                                                    <input type="hidden" name="total_price" value="{{ Cart::total() }}">

                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="submit" class="btn"> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</button>
                                    </div>
                                </div>
                                </form>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
