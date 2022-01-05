<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(function () {
        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! $data['url'] !!}',
            columns: {!! $data['columns'] !!},
            lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
        });
    });
</script>
