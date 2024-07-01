<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="/assets/img/logo/logo.png" rel="icon">
    <title>@yield('title')</title>
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/ruang-admin.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">


</head>
<style>
    @media print {
        .no-print {
            display: none;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
    }
    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .header img {
        width: 100px;
    }
    .header .title {
        flex-grow: 1;
        text-align: center;
    }
    .header .title h2, .header .title h4 {
        margin: 0;
    }
</style>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        @include('partials.sidebar')
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <span class="text-white" style="font-family:'Courier New', Courier, monospace">
                        <h1><i><marquee behavior="right" direction="">Apotik Sanika Jambi</marquee></i></h1>
                    </span>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="/assets/img/boy.png"
                                    style="max-width: 60px">
                                <span class="ml-2 d-none d-lg-inline text-white small">
                                    @if (Auth()->user()->isAdmin)
                                        Pemilik
                                    @else
                                        Pegawai
                                    @endif
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <div class="modal-footer justify-content-center">
                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
                @yield('content')
                <!-- Footer -->
                <footer class="sticky-footer bg-white no-print">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>copyright - developed by
                                <b><a href="#" target="_blank">AKAR</a></b>
                            </span>
                        </div>
                    </div>
                </footer>
                <!-- Footer -->
            </div>
        </div>

        <!-- Scroll to top -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <script>
            function confirmDelete(id) {
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    document.getElementById('deleteForm' + id).submit();
                }
            }
            </script>

        <script src="/assets/vendor/jquery/jquery.min.js"></script>
        <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="/assets/js/ruang-admin.min.js"></script>
        <script src="/assets/vendor/chart.js/Chart.min.js"></script>
        <script src="/assets/js/demo/chart-area-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.2/dist/sweetalert2.all.min.js"></script>
        {{-- <script>
            function confirmDelete(id) {
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    document.getElementById('deleteForm' + id).submit();
                }
            }
            </script> --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('danger'))
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data Berhasil Di Hapus',
                        showConfirmButton: false,
                        timer: 1500
                    });
                @endif
            });

            function confirmDelete(id) {
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
            // If the user clicks "Yes," submit the form
            document.getElementById('deleteForm' + id).submit();
        }
    });
}
        </script>
        <script>
            function getObatDetails() {
                var kodeObat = document.getElementById("code").value;

                // Lakukan AJAX request ke server
                fetch('/get-obat-details/' + kodeObat)
                    .then(response => response.json())
                    .then(data => {
                        // Update formulir dengan data obat yang diterima dari server
                        document.getElementById("name").value = data.name;
                        document.getElementById("shape_drugs").value = data.shape_drugs;
                    })
                    .catch(error => console.error('Error:', error));
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
        <script>
            new DataTable('#example');
        </script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
        <script>
           new DataTable('#dataTable', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
        </script>
        <script>
            var formfield = document.getElementById('formfield');

            function addMedicineField() {
                var container = document.getElementById("medicine-container");
                var div = document.createElement("div");
                div.classList.add("form-group", "mb-4");
                div.innerHTML = '<label for="medicine">Obat</label><input type="text" name="medicine[]" class="form-control">';
                container.appendChild(div);
            }

            function removeMedicineField() {
                var container = document.getElementById("medicine-container");
                var children = container.getElementsByClassName("form-group");
                if (children.length > 1) {
                    container.removeChild(children[children.length - 1]);
                }
            }
        </script>
        @include('components.component-stock')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#medicine_code').change(function() {
                    var selectedCode = $(this).val();
                    if (selectedCode) {
                        $.ajax({
                            url: '/get-medicine-name/' + selectedCode,
                            type: 'GET',
                            success: function(response) {
                                if (response) {
                                    $('#medicine_name').empty();
                                    $('#medicine_name').removeAttr('disabled');
                                    $.each(response, function(key, value) {
                                        $('#medicine_name').append('<option value="' + key + '">' + value + '</option>');
                                    });
                                } else {
                                    $('#medicine_name').empty();
                                    $('#medicine_name').attr('disabled', 'disabled');
                                    $('#medicine_name').append('<option value="">No Name Found</option>');
                                }
                            }
                        });
                    } else {
                        $('#medicine_name').empty();
                        $('#medicine_name').attr('disabled', 'disabled');
                        $('#medicine_name').append('<option value="">Pilih Kode Obat terlebih dahulu</option>');
                    }
                });
            });
        </script>
        <script>
            function resetForm() {
                document.getElementById('start_date').value = '';
                document.getElementById('end_date').value = '';
                window.location.href = "{{ route('drugs.filter') }}";
            }
        </script>
        <script>
            function resetFormTransaction() {
                document.getElementById('start_date').value = '';
                document.getElementById('end_date').value = '';
                window.location.href = "{{ route('transaction.filter') }}";
            }
        </script>
        
</body>




</html>
