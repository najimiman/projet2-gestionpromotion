<form action="<?php echo e(route('gestion.store')); ?>" method="post">
    <?php echo csrf_field(); ?>
 nom:<input name="name" type="text"  >
 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
     <?php echo e($message); ?>

 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <button type="submit">ajouter</button>
</form><?php /**PATH C:\xampp\htdocs\projet2-gestionpromotion\projet2-promoappren\resources\views/gestion/create.blade.php ENDPATH**/ ?>