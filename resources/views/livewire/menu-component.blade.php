<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Menu
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">

                                <div class="sort-by-product-area">
                                    <div class="sort-by-cover mr-10">
                                        <div class="sort-by-product-wrap">
                                            <div class="sort-by">
                                                <span><i class="fi-rs-apps"></i> <strong class="text-brand"> Show: {{ $menus->count() }} </strong> Menu for you!</span>
                                            </div>
                                          
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                            </div>

                    
                        </div>
                        <div class="row product-grid-3">
                            @foreach ($menus as $menu)
                                
                         
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            {{-- {{ route('menu.details',['slug'=>$menu->slug]) }} --}}
                                            <a href="{{ route('menu.details',['slug'=>$menu->slug]) }}">
                                                <img class="default-img" src="{{ asset('assets/imgs/menu') }}/{{ $menu->image }}" alt="{{ $menu->name}}">
                                                <img class="hover-img" src="{{ asset('assets/imgs/menu') }}/{{ $menu->image }}" alt="{{ $menu->name}}">
                                                
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            {{-- <img class="pop" src="{{ asset('assets/imgs/menu') }}/{{ $menu->image }}" alt="{{ $menu->name}}"> --}}
                                            {{-- <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                <i class="fi-rs-search"></i></a> --}}
                                            {{-- <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a> --}}
                                        </div>
                                        {{-- <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div> --}}
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            {{-- <a href="shop.html">Music</a> --}}
                                        </div>
                                        <h2><a href="product-details.html">{{ $menu->name }}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                {{-- <span>90%</span> --}}
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>Rp{{ format_uang($menu->regular_price) }}</span>
                                            {{-- <span class="old-price">$245.8</span> --}}
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{ $menu->id}},'{{ $menu->name }}', {{ $menu->regular_price }})">
                                                <i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            {{ $menus->links() }}
                            {{-- <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                                </ul>
                            </nav> --}}
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
    </main>
</div>
