@extends('layouts.index')
@section('content')
    @if (session()->has('message'))
        <div id="success-alert" class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div id="error-alert" class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <script>
        // Function to hide the alert after a specified number of milliseconds
        function hideAlert(alertId, delay) {
            setTimeout(function() {
                document.getElementById(alertId).style.display = 'none';
            }, delay);
        }

        // Automatically hide success alert after 3 seconds
        if (document.getElementById('success-alert')) {
            hideAlert('success-alert', 3000);
        }

        // Automatically hide error alert after 3 seconds
        if (document.getElementById('error-alert')) {
            hideAlert('error-alert', 3000);
        }
    </script>

    <div class="pagetitle">
        <h1>Farmers Data</h1>
        <nav>
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item active">Farmers Data</li> --}}
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="add-employee mb-3 mt-3">
                            <a href="{{ url('create-add') }}" class="btn btn-primary">
                                <i class="bi bi-plus"></i> Add Farmer
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" id="search" class="form-control" placeholder="Search">
                            </div>
                        </div>

                        <div class="row d-flex justify-content-end mt-3">
                            <div class="col-md-2">
                                <select id="barangayFilter" class="form-select" aria-label="Barangay Filter">
                                    <option value="">All Barangays</option>
                                    @foreach ($barangays as $barangay)
                                        <option value="{{ $barangay->id }}">{{ $barangay->barangays }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <select id="commoditiesFilter" class="form-select" aria-label="Commodities Filter">
                                    <option value="">All Commodities</option>
                                    @foreach ($commodities as $commodity)
                                        <option value="{{ $commodity->id }}">{{ $commodity->commodities }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <select name="statusFilter" id="statusFilter" class="form-select"
                                    aria-label="Status Filter">
                                    <option value="">All Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="table-responsive mt-3">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID Number</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Barangay</th>
                                        <th scope="col">Commodities</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($farmers as $farmer)
                                        <tr data-barangay="{{ $farmer->barangay->id }}"
                                            data-commodities="{{ implode(',', $farmer->crops->pluck('commodities_id')->toArray()) }}"
                                            data-status="{{ $farmer->status }}">
                                            <td>{{ $farmer->farmersNumbers?->first()?->farmersnumber ?? 'No Data' }}</td>

                                            <td>{{ $farmer->fname }} {{ $farmer->sname }}</td>
                                            <td>{{ $farmer->barangay?->barangays ?? 'No Data' }}</td>
                                            <td>
                                                @php
                                                    $commoditiesList = $farmer->crops
                                                        ->filter(function ($crop) use ($selectedCommodity) {
                                                            return $crop->commodity_id == $selectedCommodity;
                                                        })
                                                        ->map(function ($crop) {
                                                            return $crop->commodity->commodities;
                                                        })
                                                        ->implode('<br>');

                                                    if ($commoditiesList) {
                                                        echo $commoditiesList;
                                                    } else {
                                                        echo 'No Data';
                                                    }
                                                @endphp
                                            </td>
                                            <td>
                                                @if ($farmer->status === 'Active')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('farmers.show', ['id' => $farmer->id]) }}"
                                                        class="btn btn-sm btn-info" style="margin-right: 10px;">
                                                        View
                                                    </a>

                                                    <a href="{{ route('farmers.edit', ['id' => $farmer->id]) }}"
                                                        class="btn btn-sm btn-primary" style="margin-right: 10px;">
                                                        Update
                                                    </a>

                                                    <a href="{{ route('farmers.generate', ['id' => $farmer->id]) }}"
                                                        class="btn btn-sm btn-secondary">
                                                        </i> Generate
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .status-circle {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 5px;
        }

        .active {
            background-color: green;
        }

        .inactive {
            background-color: red;
        }

        .dataTables_length {
            margin-bottom: 20px;
            /* Adjust the margin as needed */
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "lengthMenu": [10, 25, 50, 100], // Set your desired entries per page values
                "pageLength": 10, // Default number of entries per page
                "pagingType": "full_numbers", // Use full pagination control
                "searching": false // Disable the search bar
            });

            // Event listener for changing the number of entries per page
            $('#showEntries').on('change', function() {
                var entriesPerPage = parseInt($(this).val());
                $('#myTable').DataTable().page.len(entriesPerPage).draw();
            });
        });
    </script>

    <script>
        // Function to filter the table based on selected filters
        function filterTable() {
            var selectedBarangayId = $('#barangayFilter').val();
            var selectedCommodityId = $('#commoditiesFilter').val();
            var selectedStatus = $('#statusFilter').val();
            var searchText = $('#search').val().toLowerCase();

            $('#myTable tbody tr').each(function() {
                var tr = $(this);
                var trBarangayId = tr.data('barangay');
                var trCommodities = tr.data('commodities');
                var trStatus = tr.data('status');
                var trText = tr.text().toLowerCase();

                var showRow = true;

                // Check if selectedBarangayId is not empty and doesn't match the row's barangay
                if (selectedBarangayId !== '' && selectedBarangayId != trBarangayId) {
                    showRow = false;
                }

                // Check if selectedCommodityId is not empty
                if (selectedCommodityId !== '') {
                    var rowCommodities = trCommodities.split(',');
                    if (!rowCommodities.includes(selectedCommodityId)) {
                        showRow = false;
                    }
                }

                // Check if selectedStatus is not empty and doesn't match the row's status
                if (selectedStatus !== '' && selectedStatus != trStatus) {
                    showRow = false;
                }

                // Check if the search text is not empty and doesn't match the row's text
                if (searchText !== '' && !trText.includes(searchText)) {
                    showRow = false;
                }

                // Show or hide the row based on the filtering result
                if (showRow) {
                    tr.show();
                } else {
                    tr.hide();
                }
            });
        }

        // Filter the table when either Barangay, Commodities, Status, or Search changes
        $('#barangayFilter, #commoditiesFilter, #statusFilter, #search').on('change keyup', function() {
            filterTable();
        });

        // Initial filter when the page loads
        filterTable();
    </script>
@endsection
