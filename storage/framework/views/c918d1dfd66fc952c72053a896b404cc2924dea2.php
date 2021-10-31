<li class="nav-item dropdown announcements d-flex align-items-center px-3" id="announcements-icon">
    <a href="#"
       class="text-gray-500 position-relative nav-icon"
       id="announcementsDropdown"
       role="button"
       data-toggle="dropdown"
       aria-haspopup="true"
       aria-expanded="false">
        <?php if(count($announcements) > 0 && $announcements->first()->wasReadBy(auth()->user())): ?>
            <i class="activity-badge"></i>
        <?php endif; ?>
        <i class="fas fa-bullhorn"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right position-absolute p-0 shadow-lg"
         aria-labelledby="announcementsDropdown"
         style="width: 380px; height: 350px; overflow-y: scroll; overflow-x: hidden;">
        <div class="text-center p-4">
            <h5 class="text-muted mt-2">
                <?php echo app('translator')->get('Announcements'); ?>
            </h5>
            <?php if(count($announcements) > 0): ?>
                <a href="<?php echo e(route('announcements.list')); ?>">
                    <?php echo app('translator')->get('View All'); ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="bg-lighter">
            <?php if(count($announcements) > 0): ?>
                <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('announcements::partials.navbar.item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p class="text-center"><?php echo app('translator')->get('No new announcements at the moment.'); ?></p>
            <?php endif; ?>
        </div>

    </div>
</li>
<?php /**PATH C:\Users\NDT\PycharmProjects\trealet\audiences\vendor\vanguardapp\announcements\src/../resources/views/partials/navbar/list.blade.php ENDPATH**/ ?>