
<?php $__env->startSection('title'); ?>
Cow Cash | Farming
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>




<div class="container-fluid">
  <div class="row">
    <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
      <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row py-4 justify-content-center">
          <!--Displaying the Total Registered Clinics as well as Total Revenue Generated-->

          <div class="col-md-6">
            <div class="card welcome-card">
              <div class="s">
                <div class="d-flex align-content-center align-middle bd-highlight">
                  <div class="icon1 text-center"><img src="images/specialist-user.png"></div>
                  <div class="flex-grow-1 valtop">
                    <div class="heading">Total Clients</div>
                    <div class="cont-val"><?php echo e($totalcustomers); ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card welcome-card">
              <div class="s">
                <div class="d-flex align-content-center align-middle bd-highlight">
                  <div class="icon2 text-center"><img src="images/deadline.png"></div>
                  <div class="flex-grow-1 valtop">
                    <div class="heading2">Total Appointment</div>
                    <div class="cont-val"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--End here-->

        </div>

      </div>
    </main>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cowcash\resources\views/home/dashboard.blade.php ENDPATH**/ ?>