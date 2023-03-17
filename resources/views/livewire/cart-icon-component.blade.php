<div>
    <div class="header-action-icon-2">
        <a class="mini-cart-icon" href="{{ route('menu.cart') }}">
            <img alt="cart" src="{{ asset('assets/imgs/theme/icons/icon-cart.svg') }}">
            @if (Cart::count() > 0)
            <span class="pro-count blue">{{ Cart::count() }}</span>
                
            @endif
        </a>
        <div class="cart-dropdown-wrap cart-dropdown-hm2">
            <ul>

                @foreach (Cart::content() as $item)
                <li>
                    <div class="shopping-cart-img">
                        {{-- {{ route('product.details',['slug'=>$item->model->slug]) }} --}}
                        <a href=""><img alt="{{ $item->model->name }}" src="{{ asset('assets/imgs/menu') }}/{{ $item->model->image }}"></a>
                    </div>
                    <div class="shopping-cart-title">
                        {{-- {{ route('product.details',['slug'=>$item->model->slug]) }} --}}
                        <h4><a href="">{{ substr($item->model->name,0,20) }}...</a></h4>
                        <h4><span>{{ $item->qty }} × </span>${{ $item->model->regular_price }}</h4>
                    </div>
                    {{-- <div class="shopping-cart-delete">
                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                    </div> --}}
                </li>
                @endforeach
            </ul>
            <div class="shopping-cart-footer">
                <div class="shopping-cart-total">
                    <h4>Total <span>${{ Cart::total() }}</span></h4>
                </div>
                <div class="shopping-cart-button">
                    <a href="{{ route('menu.cart') }}" class="outline">View cart</a>
                    <a href="checkout.html">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
