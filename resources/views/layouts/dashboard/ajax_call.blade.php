<script>
    function ajaxCall(type,url,data) {
        $.ajax({
            type: type,
            url: url,
            data:data,
            success: function (data) {
                console.log(data);
            }
        });
    }
</script>
