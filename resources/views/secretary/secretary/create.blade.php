@extends('layouts.index')
@section('content')
    <title>Add Farmers</title>

    <div class="col-12 mb-2 d-flex justify-content-end">
        <button type="reset" class="btn btn-success" id="backBtn">Back</button>
    </div>
    <script>
        document.getElementById("backBtn").onclick = function() {
            // Go back to the previous page
            window.history.back();
        };
    </script>

    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <form action="{{ url('store') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-center mt-3">
                                    <h5
                                        style="font-family:'Times New Roman', Times, serif; font-weight: bold; font-size: 30px; color: black;">
                                        BALAOAN FARMERS REGISTRY</h5>
                                </div>
                                <div class="col-md-6 position-relative mt-5">
                                    <div class="d-flex align-items-center">
                                        <label for="referenceNo" class="mr-2">Reference/Control No.: </label>
                                        <div class="flex-grow-1">
                                            <input type="text" class="form-control" maxlength="15" id="referenceNo"
                                                id="validationDefault01" name="ref_no" required>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-md-6 position-relative mt-3">
                                    <label class="form-label">Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" aria-label="Default select example"
                                            id="validationTooltip03" name="status" required>
                                            <option value="" selected disabled>Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                        <div class="invalid-tooltip">
                                            Please select a status.
                                        </div>
                                    </div>
                                </div>




                                <hr class="mt-2">
                                <p class="mt-0" style="font-weight: bold; font-size: 12px;">PART I. PERSONAL INFORMATION
                                </p>

                                <div class="col-md-6 position-relative mt-0">
                                    <label class="form-label">Surname</label>
                                    <input type="text" class="form-control" id="validationTooltip01" name="sname"
                                        required autofocus="autofocus">
                                    <div class="invalid-tooltip">
                                        The Surname field is required.
                                    </div>
                                </div>

                                <div class="col-md-6 position-relative mt-0">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="validationTooltip01" name="fname"
                                        required autofocus="autofocus">
                                    <div class="invalid-tooltip">
                                        The First Name field is required.
                                    </div>
                                </div>

                                <div class="col-md-5 position-relative mt-0">
                                    <label class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="validationTooltip01" name="mname"
                                        autofocus="autofocus">
                                    <div class="invalid-tooltip">
                                        The Middle Name field is required.
                                    </div>
                                </div>

                                <div class="col-md-3 position-relative mt-0">
                                    <label class="form-label">Extension Name</label>
                                    <input type="text" class="form-control" id="validationTooltip01" name="ename"
                                        autofocus="autofocus">
                                </div>
                                <div class="col-md-4 position-relative" style="margin-top: 35px;">
                                    <div class="form-inline">
                                        <label for="sex" class="mr-2">Sex:</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="maleOption"
                                                value="Male" required>
                                            <label class="form-check-label" for="maleOption">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="femaleOption"
                                                value="Female" required>
                                            <label class="form-check-label" for="femaleOption">Female</label>
                                        </div>
                                    </div>
                                </div>


                                <hr class="mt-2">
                                <p class="mt-0" style="font-weight:bold; font-size: 12px;">ADDRESS</p>
                                <div class="col-md-4 position-relative mt-0">
                                    <label for="Region">Region</label>
                                    <div class="form-control-custom">
                                        <input type="text"
                                            style="border-bottom:solid 1px; border-radius:0; border-top: none; border-left: none; border-right: none;"
                                            id="regions" name="regions" class="form-control" value="Region I" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4 position-relative mt-0">
                                    <label for="province">Province:</label>
                                    <div class="form-control-custom">
                                        <input type="text"
                                            style="border-bottom:solid 1px; border-radius:0; border-top: none; border-left: none; border-right: none;"
                                            id="provinces_id" name="provinces_id" class="form-control" value="La Union"
                                            readonly>
                                    </div>
                                </div>

                                <div class="col-md-4 position-relative mt-0">
                                    <label for="municipality">Municipality:</label>
                                    <div class="form-control-custom">
                                        <input type="text" id="provinces_id"
                                            style="border-bottom:solid 1px; border-radius:0; border-top: none; border-left: none; border-right: none;"
                                            name="municipalities_id" class="form-control" value="Balaoan" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4 position-relative mt-2">
                                    <label for="barangay">Barangay:</label>
                                    <select id="barangay" name="barangays_id" class="form-control" required>
                                        <option value="">Select Barangay</option>
                                        @foreach ($barangays as $barangay)
                                            <option value="{{ $barangay->id }}">{{ $barangay->barangays }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <script>
                                    // Function to fetch province and municipality based on the selected barangay
                                    function getProvinceAndMunicipality(barangay_id) {
                                        // Placeholder for fetching data based on barangay (replace with actual logic)
                                        var province_id = 1; // La Union
                                        var municipality_id = 1; // Balaoan

                                        // Set the selected province and municipality
                                        $('#province').val(province_id);
                                        $('#municipality').val(municipality_id);

                                        // Show the hidden dropdowns
                                        $('#province, #municipality').show();
                                    }

                                    // Add event listener for the barangay select dropdown
                                    $('#barangay').change(function() {
                                        var barangay_id = $(this).val();
                                        if (barangay_id !== '') {
                                            getProvinceAndMunicipality(barangay_id);
                                        }
                                    });

                                    // Add event listener for the form submission
                                    $('#dataForm').submit(function(event) {
                                        event.preventDefault(); // Prevent the default form submission

                                        var formData = $(this).serialize(); // Serialize the form data

                                        $.ajax({
                                            url: '/save-data',
                                            type: 'POST',
                                            data: formData,
                                            dataType: 'json',
                                            success: function(response) {
                                                // Handle the success response, e.g., show a success message
                                                alert(response.message);
                                            },
                                            error: function(xhr, status, error) {
                                                console.error(error);
                                                // Handle the error response if needed
                                            }
                                        });

                                        // If you still want to submit the form after the Ajax call, you can do it here
                                        // Uncomment the next line if you want to submit the form after the Ajax call
                                        // this.submit();
                                    });
                                </script>



                                <div class="col-md-4 position-relative mt-0">
                                    <label class="form-label">Street/Sitio/Purok/Subdv.</label>
                                    <input type="text" class="form-control" id="validationTooltip01" name="purok"
                                        required autofocus="autofocus">
                                    <div class="invalid-tooltip">
                                        The Street/Sitio/Purok/Subdv. field is required.
                                    </div>
                                </div>

                                <div class="col-md-4 position-relative mt-0">
                                    <label class="form-label">House/Lot/Bldg. No.</label>
                                    <input type="text" class="form-control" id="validationTooltip01" name="house"
                                        required autofocus="autofocus">
                                    <div class="invalid-tooltip">
                                        The House/Lot/Bldg. No. field is required.
                                    </div>
                                </div>

                                <hr class="mt-2">


                                <div class="col-md-6 position-relative mt-0">
                                    <label class="form-label">Contact Number</label>
                                    <input type="number" class="form-control" id="validationTooltip01" name="number"
                                        required autofocus="autofocus">
                                    <div class="invalid-tooltip">
                                        The contactnumber field is required.
                                    </div>
                                </div>

                                <div class="col-md-6 position-relative mt-0">
                                    <div class="form-group">
                                        <label for="highest_formal_education" class="mr-2">Highest Formal
                                            Education:</label>
                                        <select class="form-control" id="highest_formal_education"
                                            name="highest_formal_education_id" onchange="handleEducationSelect()">
                                            <option value="">Select Education Level</option>
                                            @foreach ($highest_formal_education as $education)
                                                <option value="{{ $education->id }}">{{ $education->education }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-tooltip">
                                            Please select at least one option for Highest Formal Education.
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function handleEducationSelect() {
                                        var selectedEducationId = document.getElementById("highest_formal_education_id").value;
                                        // Add the CSRF token to the headers
                                        var csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

                                        // Example AJAX code using fetch API
                                        fetch('/get-education', {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': csrfToken,
                                                },
                                                body: JSON.stringify({
                                                    educationId: selectedEducationId
                                                }),
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                // Handle the fetched data (update the page, display information, etc.).
                                                console.log(data);
                                            })
                                            .catch(error => {
                                                console.error('Error:', error);
                                            });
                                    }
                                </script>





                                <div class="col-md-6 position-relative mt-2">
                                    <div class="form-group">
                                        <label for="dob">Date of Birth:</label>
                                        <input type="date" class="form-control" id="dob" name="dob"
                                            required>
                                        <div class="invalid-tooltip">
                                            Please enter your date of birth.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 position-relative mt-2">
                                    <div class="form-group">
                                        <label for="pob">Place of Birth:</label>
                                        <input type="text" class="form-control" id="pob" name="pob"
                                            required>
                                        <div class="invalid-tooltip">
                                            Please enter your place of birth.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 position-relative mt-2">
                                    <div class="form-group">
                                        <label for="religion">Religion</label>
                                        <input type="text" class="form-control" id="religion" name="religion"
                                            required>
                                        <div class="invalid-tooltip">
                                            Please enter your religion.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 position-relative mt-2">
                                    <div class="form-group">
                                        <label for="pwd" class="mr-2">Person with Disability (PWD):</label>
                                        <div class="row">
                                            <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="pwdYes"
                                                        name="pwd" value="Yes" required>
                                                    <label class="form-check-label" for="pwdYes">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="pwdNo"
                                                        name="pwd" value="No" required>
                                                    <label class="form-check-label" for="pwdNo">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-tooltip">
                                            Please select if you are a Person with Disability (PWD).
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3 position-relative mt-2">
                                    <div class="form-group">
                                        <label for="4ps" class="mr-2">4Ps Beneficiary:</label>
                                        <div class="row">
                                            <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="beneficiaryYes"
                                                        name="benefits" value="Yes" required>
                                                    <label class="form-check-label" for="beneficiaryYes">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="beneficiaryNo"
                                                        name="benefits" value="No" required>
                                                    <label class="form-check-label" for="beneficiaryNo">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-tooltip">
                                            Please select whether you are a 4Ps Beneficiary or not.
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-3 position-relative">
                                        <div class="form-group">
                                            <label for="cstatus">Civil Status:</label>
                                            <select class="form-control" id="cstatus" name="civil_status_id"
                                                onchange="handleCivilStatusSelect()" required>
                                                <option value="">Select Civil Status</option>
                                                @foreach ($civilStatusOptions as $status)
                                                    <option value="{{ $status->id }}"
                                                        {{ $status->civil_status_id == $status->id ? 'selected' : '' }}>
                                                        {{ $status->status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-tooltip">
                                                Please select one option for Civil Status.
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function handleCivilStatusSelect() {
                                            var selectedStatusId = document.getElementById("civil_status_id").value;
                                            // Add the CSRF token to the headers
                                            var csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

                                            // Example AJAX code using fetch API
                                            fetch('/get-civil-status-data', {
                                                    method: 'POST',
                                                    headers: {
                                                        'Content-Type': 'application/json',
                                                        'X-CSRF-TOKEN': csrfToken,
                                                    },
                                                    body: JSON.stringify({
                                                        civilstatusId: selectedStatusId
                                                    }),
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    // Handle the fetched data (update the page, display information, etc.).
                                                    console.log(data);
                                                })
                                                .catch(error => {
                                                    console.error('Error:', error);
                                                });
                                        }
                                    </script>






                                    <div class="col-md-3 position-relative mt-2">
                                        <div class="form-group">
                                            <label for="emergency">Name of Spouse if Married:</label>
                                            <input type="text" class="form-control d-inline" id="spouse"
                                                name="spouse">
                                        </div>
                                    </div>

                                    <div class="col-md-3 position-relative mt-2">
                                        <div class="form-group">
                                            <label for="mother">Mother's Maiden Name:</label>
                                            <input type="text" class="form-control d-inline" id="mother"
                                                name="mother" required>
                                            <div class="invalid-tooltip">
                                                Please enter your mother's maiden name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 position-relative mt-2">
                                        <div class="form-group">
                                            <label for="emergency">Contact No. Incase of Emergency</label>
                                            <input type="text" class="form-control d-inline" id="emergency"
                                                name="emergency" maxlength="11" required>
                                        </div>
                                    </div>

                                </div>


                                <hr class="mt-2">
                                <p class="mt-0" style="font-weight: bold; font-size: 12px;">PART II. FARMERS
                                    PROFILE</p>

                                <div class="col-md-12 mt-0">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="livelihood" class="mr-2">Main Livelihood:</label>
                                                <div class="col-md-3 form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="livelihood"
                                                        id="farmers" required>
                                                    <label class="form-check-label" for="farmers">Farmers</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="validationCustom04" class="form-label fw-bold mt-2">For
                                                Farmers</label>
                                        </div>
                                        <p class="mt-0" style="font-size: 12px;">Types of Farming Activity</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="container">
                                            <div class="row">
                                                @foreach ($farmers as $id => $farmer)
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input crop-checkbox farmer-checkbox"
                                                                type="checkbox" value="{{ $id }}"
                                                                id="crops[{{ $id }}]"
                                                                name="crops[{{ $id }}]"
                                                                data-target="cropInputs{{ $id }}">
                                                            <label class="form-check-label"
                                                                for="farmer{{ $id }}">
                                                                {{ $farmer }}
                                                            </label>
                                                        </div>
                                                        <div class="commodity-inputs" id="cropInputs{{ $id }}">
                                                            <div class="form-group">
                                                                <label for="farmSize{{ $id }}">Farm Size</label>
                                                                <input type="text" class="form-control farm-size-input"
                                                                    id="farmSize{{ $id }}"
                                                                    name="farm_size[{{ $id }}]" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="location{{ $id }}">Location</label>
                                                                <input type="text" class="form-control location-input"
                                                                    id="location{{ $id }}"
                                                                    name="farm_location[{{ $id }}]" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="container">
                                            <div class="col-md-4 mb-3">
                                                <div class="form-check">
                                                    <label class="form-check-label mt-2"
                                                        style="margin-left: -12px; font-weight: bold;"
                                                        for="highValueCrops">High Value Crops</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                @foreach ($commodities as $id => $commodity)
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input crop-checkbox" type="checkbox"
                                                                value="{{ $id }}"
                                                                id="crops[{{ $id }}]"
                                                                name="crops[{{ $id }}]"
                                                                data-target="cropInputs{{ $id }}">
                                                            <label class="form-check-label"
                                                                for="commodity{{ $id }}">
                                                                {{ $commodity }}
                                                            </label>
                                                        </div>
                                                        <div class="commodity-inputs" id="cropInputs{{ $id }}">
                                                            <div class="form-group">
                                                                <label for="farmSize{{ $id }}">Farm Size</label>
                                                                <input type="text" class="form-control"
                                                                    id="farmSize{{ $id }}"
                                                                    name="farm_size[{{ $id }}]" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="location{{ $id }}">Location</label>
                                                                <input type="text" class="form-control"
                                                                    id="location{{ $id }}"
                                                                    name="farm_location[{{ $id }}]" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        $('.crop-checkbox').on('change', function() {
                                            var isChecked = $(this).prop('checked');
                                            var inputsContainer = $('#' + $(this).data('target'));
                                            inputsContainer.find('input').prop('disabled', !isChecked);
                                        });
                                    });
                                </script>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="container">
                                            <div class="col-md-4">
                                                <label for="validationCustom04" class="form-label fw-bold mt-2">For
                                                    Machineries</label>
                                            </div>
                                            <div class="row">
                                                @php $machineCount = 0; @endphp
                                                @foreach ($machine as $id => $machineName)
                                                    @if ($machineCount % 3 === 0)
                                            </div>
                                            <div class="row">
                                                @endif
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="machine_{{ $id }}"
                                                            name="machineries[{{ $id }}]"
                                                            value="{{ $id }}"
                                                            data-target="noofunits_{{ $id }}">
                                                        <label class="form-check-label"
                                                            for="machine_{{ $id }}">{{ $machineName }}</label>
                                                    </div>
                                                    <label for="noofunits_{{ $id }}" class="form-label">No. Of
                                                        Units:</label>
                                                    <input type="text" class="form-control units-input"
                                                        id="noofunits_{{ $id }}"
                                                        name="units[{{ $id }}]" disabled>
                                                </div>
                                                @php $machineCount++; @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        $('.form-check-input').on('change', function() {
                                            var targetInputId = $(this).data('target');
                                            var unitsInput = $('#' + targetInputId);

                                            if ($(this).prop('checked')) {
                                                unitsInput.prop('disabled', false);
                                            } else {
                                                unitsInput.prop('disabled', true);
                                            }
                                        });
                                    });
                                </script>



                                <!-- resources/views/livewire/income-form.blade.php -->
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="form-label">Gross Annual Income Last
                                            Year:</label>
                                        <div class="d-flex align-items-center">
                                            <label class="me-2">Farming</label>
                                            <input type="text" class="form-control" id="gross"
                                                id="validationCustom01" name="gross" maxlength="7" required>
                                            <label class="ms-3 me-2">Non-Farming</label>
                                            <input type="text" class="form-control" id="grosses"
                                                id="validationCustom02" name="grosses" maxlength="7" required>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide the gross annual income for both farming and non-farming.
                                        </div>
                                    </div>
                                </div>


                                <!-- resources/views/livewire/farm-parcels-form.blade.php -->
                                <div class="col-md-8 mt-3">
                                    <label class="form-label">No. of Farm Parcels</label>
                                    <input type="text" class="form-control" id="parcels" id="validationTooltip01"
                                        maxlength="15" required name="parcels">
                                    <div class="invalid-tooltip">
                                        Please provide the number of farm parcels.
                                    </div>
                                </div>



                                <!-- resources/views/livewire/agrarian-reform-form.blade.php -->
                                <div class="col-md-4 position-relative mt-4">
                                    <div class="form-group">
                                        <label for="pwd" class="mr-2">Agrarian Reform Beneficiaries:</label>
                                        <div class="row">
                                            <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="pwdYes"
                                                        name="arb" value="Yes" required>
                                                    <label class="form-check-label" for="pwdYes">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-1" style="margin-left: 10px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="pwdNo"
                                                        name="arb" value="No" required>
                                                    <label class="form-check-label" for="pwdNo">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-tooltip">
                                            Please select if you are an Agrarian Reform Beneficiary.
                                        </div>
                                    </div>
                                </div>





                                {{-- <hr class="mt-5">

                                <label class="form-check-label" for="termsCheck">
                                    <input class="form-check-input mr-2 text-center" type="checkbox" id="termsCheck"
                                        required>
                                    I hereby declare that all information indicated above is true and
                                    correct,
                                    and that they may be used by Municipal Agriculurist Office of
                                    Balaoan, La
                                    Union for the purposes of registration to the Registry System for
                                    Basic
                                    Sectors in Agriculture (RSBSA) and other legitimate interests of the
                                    Department pursuant to its mandates.
                                </label>
                                <div class="invalid-tooltip">
                                    Please accept the declaration to proceed.
                                </div>



                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <textarea class="form-control" disabled style= "height: 120px;"></textarea>
                                            </td>
                                            <td>
                                                <textarea class="form-control" disabled style="height: 120px;"></textarea>
                                            </td>
                                            <td>
                                                <textarea class="form-control" disabled style="height: 120px;"></textarea>
                                            </td>
                                            <td>
                                                <textarea class="form-control" disabled style="height: 120px;"></textarea>
                                            </td>
                                        </tr>

                                    <tfoot style="text-align: center;">
                                        <tr>
                                            <th>Date</th>
                                            <th>PRINTED NAME OF APPLICANT</th>
                                            <th>SIGNATURE OF APPLICANT</th>
                                            <th>THUMBMARK</th>
                                        </tr>
                                    </tfoot>
                                    </tbody>
                                </table> --}}


                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end p-3">
                                            <div class="button-container">
                                                <button class="btn btn-primary submit-button" name="submit">Add</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add this to your admin.farmers.create view -->
@endsection
