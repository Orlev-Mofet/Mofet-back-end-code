@extends('admin.layouts.master')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/inter-ui/3.19.3/inter.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.4.0/ol.css">

@endsection
@section('content')

<div class="flex flex-col grid grid-cols-1 sm:grid-cols-6 gap-x-6 gap-y-6">

    <div class="sm:col-span-6 grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
              <!-- Card Item Start -->
              <div class="shadow-lg border border-gray-20 py-6 px-7">
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-400 bg-opacity-50">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                  </svg>
                  
                </div>

                <div class="mt-4 flex items-end justify-between">
                  <div>
                    <h4 class="text-2xl font-bold text-black dark:text-white">
                      {{ $users_count }}
                    </h4>
                    <span class="">Number of users</span>
                  </div>

                  <span class="flex items-center gap-1 text-green-500">
                    {{-- 0.43% --}}
                    <svg class="fill-meta-3" width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.35716 2.47737L0.908974 5.82987L5.0443e-07 4.94612L5 0.0848689L10 4.94612L9.09103 5.82987L5.64284 2.47737L5.64284 10.0849L4.35716 10.0849L4.35716 2.47737Z" fill=""></path>
                    </svg>
                  </span>
                </div>
              </div>
              <!-- Card Item End -->

              <!-- Card Item Start -->
              <div class="shadow-lg border border-gray-20 py-6 px-7">
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-400 bg-opacity-50">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                  </svg>
                </div>

                <div class="mt-4 flex items-end justify-between">
                  <div>
                    <h4 class="text-2xl font-bold text-black dark:text-white">
                      {{ $questions_count }}
                    </h4>
                    <span class="">Number of questions</span>
                  </div>

                  <span class="flex items-center gap-1 text-green-500">
                    {{-- 4.35% --}}
                    <svg class="fill-meta-3" width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.35716 2.47737L0.908974 5.82987L5.0443e-07 4.94612L5 0.0848689L10 4.94612L9.09103 5.82987L5.64284 2.47737L5.64284 10.0849L4.35716 10.0849L4.35716 2.47737Z" fill=""></path>
                    </svg>
                  </span>
                </div>
              </div>
              <!-- Card Item End -->

              <!-- Card Item Start -->
              <div class="shadow-lg border border-gray-20 py-6 px-7">
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-400 bg-opacity-50">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                  </svg>
                  
                </div>

                <div class="mt-4 flex items-end justify-between">
                  <div>
                    <h4 class="text-2xl font-bold text-black dark:text-white">
                      {{ $answers_count }}
                    </h4>
                    <span class="">Number of answers</span>
                  </div>

                  <span class="flex items-center gap-1 text-green-500">
                    {{-- 2.59% --}}
                    <svg class="fill-meta-3" width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.35716 2.47737L0.908974 5.82987L5.0443e-07 4.94612L5 0.0848689L10 4.94612L9.09103 5.82987L5.64284 2.47737L5.64284 10.0849L4.35716 10.0849L4.35716 2.47737Z" fill=""></path>
                    </svg>
                  </span>
                </div>
              </div>
              <!-- Card Item End -->

              <!-- Card Item Start -->
              <div class="shadow-lg border border-gray-20 py-6 px-7">
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-400 bg-opacity-50">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                  </svg>
                  
                </div>

                <div class="mt-4 flex items-end justify-between">
                  <div>
                    <h4 class="text-2xl font-bold text-black dark:text-white">
                      {{ $abused_questions_count }}
                    </h4>
                    <span class="">Number of abused questions</span>
                  </div>

                  <span class="flex items-center gap-1 text-blue-500">
                    {{-- 0.95% --}}
                    <svg class="fill-meta-5" width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.64284 7.69237L9.09102 4.33987L10 5.22362L5 10.0849L-8.98488e-07 5.22362L0.908973 4.33987L4.35716 7.69237L4.35716 0.0848701L5.64284 0.0848704L5.64284 7.69237Z" fill=""></path>
                    </svg>
                  </span>
                </div>
              </div>
              <!-- Card Item End -->
            </div>



    <!-- chat part -->
    {{-- <div class="sm:col-span-3 flex flex-col col-span-full bg-white shadow-lg border border-gray-200">
        <header class="px-5 py-4 border-b border-gray-100 flex items-center">
            <h2 class="font-semibold text-gray-800">Analytics</h2>
        </header>
        <div class="px-5 py-1">
            <div class="flex flex-wrap">
                <!-- Unique Visitors -->
                <div class="flex items-center py-2">
                    <div class="mr-5">
                        <div class="flex items-center">
                            <div class="text-3xl font-bold text-gray-800 mr-2">24.7K</div>
                            <div class="text-sm font-medium text-green-500">+49%</div>
                        </div>
                        <div class="text-sm text-gray-500">Unique Visitors</div>
                    </div>
                    <div class="hidden md:block w-px h-8 bg-gray-200 mr-5" aria-hidden="true"></div>
                </div>
                <!-- Total Pageviews -->
                <div class="flex items-center py-2">
                    <div class="mr-5">
                        <div class="flex items-center">
                            <div class="text-3xl font-bold text-gray-800 mr-2">56.9K</div>
                            <div class="text-sm font-medium text-green-500">+7%</div>
                        </div>
                        <div class="text-sm text-gray-500">Total Pageviews</div>
                    </div>
                    <div class="hidden md:block w-px h-8 bg-gray-200 mr-5" aria-hidden="true"></div>
                </div>
                <!-- Bounce Rate -->
                <div class="flex items-center py-2">
                    <div class="mr-5">
                        <div class="flex items-center">
                            <div class="text-3xl font-bold text-gray-800 mr-2">54%</div>
                            <div class="text-sm font-medium text-yellow-500">-7%</div>
                        </div>
                        <div class="text-sm text-gray-500">Bounce Rate</div>
                    </div>
                    <div class="hidden md:block w-px h-8 bg-gray-200 mr-5" aria-hidden="true"></div>
                </div>
                <!-- Visit Duration-->
                <div class="flex items-center">
                    <div>
                        <div class="flex items-center">
                            <div class="text-3xl font-bold text-gray-800 mr-2">2m 56s</div>
                            <div class="text-sm font-medium text-yellow-500">+7%</div>
                        </div>
                        <div class="text-sm text-gray-500">Visit Duration</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Chart built with Chart.js 3 -->
        <div class="flex-grow">
            <canvas id="analytics-card-01" width="800" height="300"></canvas>
        </div>
    </div> --}}


    <!-- map pard -->
    {{-- <div class="sm:col-span-3 flex flex-col col-span-full bg-white shadow-lg border border-gray-200">
        <header class="px-5 py-4 border-b border-gray-100 flex items-center">
            <h2 class="font-semibold text-gray-800">Map - Customers</h2>
        </header>
        <div class="flex-grow p-4">
            <div id="map-canvas" class="h-full"></div>
        </div>
    </div> --}}
</div>


@endsection

@section('script')
{{-- <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-adapter-moment/1.0.0/chartjs-adapter-moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.5.2/cdn.js"></script>

<script src="https://cdn.jsdelivr.net/npm/ol@v7.4.0/dist/ol.js"></script> --}}

<script>
    // // Helper function to display thousands in K format
    // const formatThousands = (value) => Intl.NumberFormat('en-US', {
    //     maximumSignificantDigits: 3,
    //     notation: 'compact',
    // }).format(value);

    // // Define Chart.js default settings
    // Chart.defaults.font.family = '"Inter", sans-serif';
    // Chart.defaults.font.weight = '500';
    // Chart.defaults.color = 'rgb(148, 163, 184)';
    // Chart.defaults.scale.grid.color = 'rgb(241, 245, 249)';
    // Chart.defaults.plugins.tooltip.titleColor = 'rgb(30, 41, 59)';
    // Chart.defaults.plugins.tooltip.bodyColor = 'rgb(30, 41, 59)';
    // Chart.defaults.plugins.tooltip.backgroundColor = '#FFF';
    // Chart.defaults.plugins.tooltip.borderWidth = 1;
    // Chart.defaults.plugins.tooltip.borderColor = 'rgb(226, 232, 240)';
    // Chart.defaults.plugins.tooltip.displayColors = false;
    // Chart.defaults.plugins.tooltip.mode = 'nearest';
    // Chart.defaults.plugins.tooltip.intersect = false;
    // Chart.defaults.plugins.tooltip.position = 'nearest';
    // Chart.defaults.plugins.tooltip.caretSize = 0;
    // Chart.defaults.plugins.tooltip.caretPadding = 20;
    // Chart.defaults.plugins.tooltip.cornerRadius = 4;
    // Chart.defaults.plugins.tooltip.padding = 8;

    // // A chart built with Chart.js 3
    // // https://www.chartjs.org/
    // const ctx = document.getElementById('analytics-card-01');
    // const chart = new Chart(ctx, {
    //     type: 'line',
    //     data: {
    //         labels: [
    //         '12-01-2020', '01-01-2021', '02-01-2021',
    //         '03-01-2021', '04-01-2021', '05-01-2021',
    //         '06-01-2021', '07-01-2021', '08-01-2021',
    //         '09-01-2021', '10-01-2021', '11-01-2021',
    //         '12-01-2021', '01-01-2022', '02-01-2022',
    //         '03-01-2022', '04-01-2022', '05-01-2022',
    //         '06-01-2022', '07-01-2022', '08-01-2022',
    //         '09-01-2022', '10-01-2022', '11-01-2022',
    //         '12-01-2022', '01-01-2023',
    //         ],
    //         datasets: [
    //         // Indigo line
    //         {
    //             label: 'Current',
    //             data: [
    //             5000, 8700, 7500, 12000, 11000, 9500, 10500,
    //             10000, 15000, 9000, 10000, 7000, 22000, 7200,
    //             9800, 9000, 10000, 8000, 15000, 12000, 11000,
    //             13000, 11000, 15000, 17000, 18000,
    //             ],
    //             fill: true,
    //             backgroundColor: 'rgba(59, 130, 246, 0.08)',
    //             borderColor: 'rgb(99, 102, 241)',
    //             borderWidth: 2,
    //             tension: 0,
    //             pointRadius: 0,
    //             pointHoverRadius: 3,
    //             pointBackgroundColor: 'rgb(99, 102, 241)',
    //         },
    //         // Gray line
    //         {
    //             label: 'Previous',
    //             data: [
    //             8000, 5000, 6500, 5000, 6500, 12000, 8000,
    //             9000, 8000, 8000, 12500, 10000, 10000, 12000,
    //             11000, 16000, 12000, 10000, 10000, 14000, 9000,
    //             10000, 15000, 12500, 14000, 11000,
    //             ],
    //             borderColor: 'rgb(203, 213, 225)',
    //             fill: false,
    //             borderWidth: 2,
    //             tension: 0,
    //             pointRadius: 0,
    //             pointHoverRadius: 3,
    //             pointBackgroundColor: 'rgb(203, 213, 225)',
    //         },
    //         ],
    //     },
    //     options: {
    //         layout: {
    //         padding: 20,
    //         },
    //         scales: {
    //         y: {
    //             beginAtZero: true,
    //             grid: {
    //             drawBorder: false,
    //             },
    //             ticks: {
    //             callback: (value) => formatThousands(value),
    //             },
    //         },
    //         x: {
    //             type: 'time',
    //             time: {
    //             parser: 'MM-DD-YYYY',
    //             unit: 'month',
    //             displayFormats: {
    //                 month: 'MMM YY',
    //             },
    //             },
    //             grid: {
    //             display: false,
    //             drawBorder: false,
    //             },
    //             ticks: {
    //             autoSkipPadding: 48,
    //             maxRotation: 0,
    //             },
    //         },
    //         },
    //         plugins: {
    //         legend: {
    //             display: false,
    //         },
    //         tooltip: {
    //             callbacks: {
    //             title: () => false, // Disable tooltip title
    //             label: (context) => formatThousands(context.parsed.y),
    //             },
    //         },
    //         },
    //         interaction: {
    //         intersect: false,
    //         mode: 'nearest',
    //         },
    //         maintainAspectRatio: false,
    //     },
    // });


    // open street map
    // const customers = [];

    // var map;



    // if(customers.length > 0){
    //     var baseMapLayer = new ol.layer.Tile({
    //         source: new ol.source.OSM()
    //     });
    //     map = new ol.Map({
    //         target: 'map-canvas',
    //         layers: [baseMapLayer],
    //         view: new ol.View({
    //             center: [0, 0],
    //             zoom: 10
    //         })
    //     });
    //     var markers = [];

    //     for (var cus of customers) {

    //         markers.push(new ol.Feature({
    //             geometry: new ol.geom.Point(
    //                 ol.proj.fromLonLat([cus.longitude, cus.latitude])
    //             ),
    //             name: cus.first_name
    //         }));
    //     }


    //     var iconStyle = new ol.style.Style({
    //         image: new ol.style.Icon({
    //             anchor: [0.45, 0.82],
    //             scale: 0.12,
    //             src: '../../assets/img/marker.png',
    //             opacity: 1,
    //         })
    //     });

    //     var labelStyle = new ol.style.Style({
    //         text: new ol.style.Text({
    //             font: '16px Calibri,sans-serif',
    //             overflow: true,
    //             fill: new ol.style.Fill({
    //                 color: '#fff'
    //             }),
    //             stroke: new ol.style.Stroke({
    //                 color: '#000',
    //                 width: 3
    //             }),
    //             textBaseline: 'bottom',
    //             offsetY: 0,
    //         })
    //     });

    //     var vectorSource = new ol.source.Vector({
    //         features: markers
    //     });
    //     var markerVectorLayer = new ol.layer.Vector({
    //         source: vectorSource,
    //         style: function(feature) {
    //             var name = feature.get('name');
    //             labelStyle.getText().setText(name);
    //             return [iconStyle];
    //         }
    //     });
    //     map.addLayer(markerVectorLayer);
    //     if(customers.length > 1) map.getView().fit(vectorSource.getExtent(), map.getSize());
    //     else map.getView().setCenter(ol.proj.fromLonLat([customers[0]['longitude'], customers[0]['latitude']]));

    // } else {

    //     let longitude = 53;
    //     let latitude = -2;
    //     let name = "Somewhere";

    //     const map = new ol.Map({
    //         target: 'map-canvas',
    //         layers: [
    //             new ol.layer.Tile({
    //                 source: new ol.source.OSM(),
    //             }),
    //         ],
    //         view: new ol.View({
    //             center: ol.proj.fromLonLat([longitude, latitude]),
    //             zoom: 6
    //         })
    //     });
    // }
</script>
@endsection
