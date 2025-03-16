

<?php $__env->startSection('title', 'Détails de l\'Ingrédient'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h2>Détails de l'Ingrédient</h2>
                <p><strong>ID:</strong> <?php echo e($ingredient->id); ?></p>
                <p><strong>Nom (FR):</strong> <?php echo e($ingredient->name_fr); ?></p>
                <p><strong>Nom (EN):</strong> <?php echo e($ingredient->name_en); ?></p>
                <p><strong>Nom (NL):</strong> <?php echo e($ingredient->name_nl); ?></p>
                <p><strong>Image:</strong> <?php if($ingredient->image): ?> <img src="<?php echo e(asset('storage/' . $ingredient->image)); ?>" alt="Image" width="100"> <?php else: ?> Aucune <?php endif; ?></p>
                <a href="<?php echo e(route('admin.ingredients.index')); ?>" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel\restaurant-management\resources\views/admin/ingredients/show.blade.php ENDPATH**/ ?>