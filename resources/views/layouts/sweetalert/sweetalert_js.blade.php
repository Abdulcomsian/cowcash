<script type="text/javascript" src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>
<script>
    $(function () {
        //Delete Confirmation
        $(document).on("click",".confirm",function(event) {
            event.preventDefault();
            let form_id = '';
            let link = '';
            if($(event.target).is('button')){
                console.log('Button clicked');
                form_id = '#form_'+ $(this).attr('id');
            }else if($(event.target).is('span')){
                console.log('span clicked');
                form_id = '#form_'+ $(this).closest('button').attr('id');
            }else if($(event.target).is('svg')){
                form_id = '#form_'+ $(this).closest('button').attr('id');
                console.log('svg clicked');

            }
            else if($(event.target).is('i')){
                form_id = '#form_'+ $(this).closest('button').attr('id');
                console.log('i clicked');

            }else{
                link = $(this).attr('href');
            }
            console.log('form_id',form_id);
            console.log('link',link);
            swal({
                    title: "Are you sure?",
                    // text: "You will not be able to recover this record!",
                    type: "warning",
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes!',
                    showCancelButton: true,
                    closeOnConfirm: false,
                    //closeOnCancel: false
                },
                function(){
                    swal("Deleted!", "Record has been deleted!", "success");
                    if (link){
                        window.location = link;
                    }
                    if (form_id){
                        $(form_id).submit();
                    }
                });
        });
    });
</script>
