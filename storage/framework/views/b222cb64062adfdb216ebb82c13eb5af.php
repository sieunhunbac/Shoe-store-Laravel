<?php
    $tawkPropertyId = config('tawkto.property_id');
    $tawkWidgetId   = config('tawkto.widget_id', 'default');
    $isAdminPage    = request()->is('admin*');
?>

<?php if($tawkPropertyId && $tawkPropertyId !== 'your_property_id_here' && !$isAdminPage): ?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function(){
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src   = 'https://embed.tawk.to/<?php echo e($tawkPropertyId); ?>/<?php echo e($tawkWidgetId); ?>';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<?php endif; ?>
<?php /**PATH D:\Laravel\shoe-store\resources\views/partials/_tawkto.blade.php ENDPATH**/ ?>