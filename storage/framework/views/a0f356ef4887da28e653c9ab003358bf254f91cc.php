
<?php $__env->startSection('title'); ?>
    Zine Collective | International Marketing
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css'/>
    <style>
        .modal-footer {
            padding: 10px 0px;
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
                            <div class="page-heading">View Appointment</div>
                        </div>
                    </div>
                </div>

                
                
                
                
                
                
                
                
                
                
                
                
                <div class="page-header row py-4 justify-content-center">
                    <div class="col-md-9" style=" margin: 70px">
                        <div id="calendar">

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         data-backdrop='static' data-keyboard='false'>
        <div class="modal-dialog" role="document" style="transform: none">
            <div class="modal-content">
                <form method="post" action="" enctype="multipart/form-data" id="form">
                    <div class="modal-body">
                        <h4>Appointment</h4>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <input hidden name="id" id="id">
                        <input hidden name="event_id" id="event_id">

                        <div class="row">
                            <div class="col-md-6">
                                Date:
                                <br/>
                                <input type="date" class="form-control" name="date" id="date">
                            </div>
                            <div class="col-md-6">
                                Time:
                                <br/>
                                <input type="time" class="form-control" name="time" id="time">
                            </div>
                            <div class="col-md-6 mt-2">
                                Type :
                                <br/>
                                <select name="type" id="type" class="form-control">
                                    <option value="">Select type</option>
                                    <option value="Buyer">Buyer</option>
                                    <option value="Seller">Seller</option>
                                    <option value="Both">Both</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-2">
                                Client:
                                <br/>
                                <select name="user_id" id="users" class="form-control">
                                    <option value="">Select Client</option>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-12 mt-2">
                                Comments:
                                <br/>
                                <textarea class="form-control" name="comments" id="comments" cols="10"
                                          rows="3"></textarea>
                            </div>
                            <div class="col-md-6 mt-2 mb-2">
                                Upload Audio:
                                <br/>
                                <input id="newAudio" type="file" name="audio" class="form-control">
                                <div id="audioDiv">
                                    <label for="" class="mt-1">Old Audio</label>
                                    <audio controls id="audio">
                                        
                                        <source id="source" src="" type="audio/mpeg">
                                    </audio>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"
                                    onclick="document.getElementById('audio').pause();">Close
                            </button>
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('script'); ?>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

            <script>
                $(document).ready(function () {
                    $('#calendar').fullCalendar({
                        // put your options and callbacks here
                        defaultView: 'month',
                        eventColor: 'white',
                        events: [
                            <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                {
                                    id: '<?php echo e($appointment->id); ?>',
                                    user_id: '<?php echo e($appointment->user_id); ?>',
                                    comments:  `<?php echo $appointment->comments; ?>`,
                                    title: '<?php echo e(ucfirst($appointment->type) .'|'. ucfirst($appointment->user->name)); ?>',
                                    start: '<?php echo e($appointment->date_time); ?>',
                                    end: '<?php echo e($appointment->date_time); ?>',
                                    audio: '<?php echo e($appointment->audio); ?>',
                                    contact: '<?php echo e($appointment->contact); ?>',
                                },
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ],
                        eventClick: function (calEvent, jsEvent, view) {
                            let type = calEvent.title.split('|')[0];
                            let user_id = calEvent.user_id;

                            $("#type option").filter(function () {
                                return $(this).text() == type;
                            }).prop('selected', true);

                            $("#users option").filter(function () {
                                return $(this).val() == user_id;
                            }).prop('selected', true);

                            if (calEvent.audio) {
                                var audio = document.getElementById('audio');
                                var source = document.getElementById('source');
                                source.src = calEvent.audio;
                                audio.load();
                                $('#audioDiv').show();
                            } else {
                                $('#audioDiv').hide();
                            }

                            var url = '<?php echo e(route('appointments.update',':id')); ?>';
                            url = url.replace(':id', calEvent.id);

                            $('#form').attr('action',url);
                            $('#event_id').val(calEvent._id);
                            $('#id').val(calEvent.id);
                            $('#date').val(moment(calEvent.start).format('YYYY-MM-DD'));
                            $('#time').val(moment(calEvent.start).format('HH:mm'));
                            $('#comments').text(calEvent.comments);
                            $('#editModal').modal();
                        }
                    });
                });
            </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cowcash\resources\views/appointments/index.blade.php ENDPATH**/ ?>