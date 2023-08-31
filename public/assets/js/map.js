$(function(){
    $(".showmap").click(function(e) {
        var id = $(this).attr("id");
        $.ajax({
            type: 'post',
            url: '/showmap',
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            cache: false,
            success: function(respond) {
                $("#loadmap").html(respond);
            }
        });
        $("#modal-showmap").modal("show");
    });
});
