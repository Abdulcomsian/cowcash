
<?php $__env->startSection('title'); ?>
Zine Collective | Onboarding Link
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <div class="clinic-s">
                <div class="row py-4 container-fluid ">
                    <div class="col-md-12">
                        <div class="page-heading">Onboarding Link </div>
                    </div>
                </div>
            </div>
            <div class="main-content-container container-fluid px-4">
                <div class="page-header py-4">
                    <div class="col-md-9" style=" margin: 70px">
                        <div class="card card-small clinic-card">
                            <div class="card-header border-bottom">
                                Add Link
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo e(route('onboarding.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="mb-2 formlabel">Onboarding Link:
                                                <Link>
                                                </Link>
                                            </label>
                                            <input type="text" class="form-control" id="link" name="link" value="<?php echo e($onboardinglink->link ?? 'https://form.jotform.com/202872628835363'); ?>" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-add">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cowcash\resources\views/onboarding/onboardingform.blade.php ENDPATH**/ ?>