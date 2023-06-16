<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        {{ config('app.name', 'Laravel') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('demo/demo.css') }}" rel="stylesheet" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

    @yield('link')
</head>


<body class="">
    <div class="wrapper ">
        @if(Request::is('login') || Request::is('register') )
        @yield('content')
        @else
        @include('components.sidebar')
        <div class="main-panel">
            <!-- Navbar -->
            @include('components.header')
            <!-- End Navbar -->
            @include('sweetalert::alert')
            @yield('content')

            <!-- Footer -->
            @include('components.footer')
            <!-- End Footer -->
        </div>
        @endif

    </div>

    <!--   Core JS Files   -->

    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('demo/demo.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
    <script>
        $(document).ready(function() {
            // Calculate the sum of selected product items' values
            function calculateSum() {
                var sum = 0;
                $('#product_items option:selected').each(function() {
                    var value = $(this).data('value');
                    if (value) {
                        sum += parseFloat(value);
                    }
                });
                $('#amount').val(sum);
            }

            // Call calculateSum function when the selection changes
            $('#product_items').change(function() {
                calculateSum();
            });

            // Calculate the initial sum when the page loads
            calculateSum();
        });
    </script>
    <script>
        $(document).ready(function() {
            // Function to add future plan input field
            $('#addFuturePlan').click(function() {
                var futurePlanField = '<div class="input-group mb-3">' +
                    '<input type="number" min="0" name="futurePlans[]" class="form-control">' +
                    '<div class="input-group-append">' +
                    '<button class="btn btn-danger removeFuturePlan my-0" type="button">Remove</button>' +
                    '</div>' +
                    '</div>';

                $('#futurePlanFields').append(futurePlanField);
            });

            // Function to remove future plan input field
            $(document).on('click', '.removeFuturePlan', function() {
                $(this).closest('.input-group').remove();
            });

            // Other existing code...

            // Validation to allow only positive values
            $('#invoiceForm').on('input', 'input[type="number"]', function() {
                var value = parseFloat($(this).val());
                if (isNaN(value) || value < 0) {
                    $(this).val('');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Function to calculate the sum of selected options' data-value attributes
            function calculateTotalAmount() {
                var totalAmount = 0;

                // Calculate the sum for the main product package
                var mainProductPackage = $('#mainProductPackage').find(':selected');
                if (mainProductPackage.length > 0) {
                    totalAmount += parseFloat(mainProductPackage.data('main'));
                }

                // Calculate the sum for the future product packages
                var futureProductPackages = $('#futureProductPackages').find(':selected');
                if (futureProductPackages.length > 0) {
                    futureProductPackages.each(function() {
                        totalAmount += parseFloat($(this).data('future'));
                    });
                }

                // Display the total amount in the 'amount' input field
                $('#amount').val(totalAmount.toFixed(2));
            }

            // Call the calculateTotalAmount function when the main product package or future product packages are changed
            $('#mainProductPackage, #futureProductPackages').on('change', function() {
                calculateTotalAmount();
            });

            // Call the calculateTotalAmount function on page load
            calculateTotalAmount();
        });
    </script>

    @yield('script')
</body>

</html>