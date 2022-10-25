<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <a href="gestion/create">ajouter promotion</a>
    <input placeholder="serch" type="search" id="search" name="search">
    <table>
        <tbody class="table1">
        <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr> 
        <td><?php echo e($value['name']); ?></td>
        <td><a href="<?php echo e(route('gestion.edit',[$value['id']])); ?>"><button>update</button></a></td>
    
        <form action="<?php echo e(route('gestion.destroy',[$value['id']])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
            <td><input type="submit" value="delte"></td>
    </form>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    <tbody id="Content" class="table2">
    </tbody>
    </table>
    <script type="text/javascript">
        $('#search').on('keyup',function(){
            $value=$(this).val();
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
                url:'<?php echo e(URL::to("search")); ?>',
                data:{'search':$value},
                success:function(data){
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        })
        </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\projet2-réalisation\resources\views/gestion/index.blade.php ENDPATH**/ ?>