@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
                        <h6 class="font-weight-normal mb-0">Selamat datang kembali di halaman dashboard
                            <span class="text-primary">admin!</span>
                        </h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <span class="btn btn-sm btn-light bg-white">
                                    <div id="dynamicDate"></div>
                                    <script>
                                        // Get the current date
                                        var today = new Date();

                                        // Define months array
                                        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

                                        // Format the date
                                        var formattedDate = "Today (" + today.getDate() + " " + months[today.getMonth()] + " " + today.getFullYear() + ")";

                                        // Display the formatted date in the div
                                        document.getElementById('dynamicDate').innerHTML = formattedDate;
                                    </script>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                    <div class="card-people mt-auto">
                        <img src="{{ asset('backend/images/dashboard/people.svg') }}" alt="people">
                        <div class="weather-info">
                            <div class="d-flex">
                                <div>
                                    <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                                </div>
                                <div class="ml-2">
                                    <h4 class="location font-weight-normal">Jakarta</h4>
                                    <h6 class="font-weight-normal">Indonesia</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Today’s Bookings</p>
                                <p class="fs-30 mb-2">4006</p>
                                <p>10.00% (30 days)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Bookings</p>
                                <p class="fs-30 mb-2">61344</p>
                                <p>22.00% (30 days)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Number of Meetings</p>
                                <p class="fs-30 mb-2">34040</p>
                                <p>2.00% (30 days)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Number of Clients</p>
                                <p class="fs-30 mb-2">47033</p>
                                <p>0.22% (30 days)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                    <div class="ml-xl-4 mt-3">
                                        <p class="card-title">Detailed Reports</p>
                                        <h1 class="text-primary">$34040</h1>
                                        <h3 class="font-weight-500 mb-xl-4 text-primary">North
                                            America</h3>
                                        <p class="mb-2 mb-xl-0">The total number of sessions within
                                            the date range. It is the period time a user is actively
                                            engaged with your website, page or app, etc</p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-9">
                                    <div class="row">
                                        <div class="col-md-6 border-right">
                                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                <table class="table table-borderless report-table">
                                                    <tr>
                                                        <td class="text-muted">Illinois</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-primary" role="progressbar"
                                                                    style="width: 70%" aria-valuenow="70" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-weight-bold mb-0">713
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Washington</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    style="width: 30%" aria-valuenow="30" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-weight-bold mb-0">583
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Mississippi</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: 95%" aria-valuenow="95" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-weight-bold mb-0">924
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">California</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-info" role="progressbar"
                                                                    style="width: 60%" aria-valuenow="60"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-weight-bold mb-0">664
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Maryland</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-primary" role="progressbar"
                                                                    style="width: 40%" aria-valuenow="40"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-weight-bold mb-0">560
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Alaska</td>
                                                        <td class="w-100 px-0">
                                                            <div class="progress progress-md mx-4">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: 75%" aria-valuenow="75"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-weight-bold mb-0">793
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <canvas id="north-america-chart"></canvas>
                                            <div id="north-america-legend"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
