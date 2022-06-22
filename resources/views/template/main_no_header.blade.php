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



</head>

<body class="bg-light">


    <main class="m-4" id="main">
        <div class="container-fluid">
            @yield('container')
        </div>

    </main>

    <footer id="footer" class="footer">
        <div class="footer-legal text-center bg-dark" style="padding: 15px 0">
            <div class="">

                <div class="">

                    <div class="text-light">
                        Website by <a href="https://www.linkedin.com/in/vincentmoeljopranoto/" class="text-light"
                            target="_blank"><strong>Vincent Nathaniel M</strong></a>
                    </div>
                    <div class="text-light">
                        WhatsApp <a href="https://wa.me/6285156591059" class="text-light"
                            target="_blank"><strong>0851-5659-1059</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

</body>

<style>
    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
    }

</style>

</html>
