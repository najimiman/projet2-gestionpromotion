<form action="<?php echo e(Route('gestionstud.store')); ?>" method="POST">
<?php echo csrf_field(); ?>
first name:<input type="text" name="First_name">
last name:<input type="text" name="Last_name">
email:<input type="email" name="Email">
<input type="text" name="PromotionID" value="<?php echo e($id); ?>">

<button type="submit">ajouter</button>
</form><?php /**PATH C:\xampp\htdocs\projet2-prototype-premium\resources\views/gestion/insert.blade.php ENDPATH**/ ?>