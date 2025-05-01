@extends('backend.layouts.adminlayouts')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Blogs Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <a href="{{ route('blogs.index') }}" class="card-link">
                                    <div class="card-body">
                                        <h5 class="card-title">Blogs</h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-journal-text"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $totalBlogs }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Tour Packages Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <a href="{{ route('admin.travel.index') }}" class="card-link">
                                    <div class="card-body">
                                        <h5 class="card-title">Tour Packages</h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-airplane"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $totalTourPackages }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- User Bookings Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card customers-card">
                                <a href="" class="card-link">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Bookings</h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-card-checklist"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6></h6>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{-- <!-- Enquiries Card -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">
                                <a href="{{ route('admin.enquiries') }}" class="card-link">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Enquiries</h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $totalEnquiries }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> --}}




                        <!-- Reports -->
                        <div class="col-12">
                            <div class="card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li><a class="dropdown-item filter-option" data-filter="today"
                                                href="#">Today</a></li>
                                        <li><a class="dropdown-item filter-option" data-filter="month" href="#">This
                                                Month</a></li>
                                        <li><a class="dropdown-item filter-option" data-filter="year" href="#">This
                                                Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Reports <span id="reportTime">/ Today</span></h5>

                                    <!-- Line Chart -->
                                    <div id="reportsChart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            let chart;
                                            const reportsChartElement = document.querySelector("#reportsChart");

                                            // Initial Data
                                            const chartData = {
                                                today: {
                                                    series: [{
                                                        name: 'Tour Packages',
                                                        data: [{{ $totalTourPackages }}, 5, 8, 3, 6, 4, 7]
                                                    }, {
                                                        name: 'Blogs',
                                                        data: [{{ $totalBlogs }}, 2, 4, 3, 5, 6, 8]
                                                    }],
                                                    categories: ["10 AM", "12 PM", "2 PM", "4 PM", "6 PM", "8 PM", "10 PM"]
                                                },
                                                month: {
                                                    series: [{
                                                        name: 'Tour Packages',
                                                        data: [{{ $totalTourPackages }}, 20, 25, 30, 15, 35, 28]
                                                    }, {
                                                        name: 'Blogs',
                                                        data: [{{ $totalBlogs }}, 10, 15, 20, 25, 30, 35]
                                                    }],
                                                    categories: ["Week 1", "Week 2", "Week 3", "Week 4", "Week 5", "Week 6", "Week 7"]
                                                },
                                                year: {
                                                    series: [{
                                                        name: 'Tour Packages',
                                                        data: [{{ $totalTourPackages }}, 110, 90, 120, 140, 130, 150]
                                                    }, {
                                                        name: 'Blogs',
                                                        data: [{{ $totalBlogs }}, 80, 85, 95, 100, 105, 110]
                                                    }],
                                                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"]
                                                }
                                            };

                                            // Function to Create Chart
                                            function createChart(data) {
                                                if (chart) chart.destroy(); // Destroy previous chart instance

                                                chart = new ApexCharts(reportsChartElement, {
                                                    series: data.series,
                                                    chart: {
                                                        height: 350,
                                                        type: 'area',
                                                        toolbar: {
                                                            show: false
                                                        }
                                                    },
                                                    markers: {
                                                        size: 4
                                                    },
                                                    colors: ['#4154f1', '#2eca6a'],
                                                    fill: {
                                                        type: "gradient",
                                                        gradient: {
                                                            shadeIntensity: 1,
                                                            opacityFrom: 0.3,
                                                            opacityTo: 0.4,
                                                            stops: [0, 90, 100]
                                                        }
                                                    },
                                                    dataLabels: {
                                                        enabled: false
                                                    },
                                                    stroke: {
                                                        curve: 'smooth',
                                                        width: 2
                                                    },
                                                    xaxis: {
                                                        categories: data.categories
                                                    },
                                                    tooltip: {
                                                        x: {
                                                            format: 'MMM yyyy'
                                                        }
                                                    }
                                                });

                                                chart.render();
                                            }

                                            // Load default chart (Today)
                                            createChart(chartData.today);

                                            // Filter Event Listener
                                            document.querySelectorAll(".filter-option").forEach(item => {
                                                item.addEventListener("click", (e) => {
                                                    e.preventDefault();
                                                    let filterType = item.getAttribute("data-filter");

                                                    // Update Title
                                                    document.querySelector("#reportTime").innerText = "/ " + item.innerText;

                                                    // Update Chart
                                                    createChart(chartData[filterType]);
                                                });
                                            });

                                        });
                                    </script>
                                    <!-- End Line Chart -->

                                </div>

                            </div>
                        </div>
                        <!-- End Reports -->

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><a href="#">#2457</a></th>
                                                <td>Brandon Jacob</td>
                                                <td><a href="#" class="text-primary">At praesentium minu</a></td>
                                                <td>$64</td>
                                                <td><span class="badge bg-success">Approved</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">#2147</a></th>
                                                <td>Bridie Kessler</td>
                                                <td><a href="#" class="text-primary">Blanditiis dolor omnis
                                                        similique</a></td>
                                                <td>$47</td>
                                                <td><span class="badge bg-warning">Pending</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">#2049</a></th>
                                                <td>Ashleigh Langosh</td>
                                                <td><a href="#" class="text-primary">At recusandae consectetur</a>
                                                </td>
                                                <td>$147</td>
                                                <td><span class="badge bg-success">Approved</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">#2644</a></th>
                                                <td>Angus Grady</td>
                                                <td><a href="#" class="text-primar">Ut voluptatem id earum et</a>
                                                </td>
                                                <td>$67</td>
                                                <td><span class="badge bg-danger">Rejected</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#">#2644</a></th>
                                                <td>Raheem Lehner</td>
                                                <td><a href="#" class="text-primary">Sunt similique distinctio</a>
                                                </td>
                                                <td>$165</td>
                                                <td><span class="badge bg-success">Approved</span></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->

                        <!-- Top Selling -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Top Selling <span>| Today</span></h5>

                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Preview</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Sold</th>
                                                <th scope="col">Revenue</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><a href="#"><img src="assets/img/product-1.jpg"
                                                            alt=""></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa
                                                        voluptas nulla</a></td>
                                                <td>$64</td>
                                                <td class="fw-bold">124</td>
                                                <td>$5,828</td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#"><img src="assets/img/product-2.jpg"
                                                            alt=""></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Exercitationem
                                                        similique doloremque</a></td>
                                                <td>$46</td>
                                                <td class="fw-bold">98</td>
                                                <td>$4,508</td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#"><img src="assets/img/product-3.jpg"
                                                            alt=""></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Doloribus nisi
                                                        exercitationem</a></td>
                                                <td>$59</td>
                                                <td class="fw-bold">74</td>
                                                <td>$4,366</td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#"><img src="assets/img/product-4.jpg"
                                                            alt=""></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint
                                                        rerum error</a></td>
                                                <td>$32</td>
                                                <td class="fw-bold">63</td>
                                                <td>$2,016</td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#"><img src="assets/img/product-5.jpg"
                                                            alt=""></a></th>
                                                <td><a href="#" class="text-primary fw-bold">Sit unde debitis
                                                        delectus repellendus</a></td>
                                                <td>$79</td>
                                                <td class="fw-bold">41</td>
                                                <td>$3,239</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Top Selling -->

                    </div>
                </div><!-- End Left side columns -->










                <!-- Right side columns -->
                <div class="col-lg-4">




                    <!-- Website Traffic -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body pb-0">
                            <h5 class="card-title">Website Traffic <span>| Today</span></h5>
                            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            let chart = echarts.init(document.querySelector("#trafficChart"));

                            fetch("{{ route('admin.getWebsiteTraffic') }}")
                                .then(response => response.json())
                                .then(data => {
                                    chart.setOption({
                                        tooltip: {
                                            trigger: 'item'
                                        },
                                        legend: {
                                            top: '5%',
                                            left: 'center'
                                        },
                                        series: [{
                                            name: 'Access From',
                                            type: 'pie',
                                            radius: ['40%', '70%'],
                                            avoidLabelOverlap: false,
                                            label: {
                                                show: false,
                                                position: 'center'
                                            },
                                            emphasis: {
                                                label: {
                                                    show: true,
                                                    fontSize: '18',
                                                    fontWeight: 'bold'
                                                }
                                            },
                                            labelLine: {
                                                show: false
                                            },
                                            data: data
                                        }]
                                    });
                                })
                                .catch(error => console.error('Error fetching traffic data:', error));
                        });
                    </script>



                </div><!-- End Right side columns -->

            </div>
        </section>

    </main><!-- End #main -->
@endsection
