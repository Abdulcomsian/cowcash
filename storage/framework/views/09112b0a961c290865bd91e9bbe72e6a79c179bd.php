
<?php $__env->startSection('title'); ?>
Zine Collective | International Marketing
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<style>
  #customertable_filter {
    float: right;
  }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
    <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
      <div class="clinic-s">
        <div class="row py-4 container-fluid ">
          <div class="col-md-12">
            <div class="page-heading">View Client </div>
          </div>
        </div>
      </div>
      <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header py-4">
          <!-- <div class="pagination-container float-right">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">
                      <i class="material-icons">
                        navigate_before
                      </i>
                    </span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">
                      <i class="material-icons">
                        navigate_next
                      </i>
                    </span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div> -->
          <div class=" table-responsive-sm">
            <table class="table  table-sm table-hover " id="customertable">
              <!-- <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm"> -->
              <thead class="thead-dak">
                <tr>
                  <th scope="col">SR#</th>
                  <th scope="col">Client Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Appointments</th>
                  <th scope="col">Contact</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <th scope="row"><?php echo e($loop->index+1); ?></th>
                  <td><?php echo e($customer->name); ?></td>
                  <td><?php echo e($customer->email); ?></td>
                    <td><?php echo e($customer->appointments_count); ?></td>
                    <td><?php echo e($customer->phone_number); ?></td>
                  <td><a href="<?php echo e(url('compaign',$customer->id)); ?>"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>

          <!-- <div class="pagination-container float-right">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">
                      <i class="material-icons">
                        navigate_before
                      </i>
                    </span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">
                      <i class="material-icons">
                        navigate_next
                      </i>
                    </span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div> -->
        </div>
      </div>
    </main>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
  $(document).ready(function() {
    $('#customertable').DataTable();
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zine-adminpanel\resources\views/customers/view_customer.blade.php ENDPATH**/ ?>