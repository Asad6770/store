$(document).ready(function () {
    $(".modal-load").on("click", function (e) {
        console.log('click');
        e.preventDefault();
        $('.modal-body').html('');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'get',
            url: $(this).attr('href'),
            success: function (data) {
                $(".modal-body").html(data);

            }
        });
    });


});
