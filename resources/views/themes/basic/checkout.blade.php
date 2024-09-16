@extends($theme . 'layouts.app')
@section('title', trans($title))

@section('content')
    <section class="checkout_area">
        <form action="{{ route('user.product.place.order') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-8">
                        <div class="section_left" data-aos="fade-left">
                            <div class="section_header">
                                <h2>@lang('Shipping Information')</h2>
                            </div>
                            <div class="billing_form_area">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="first_name"
                                            value="{{ old('first_name') }}" placeholder="First Name" autocomplete="off">
                                        @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="last_name"
                                            value="{{ old('last_name') }}" placeholder="Last Name" autocomplete="off">
                                        @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="email"
                                            value="{{ old('email') }}" placeholder="Correo electrónico Address*" autocomplete="off">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ old('phone') }}" placeholder="Phone Number*" autocomplete="off">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="company_name"
                                            value="{{ old('company_name') }}" placeholder="Company Name (optional)"
                                            autocomplete="off">
                                        @error('company_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <select id="inputState" class="form-select" name="country">
                                            <option selected disabled>@lang('Your Country')</option>
                                            <option value="Bangladesh">@lang('Bangladesh')</option>
                                            <option value="USA">@lang('USA')</option>
                                            <option value="UK">@lang('UK')</option>
                                        </select>
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="street_address"
                                            value="{{ old('street_address') }}" placeholder="@lang('Apartment, Street Address*')"
                                            autocomplete="off">
                                        @error('street_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="state"
                                            value="{{ old('state') }}" placeholder="@lang('State')" autocomplete="off">
                                        @error('state')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="postcode"
                                            value="{{ old('postcode') }}" placeholder="@lang('Zip / Postcode*')">
                                        @error('postcode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <input class="form-control cartItemData" name="cartItem" type="hidden"
                                        autocomplete="off" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 product_checkout_summary">
                        <div class="section_right" data-aos="fade-right">
                            <div class="billing_information">
                                <ul class="billing_list_area mb-20">
                                    <li><span>@lang('Product')</span> <span>@lang('Total')</span></li>
                                    <div class="product_info">

                                    </div>
                                    <li>
                                        <h6>@lang('Cart Subtotal')</h6>
                                        <h6>{{ config('basic.currency_symbol') }}<span class="total-cart"></span></h6>
                                    </li>
                                    <li>
                                        <h6>(+) @lang('Tax Charge')</h6>
                                        <h6>$0.00</h6>
                                    </li>
                                    <li>
                                        <h6>(+) @lang('Shipping Charge')</h6>
                                        <h6>$0.00</h6>
                                    </li>
                                    <li>
                                        <h5>@lang('Total')</h5>
                                        <h5>{{ config('basic.currency_symbol') }}<span class="total-cart"></span></h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container payment_section">
                <div class="row g-4">
                    <div class="col-md-8">
                        <div class="payment-methods mt-40">
                            <div class="row gy-4 gx-3">
                                <div class="col-12">
                                    <h4 class=" mb-20">@lang('Select Pago Method')</h4>
                                    <div class="payment_method">
                                        <input class="form-check-input" type="radio" id="cashon_delivery"
                                            name="payment_method" value="Cash On Delivery" checked>
                                        <label class="form-check-label" for="cashon_delivery">
                                            @lang('Cash on Delivery')
                                        </label>
                                    </div>
                                    <div class="payment-box mb-4">
                                        <div class="payment-options">
                                            <div class="row g-2">
                                                @foreach ($gateways as $key => $gateway)
                                                    <div class="col-4 col-md-3 col-xl-2">
                                                        <input type="radio" class="btn-check"
                                                            name="options" id="option{{$gateway->id}}" autocomplete="off" />
                                                        <input type="hidden" name="gateway" value="">
                                                        <label class="paymentCheck" id="{{ $key }}"
                                                            data-gateway="{{ $gateway->id }}"
                                                            data-payment="{{ $gateway->id }}" data-plan=""
                                                            for="option{{$gateway->id}}">
                                                            <img class="img-fluid custom___img"
                                                                src="{{ asset(getFile(config('location.gateway.path') . $gateway->image)) }}"
                                                                alt="gateway image" />
                                                            <i class="fa-solid fa-check check custom___check tag d-none"
                                                                id="circle{{ $key }}"></i>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="common_btn">@lang('PLACE ORDER')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="section_right payment_info" data-aos="fade-right">
                            <div class="payment-information box_shadow1  p-3 mb-5 bg-white rounded">
                                <h4>@lang('Checkout Summary')</h4>
                                <ul class="payment_list_area">
                                    <li><span>@lang('Total Cart')</span>
                                        <span>{{ config('basic.currency_symbol') }}<span class="total-cart"></span></span>
                                    </li>
                                    <li>@lang('Shipping') <span class="shipping">$0.00</span></li>
                                    <li><span>@lang('Conversation Rate')</span> <span class="conversation_rate"></span>
                                    </li>
                                    <li><span>@lang('Percentage  Charge')</span><span class="percentage_charge"></span>
                                    </li>
                                    <li><span>@lang('Fixed Charge')</span> <span class="fixed_charge"></span></li>
                                    <li><span>@lang('Total Amount')</span> <span class="total_amount"></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection

@push('script')
    <script>
        'use strict';
        let cart = JSON.parse(sessionStorage.getItem('shoppingCart'));

        if(!cart){
            window.location.href = "{{route('shopping.cart')}}"
        }



        let cartItem = JSON.stringify(cart)
        $('.cartItemData').val(cartItem);

        $(document).on('click', '#cashon_delivery', function() {
            $('.tag').not(this).addClass('d-none');
            $(`#circle${id}`).removeClass("d-none");
            var id = this.id;
            let paymentId = $(this).data('');
            $("input[name='gateway']").val($(this).data(''));

        });

        let product = "";
        for (let i in cart) {
            product +=
                `<li><span>${cart[i].name} x ${cart[i].count}</span> <span>${cart[i].currency}${cart[i].price * cart[i].count}</span></li>`;
        }

        $('.product_info').html(product);

        // Place Order Pago
        $(document).on('click', '.paymentCheck', function() {
            var id = this.id;
            $("#cashon_delivery").prop("checked", false);
            $('.tag').not(this).addClass('d-none');
            $(`#circle${id}`).removeClass("d-none");
            let paymentId = $(this).data('payment');


            $("input[name='gateway']").val($(this).data('gateway'));

            $('.paymentCheck').not(this).removeClass('paymentActive');
            $(`#${id}`).addClass("paymentActive");

            let total = shoppingCart.totalCart();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('user.order.payment.check') }}",
                data: {
                    paymentId: paymentId,
                },
                datatType: 'json',
                type: "POST",
                success: function(data) {

                    let conventionRate = parseFloat(data.data.paymentGatewayInfo.convention_rate)
                        .toFixed(2);
                    let percentageCharge = parseFloat(data.data.paymentGatewayInfo.percentage_charge)
                        .toFixed(2);
                    let fixedCharge = parseFloat(data.data.paymentGatewayInfo.fixed_charge).toFixed(2);
                    let totalAmount = parseFloat(total) + parseFloat(conventionRate) + parseFloat(
                        percentageCharge) + parseFloat(fixedCharge);
                    totalAmount = parseFloat(totalAmount).toFixed(2);


                    let symbol = "{{ trans($basic->currency_symbol) }}";
                    $('.conversation_rate').text(`${symbol} ${conventionRate}`);
                    $('.percentage_charge').text(`${symbol} ${percentageCharge}`);
                    $('.fixed_charge').text(`${symbol} ${fixedCharge}`);
                    $('.total_amount').text(`${symbol} ${totalAmount}`);
                }
            });

        });
    </script>
@endpush
