<!--end switcher-->
<!-- Bootstrap JS -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<!--plugins-->

<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/plugins/chartjs/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
<script src="{{asset('assets/js/index.js')}}"></script>
<!--app JS-->
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="https://developercodez.com/developerCorner/parsley/parsley.min.js"></script>
{{--<script src="{{asset('assets/snackbar/dist/js-snackbar.js')}}"></script>--}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print']
        } );

        table.buttons().container()
            .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    } );
</script>
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Kiểm tra nếu có thông báo trong sessionStorage và hiển thị thông báo đó
        var message = sessionStorage.getItem('alertMessage');
        var type = sessionStorage.getItem('alertType');
        if (message && type) {
            showAlert(type, message);
            sessionStorage.removeItem('alertMessage');
            sessionStorage.removeItem('alertType');
        }

        // Xử lý sự kiện submit form
        $('#formSubmit').on('submit', function(e) {
            if ($(this).parsley().validate()) {
                e.preventDefault();
                var formData = new FormData(this);
                var html = '<button class="btn btn-primary" type="button" disabled=""> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...</button>';
                var html1 = '<input type="submit" id="submitButton" class="btn btn-primary px-4" />';

                $('#submitButton').html(html); // Đặt trạng thái nút thành "loading"

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        if (result.status === 'success') {
                            // Lưu thông báo vào sessionStorage
                            sessionStorage.setItem('alertMessage', result.message);
                            sessionStorage.setItem('alertType', 'success');

                            if (result.data.reload != undefined) {
                                window.location.href = window.location.href;
                            }
                        } else {
                            $.each(result.message, function (key, value) {
                                showAlert('error', value[0]);
                            });
                        }
                        $('#submitButton').html(html1); // Khôi phục trạng thái nút
                    },
                    error: function (xhr) {
                        $.each(xhr.responseJSON.message, function (key, value) {
                            showAlert('error', value[0]);
                        });
                        $('#submitButton').html(html1); // Khôi phục trạng thái nút
                    }
                });
            }
        });

        // Hàm deleteData để xử lý việc xóa dữ liệu
        window.deleteData = function(id, table) {
            if (confirm("Are you sure want to delete") == true) {
                $.ajax({
                    type: 'GET',
                    url: "{{url('admin/deleteData')}}/"+id+"/"+table+"",
                    data: '',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        if (result.status === 'success') {
                            // Lưu thông báo vào sessionStorage
                            sessionStorage.setItem('alertMessage', result.message);
                            sessionStorage.setItem('alertType', 'success');

                            if (result.data.reload != undefined) {
                                window.location.href = window.location.href;
                            }
                        } else {
                            $.each(result.message, function (key, value) {
                                showAlert('error', value[0]);
                            });
                        }
                    },
                    error: function (xhr) {
                        $.each(xhr.responseJSON.message, function (key, value) {
                            showAlert('error', value[0]);
                        });
                    }
                });
            }
        }
    });

    // Hàm showAlert để hiển thị thông báo
    function showAlert(type, message) {
        if (type === 'success') {
            alert('Success: ' + message);
        } else if (type === 'error') {
            alert('Error: ' + message);
        }
    }
</script>

<script>
    function showAlert(status, message) {
        // Map status to Toastr type
        const toastrType = {
            'success': 'success',
            'info': 'info',
            'warning': 'warning',
            'error': 'error'
        };

        // Use default 'info' if status is unknown
        const type = toastrType[status] || 'info';

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        toastr[type](message);
    }

</script>

<script>
    $(document).ready(() => {
        $("#photo").change(function () {
            const  file = this.files[0];
            if(file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $("#imgPreview")
                        .attr("src",event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
