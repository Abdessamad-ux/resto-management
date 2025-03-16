

<?php $__env->startSection('title', 'Modifier l\'Ingrédient'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <h2>Modifier l'Ingrédient</h2>
        <form action="<?php echo e(route('admin.ingredients.update', $ingredient)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="mb-3">
                <label for="name_fr">Nom (FR)</label>
                <input type="text" name="name_fr" id="name_fr" class="form-control" value="<?php echo e($ingredient->name_fr); ?>" required>
            </div>
            <div class="mb-3">
                <label for="name_en">Nom (EN)</label>
                <input type="text" name="name_en" id="name_en" class="form-control" value="<?php echo e($ingredient->name_en); ?>" required>
            </div>
            <div class="mb-3">
                <label for="name_nl">Nom (NL)</label>
                <input type="text" name="name_nl" id="name_nl" class="form-control" value="<?php echo e($ingredient->name_nl); ?>" required>
            </div>
            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                <?php if($ingredient->image): ?>
                    <img src="<?php echo e(asset('storage/' . $ingredient->image)); ?>" alt="Image actuelle" width="100" class="mt-2">
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-custom">Mettre à jour</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel\restaurant-management\resources\views/admin/ingredients/edit.blade.php ENDPATH**/ ?>