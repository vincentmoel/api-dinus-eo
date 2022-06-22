<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>GIA</title>

    <!-- Favicons -->
    <link href="/assets/img/logo.svg" rel="icon">
    <link href="/assets/img/logo.svg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> --}}

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="/assets/css/variables.css?ver=<?= filemtime('assets/css/variables.css') ?>" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="/assets/css/main.css?ver=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet">
    <link href="/assets/css/style.css?ver=<?= filemtime('assets/css/style.css') ?>" rel="stylesheet">

    <!-- Data Tables -->
    <script src="/assets/js/jquery-3.5.1.js"></script>
    <script src="/assets/vendor/DataTables/DataTables-1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="/assets/vendor/DataTables/DataTables-1.11.5/css/jquery.dataTables.min.css">

    {{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> --}}

    <script src="/assets/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>

<body class="bg-light">

    <!-- ======= Header ======= -->
    @include('partials.header')
    <!-- End Header -->


    <main class="mb-5" id="main" style="margin-top:145px; min-height: 70vh">
        <div class="container">
            @yield('container')
        </div>

    </main>


    <!-- ======= Footer ======= -->
    @include('partials.footer')
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <!-- Vendor JS Files -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

</body>

</html>

<script>
    $("form[id=form-delete]").submit(function(e) {
        e.preventDefault();
        var form = this; // "this" is a reference to the submitted form

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger me-2'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your data has been deleted.',
                    'success'
                ).then(function() {
                    form.submit(); // <--- submit form programmatically
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // swalWithBootstrapButtons.fire(
                //     'Cancelled',
                //     'Your imaginary file is safe :)',
                //     'error'
                // )
            }
        })
    });
</script>
