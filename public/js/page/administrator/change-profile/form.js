$(() => {
    $('.change-profile').on('click', function () {
        clearErrorMessage();
        $('#modal-change-profile').modal('show');

        $.ajax({
            url: BASE_URL + 'users/get-profile',
            type: "GET",
            dataType: "json",
            success: (res) => {
                $('#profile-fullname').val(res.name);
                $('#profile-username').val(res.username);
                $('#profile-email').val(res.email);
            },
            error: (xhr) => {
                showErrorToastr('Oops', 'Gagal mengambil data profil pengguna.');
            }
        });
    });

    $('#form-change-profile').on('submit', function (e) {
        e.preventDefault();
    
        let data = new FormData(this);
    
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: () => {
                clearErrorMessage();
                $('#modal-change-profile').find('.modal-dialog').LoadingOverlay('show');
            },
            success: (res) => {
                $('#modal-change-profile').find('.modal-dialog').LoadingOverlay('hide', true);
                $(this)[0].reset();
                clearErrorMessage();
                $('#modal-change-profile').modal('hide');
    
                Swal.fire({
                    title: 'Sukses',
                    text: 'Profile berhasil diubah.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            },
            error: ({ status, responseJSON }) => {
                $('#modal-change-profile').find('.modal-dialog').LoadingOverlay('hide', true);
    
                if (status === 422) {
                    return generateErrorMessage(responseJSON, true);
                }
    
                return showErrorToastr('Oops', responseJSON.msg);
            }
        });
    });    

    $('#profile-photo').on('change', function (event) {
        const file = this.files[0];

        if (file) {
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            if (!validTypes.includes(file.type)) {
                swal({
                    title: 'Invalid File Format',
                    text: 'Please upload an image file (PNG, JPG, or JPEG).',
                    icon: 'error',
                    button: 'OK'
                });
                $(this).val('');
                return;
            }

            const maxSize = 1 * 1024 * 1024;
            if (file.size > maxSize) {
                swal({
                    title: 'File Too Large',
                    text: 'The file size exceeds the 1 MB limit.',
                    icon: 'error',
                    button: 'OK'
                });
                $(this).val('');
                return;
            }

            const reader = new FileReader();
            reader.onload = function (e) {
                $('#photo-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});