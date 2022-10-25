<form action="<?php echo e(route('gestion.update',[$promotion->id])); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
 nom:<input name="name" value="<?php echo e($promotion->name); ?>" type="text"  >
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
    <button type="submit">modifier</button>
</form><?php /**PATH C:\xampp\htdocs\laravel_les_test\projet2-promoappren\resources\views/gestion/edit.blade.php ENDPATH**/ ?>