<?php if(session()->has('success')): ?>
    <script>
        Notiflix.Notify.Éxito("<?php echo app('translator')->get(session('success')); ?>");
    </script>
<?php endif; ?>

<?php if(session()->has('error')): ?>
    <script>
        Notiflix.Notify.Failure("<?php echo app('translator')->get(session('error')); ?>");
    </script>
<?php endif; ?>

<?php if(session()->has('warning')): ?>
    <script>
        Notiflix.Notify.Warning("<?php echo app('translator')->get(session('warning')); ?>");
    </script>
<?php endif; ?>


<?php /**PATH C:\xampp\htdocs\barber\resources\views/themes/basic/partials/notification.blade.php ENDPATH**/ ?>