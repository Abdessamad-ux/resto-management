

<?php $__env->startSection('title', 'Gestion des Catégories'); ?>

<?php $__env->startSection('content'); ?>
    <div class="table-container">
        <h2>Gestion des categories</h2>
        <p>Veuillez selectionner un thème pour votre site</p>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="input-group w-25">
                <input type="text" class="form-control" placeholder="Recherche" name="search" value="<?php echo e(request('search')); ?>">
                
                
                <button type="submit" class="btn btn-outline-secondary">Rechercher</button>
            </div>
            <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-primary">+ NOUVELLE CATÉGORIE</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Meta Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <img src="<?php echo e($category->image ? asset('storage/' . $category->image) : 'https://via.placeholder.com/40'); ?>" alt="<?php echo e($category->name_fr); ?>">
                            <?php echo e($category->name_fr); ?>

                        </td>
                        <td><?php echo e($category->description ?? 'N/A'); ?></td>
                        <td><?php echo e($category->meta_title ?? 'N/A'); ?></td>
                        <td class="action-icons">
                            <a href="<?php echo e(route('admin.categories.show', $category)); ?>"><i class="bi bi-files"></i></a>
                            <form action="<?php echo e(route('admin.categories.destroy', $category)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="bi bi-trash" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')"></button>
                            </form>
                            <a href="<?php echo e(route('admin.categories.edit', $category)); ?>"><i class="bi bi-pencil"></i></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="4">Aucune catégorie trouvée.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php echo e($categories->links()); ?>

            </ul>
        </nav>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel\restaurant-management\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>