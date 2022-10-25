<form action="<?php echo e(route('gestionstud.update',[$student->id])); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
 first name:<input name="First_name" value="<?php echo e($student->First_name); ?>" type="text"  >
 last name:<input name="Last_name" value="<?php echo e($student->Last_name); ?>" type="text"  >
 email:<input name="Email" value="<?php echo e($student->Email); ?>" type="email"  >
 idpromotion:<input name="PromotionID" value="<?php echo e($student->PromotionID); ?>"  >

    <button type="submit">modifier</button>
</form><?php /**PATH C:\xampp\htdocs\projet2-prototype-premium\resources\views/gestion/editstudent.blade.php ENDPATH**/ ?>