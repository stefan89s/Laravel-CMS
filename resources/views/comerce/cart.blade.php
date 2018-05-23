@extends('layouts.comerce')

@section('title', 'Shopping Cart')

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href=" {{ route('landing.index') }} ">Back</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Shopping Cart</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="row">
    <div class="cart-section">
        <div class="col-md-9 col-md-offset-3">
        <div>
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (count($products) > 0)

            <h2>{{ count($products) }} item(s) in Shopping Cart</h2>

            <div class="cart-table">

                <?php $data = []; ?>
                <?php $price = 0; ?>

                @foreach($products as $item)

                <!-- Price -->
                <?php $price += $item->price; ?>

                <?php array_push($data, $item->id) ?>
                
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href=""><img src="{{ asset('img/products/laptop-'.$item->id.'.jpg') }}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="">{{ $item->name }}</a></div>
                            <div class="cart-table-description">{{ $item->details }}</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="cart-options">Remove</button>
                            </form>

                            <form action=" {{ route('saveproduct') }} " method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <button type="submit" class="cart-options">Save for Later</button>
                            </form>
                        </div>
                        <div>{{ number_format($item->price, 2,",",".")}}</div>
                    </div>
                </div> <!-- end cart-table-row -->
                
                @endforeach

                <?php  echo '<h2>'. number_format($price, 2,",",".").' </h2>'; ?>

            </div> <!-- end cart-table -->

            <div class="cart-totals">
                <div class="cart-totals-left">
                    
                </div>

                <div class="cart-totals-right">
                    <div>
                        
                    </div>
                    <div class="cart-totals-subtotal">
                            
                    </div>
                </div>
            </div> <!-- end cart-totals -->

            <div class="cart-buttons">
                <a href=" {{ route('shop.index') }} " class="button">Continue Shopping</a>
                <a href=" {{ route('payment.index') }}?data=<?php

                foreach($data as $id) {
                 echo '/'.$id; 
                } 
                 ?>&price=<?php echo $price ?> " class="button">Purchasing</a>
                
            </div>

            @else

                <h3>No items in Cart!</h3>
                <div class="spacer"></div>
                <a href="" class="button">Continue Shopping</a>
                <a href=" {{ route('show-purchasing') }} " class="button">Purchasing</a>
                <div class="spacer"></div>

            @endif
            
        <!--DELETE DIV HERE-->

<!--SAVED ITEMS SECTION-->
<h2>Saved For Later:</h2>
<div class="saved-for-later cart-table">
    @foreach ($saveProducts as $item)
    <div class="cart-table-row">
        <div class="cart-table-row-left">
            <a href="{{ route('shop.show', $item->slug) }}"><img src="{{ asset('img/products/laptop-'.$item->id.'.jpg') }}" alt="item" class="cart-table-img"></a>
            <div class="cart-item-details">
                <div class="cart-table-item"><a href="{{ route('shop.show', $item->slug) }}">{{ $item->name }}</a></div>
                <div class="cart-table-description">{{ $item->details }}</div>
            </div>
        </div>
        <div class="cart-table-row-right">
            <div class="cart-table-actions">
                <form action=" {{ route('saveproduct.destroy') }} " method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <input type="hidden" name="product_id" value=" {{ $item->id }} ">
                    <button type="submit" class="cart-options">Remove</button>
                </form>

                <form action="{{ route('cart.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                    <button type="submit" class="cart-options">Move to Cart</button>
                </form>
            </div>

            <div>{{ number_format($item->price, 2,",",".")  }}</div>
        </div>
    </div> <!-- end cart-table-row -->
    @endforeach

</div> <!-- end saved-for-later -->

</div>
</div>
</div>
</div> <!-- end cart-section -->

@endsection

@section('extra-js')
<script src="{{ asset('js/app.js') }}"></script>
<script>
(function(){
    const classname = document.querySelectorAll('.quantity')

    Array.from(classname).forEach(function(element) {
        element.addEventListener('change', function() {
            const id = element.getAttribute('data-id')
            axios.patch(`/cart/${id}`, {
                quantity: this.value
            })
            .then(function (response) {
                // console.log(response);
                window.location.href = '{{ route('cart.index') }}'
            })
            .catch(function (error) {
                // console.log(error);
                window.location.href = '{{ route('cart.index') }}'
            });
        })
    })
})();
</script>
@endsection
