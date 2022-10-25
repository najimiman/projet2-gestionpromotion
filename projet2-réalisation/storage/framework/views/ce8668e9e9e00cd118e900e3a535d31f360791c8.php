<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
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
    </form>
        <!-- for liste de students -->
    <table>
        <input type="search" id="searchstudent" name="searchstudent" placeholder="search student">
            <tbody class="table1">
            <?php $__currentLoopData = $studentPromo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr> 
            <td><?php echo e($values['First_name']); ?></td>
            <td><?php echo e($values['Last_name']); ?></td>
            <td><?php echo e($values['Email']); ?></td> 
            <td> <input id="pp" type="hidden" value="<?php echo e($values['PromotionID']); ?>"></td> 
            <td><a href="<?php echo e(route('gestion.editstudent',[$values['id']])); ?>"><button>update</button></a></td>
            <form action="<?php echo e(route('gestionstud.destroy',[$values['id']])); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('delete'); ?>
                <td><input type="submit" value="delete"></td>
        </form>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        
        <tbody id="Content" class="table2">
        </tbody>
    </table>
    <a href="<?php echo e(route('gestion.insert', $promotion->id)); ?>">ajouter student</a>
    
    
    
    <script type="text/javascript">
        $('#searchstudent').on('keyup',function(){
            $value=$(this).val();
            $idp=$('#pp').val();
            if($value){
                $('.table1').hide();
                $('.table2').show();
            }
            else{
                $('.table1').show();
                $('.table2').hide();
            }
            $.ajax({
                type:'get',
                url:'<?php echo e(URL::to("searchstudent")); ?>',
                data:{'search':$value,'PromotionID':$idp},
                success:function(data){
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        })
        </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\projet2-prototype-premium\resources\views/gestion/edit.blade.php ENDPATH**/ ?>