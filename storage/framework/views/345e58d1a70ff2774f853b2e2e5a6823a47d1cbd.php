<div class="shopping-cart">
    <button class="dropdown-toggle">
        <i class="fal fa-shopping-cart"></i>
        <span class="count total-count"></span>
    </button>
    <ul class="cart-dropdown">
        <div class="dropdown-box show-cart">

        </div>
        <div class="cart-bottom">
            <div class="text_area d-flex justify-content-between">
                <p><?php echo app('translator')->get('Cart Subtotal:'); ?></p>
                <div>
                    <small class="basicCurrency"><?php echo e(config('basic.currency_symbol')); ?></small>
                    <span class="total-cart"></span>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <a href="<?php echo e(route('shopping.cart')); ?>" class="common_btn common_btn_cart"><?php echo app('translator')->get('cart'); ?></a>
                <a href="<?php echo e(route('user.checkout')); ?>" class="common_btn common_btn_checkout "><?php echo app('translator')->get('checkout'); ?></a>
            </div>
        </div>
    </ul>
</div>

<?php $__env->startPush('script'); ?>
    <script>
        'use strict';
        let checkCart = JSON.parse(sessionStorage.getItem('shoppingCart'));
        if(checkCart !== null){
            if(Object.keys(checkCart).length === 0){
                $('.common_btn_checkout').addClass('d-none');
                $('.common_btn_cart').addClass('w-100');
            }else{
                $('.common_btn_checkout').removeClass('d-none');
                $('.common_btn_cart').removeClass('w-100');
            }
        }

    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/partials/shopping_cart.blade.php ENDPATH**/ ?>