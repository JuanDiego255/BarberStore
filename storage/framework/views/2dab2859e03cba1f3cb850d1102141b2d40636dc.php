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

<script>

    $(document).ready(function () {
        $('.notiflix-confirm').on('click', function () {

        })
    })
</script>
<?php /**PATH C:\xampp\htdocs\barber\resources\views/admin/layouts/notification.blade.php ENDPATH**/ ?>