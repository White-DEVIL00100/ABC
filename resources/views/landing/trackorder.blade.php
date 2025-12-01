@extends('layouts.landing')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('content')
    <style>
        .modal-backdrop.show {
            display: none !important;
        }
    </style>
    <style>
        .modal-fullscreen .modal-content {
            transition: transform 0.3s ease-in-out;
            margin-top: 2rem;
            max-height: 90%
        }

        .modal.fade .modal-dialog {
            transform: translateY(50px);
        }

        .modal.show .modal-dialog {
            transform: translateY(0);
        }

        .modal-title {
            font-size: 1.5rem;
            letter-spacing: 0.5px;
        }

        .btn-secondary {
            transition: background-color 0.2s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        #map {
            background: #e9ecef;
            width: 100%;
        }
    </style>
    <!--Start Banner Two-->
    <section class="banner-two">
        <div class="banner-two__img1 float-bob-y">
            <div class="inner">
                <img src="{{ asset('assets/images/banner/banner-v2-img1.jpg') }}" alt="">
            </div>
        </div>
        <div class="banner-two__img2 float-bob-x"><img src="{{ asset('assets/images/banner/banner-v2-img2.png') }}"
                alt=""></div>
        <div class="shape1 float-bob-y"><img src="{{ asset('assets/images/shapes/banner-v2-shape1.png') }}" alt="">
        </div>
        <div class="shape2"><img src="{{ asset('assets/images/shapes/banner-v2-shape2.png') }}" alt=""></div>
        <div class="container clearfix">
            <div class="banner-two__content">
                <div class="banner-two__content-top wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="title-box">
                        <h2>EXPERT TRANSPORTATION <br> <span>SALUTATION</span></h2>
                    </div>
                </div>

                <div class="banner-two__content-bottom wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="text-box">
                        <p>If you have a parcel and want to know its latest update, check below with the correct category.
                        </p>
                    </div>

                    <div class="banner-two__tab-box tabs-box">
                        <ul class="tab-buttons clearfix list-unstyled">
                            <li data-tab="#air" class="tab-btn active-btn">
                                <p>Find Your Order</p>
                            </li>

                        </ul>

                        <div class="tabs-content">

                            <!-- Container -->
                            <div class="tab active-tab" id="air">
                                <div class="banner-two__tab-form-box">
                                    <form class="search-form" data-type="container_number">
                                        <div class="banner-two__tab-form-input-box">
                                            <input type="text" placeholder="Enter Job Number" name="job_number"
                                                id="job_number">
                                            <input type="text" placeholder="Enter Container Number"
                                                name="container_number" id="container_number">

                                            <button id="fetchData" type="button"
                                                class="myBtn banner-two__tab-form-btn"><span
                                                    class="icon-search"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>



            </div>
        </div>
        <div class="modal fade my-5" id="update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="update" aria-hidden="true">
            <div class="modal-dialog modal-lg my-5">
                <div class="modal-content shadow-lg" style="border: none; border-radius: 0; background: linear-gradient(145deg, #ffffff, #f8f9fa);">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold text-dark" id="staticBackdropLabel">Track Your Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="Content_here">
                        <div class="card rounded-3">
                            <div class="card-body">
                                <div class="row">
                                  	<div class="col-4">
                                      	<div class="card">
                                          	<div class="card-body">
                                                <div id="info"></div>
                                          	</div>
                                        </div>
                                    </div>
                                  	<div class="col-8">
                                      	<div id="map" style="height: 60vh; border-radius: 8px; overflow: hidden;"></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-secondary rounded-pill px-4"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDahE60X3Z0HRnyxv2DYQ9k8O5ujHsoe00"></script>

    <script>
        let map;
        let routeRenderers = [];
        let infoWindow;

        function initMap(gpsPoints) {
            const mapOptions = {
                zoom: 10,
                scrollwheel: true,
                mapTypeId: 'satellite',
                center: {
                    lat: {{ $gpsPoints[0]['lat'] ?? 0 }},
                    lng: {{ $gpsPoints[0]['lng'] ?? 0 }}
                }
            };
            map = new google.maps.Map(document.getElementById("map"), mapOptions);



            if (gpsPoints.length === 0) {
                document.getElementById("distanceInfo").innerText = "No GPS points to display.";
                return;
            }

            // Log all coordinates for debugging
            console.log("GPS Points:", gpsPoints);

            // Initialize single info window
            infoWindow = new google.maps.InfoWindow();

            // Add marker for every GPS point
            gpsPoints.forEach((point, index) => {
                const position = {
                    lat: parseFloat(point.lat),
                    lng: parseFloat(point.lng)
                };
                const marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    label: {
                        text: index === 0 ? "Start" : (index === gpsPoints.length - 1 ? "Current" :
                            `${index}`),
                        fontSize: "16px",
                        color: "#FF0000", // Red labels
                        fontWeight: "bold"
                    },
                    icon: {
                        url: index === 0 ? "http://maps.google.com/mapfiles/ms/icons/green-dot.png" :
                            index === gpsPoints.length - 1 ?
                            "http://maps.google.com/mapfiles/ms/icons/red-dot.png" : "",
                        labelOrigin: new google.maps.Point(16, 16) // Center label on 32x32 icon
                    }
                });

                // Add click listener to show created_at
                marker.addListener("click", () => {
                    infoWindow.setContent(`Time: ${point.created_at}`);
                    infoWindow.open(map, marker);
                });
            });

            // Directions service
            const directionsService = new google.maps.DirectionsService();
            let totalRouteDistance = 0;

            // Split points into segments of 27 (25 waypoints + origin + destination)
            const maxPointsPerRequest = 27;
            for (let i = 0; i < gpsPoints.length; i += maxPointsPerRequest - 1) {
                const segmentPoints = gpsPoints.slice(i, i +
                    maxPointsPerRequest);
                if (segmentPoints.length < 2) continue;
                const origin = {
                    lat: parseFloat(segmentPoints[0].lat),
                    lng: parseFloat(segmentPoints[0].lng)
                };
                const destination = {
                    lat: parseFloat(segmentPoints[segmentPoints.length - 1].lat),
                    lng: parseFloat(segmentPoints[segmentPoints.length -
                        1].lng)
                };
                const waypoints = segmentPoints.slice(1, -1).map(point => ({
                    location: {
                        lat: parseFloat(point.lat),
                        lng: parseFloat(point.lng)
                    },
                    stopover: true
                }));

                directionsService.route({
                        origin: origin,
                        destination: destination,
                        waypoints: waypoints,
                        optimizeWaypoints: false,
                        travelMode: google.maps.TravelMode.DRIVING
                    },
                    (result, status) => {
                        if (status === google.maps.DirectionsStatus.OK) {
                            const directionsRenderer = new google.maps.DirectionsRenderer({
                                map: map,
                                directions: result,
                                polylineOptions: {
                                    strokeColor: "#0000FF",
                                    strokeOpacity: 1.0,
                                    strokeWeight: 9
                                },
                                suppressMarkers: true
                            });
                            routeRenderers.push(directionsRenderer);

                            let segmentDistance = 0;
                            result.routes[0].legs.forEach(leg => {
                                segmentDistance += leg.distance.value; // Meters
                            });
                            totalRouteDistance += segmentDistance;

                        } else {
                            console.error(`Directions request for segment ${i} failed: ${status}`);
                        }
                    }
                );
            }

            // Fit map to bounds
            const bounds = new google.maps.LatLngBounds();
            gpsPoints.forEach(point => {
                bounds.extend({
                    lat: parseFloat(point.lat),
                    lng: parseFloat(point.lng)
                });
            });
            map.fitBounds(bounds);
        }
        
        function renderShipmentDetails(info) {
            return `
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Job Number:</strong> ${info.job_no}</li>
                    <li class="list-group-item"><strong>Container Number:</strong> ${info.container_number}</li>
                    <li class="list-group-item"><strong>Status:</strong> ${info.status}</li>
                    <li class="list-group-item"><strong>Driver Name:</strong> ${info.driver ?? '-'}</li>
                    <li class="list-group-item"><strong>Truck NO:</strong> ${info.truck ?? '-'}</li>
                </ul>
            `;
        }


        $(document).on('click', '#fetchData', function() {
            $('#fetchData').hide();
            const job_number = $('#job_number').val();
            const container_number = $('#container_number').val();
            let url = "{{ route('visitors.transport') }}";

            // Validate inputs to prevent empty submissions
            if (!job_number || !container_number) {
                $('#job_number').addClass('input-error');
                $('#container_number').addClass('input-error');
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please fill in both Job Number and Container Number',
                    confirmButtonText: 'OK'
                });
                $('#fetchData').show();
                return;
            }

            // Show loading screen
            $('#loading-screen').fadeIn();

            $.ajax({
                url: url,
                data: {
                    job_number: job_number,
                    container_number: container_number
                },
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        console.log('GPS Points:', response.gpsPoints);
                        initMap(response.gpsPoints);
                      	$('#info').html(renderShipmentDetails(response.info));
                        $('#update').modal('show');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message || 'credentials doesn\'t match',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(error) {
                    console.error('Error loading details:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while fetching data',
                        confirmButtonText: 'OK'
                    });
                },
                complete: function() {
                    $('#fetchData').show();
                    $('#loading-screen').fadeOut();
                }
            });
        });
    </script>
@endsection
