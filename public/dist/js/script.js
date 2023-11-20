
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


    $(document).on('submit', '.submitData', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            dataType: 'json',
            processData: false,
            success: function (data) {
                if (data.status == 400) {
                    $('.error').text('');
                    $.each(data.error, function (key, value) {
                        $('.' + key + '_error').text(value);
                        // console.log('.' + key + '_error');
                    });
                }
                else {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.success,
                        showConfirmButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                }
            }
        });
    });

    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: $(this).attr('href'),
                    data: { id: id },
                    success: function (data) {
                        if (data.status == 300) {
                            Swal.fire(
                                'Deleted!',
                                data.success,
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        }
                        else {
                            alert('Somthing went worng!');
                        }
                    }
                });
            }
        })
    });
});
