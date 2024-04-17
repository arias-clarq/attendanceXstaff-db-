<!-- The add User Modal -->
<div class="modal fade" id="add_acc_info" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Account Information</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Name</span>
                    <input type="text" class="form-control" placeholder="Last Name" name="lname" required>
                    <input type="text" class="form-control" placeholder="First Name" name="fname" required>
                    <input type="text" class="form-control" placeholder="Middle Name" name="mname" required>
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Email</span>
                    <input class="form-control" placeholder="Enter Email" type="email" name="email" required>
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Phone no.</span>
                    <input class="form-control" maxlength="11" placeholder="Enter Phone Number" type="phone"
                        name="phone" required>
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Age</span>
                    <input class="form-control" min="0" placeholder="Enter Age" type="number" name="age" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text fw-bold">Birthday</span>
                    <input class="form-control" type="date" name="bday" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text fw-bold">Gender</span>
                    <select name="gender" class="form-select" required>
                        <option selected disabled>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text fw-bold">Marital Status</span>
                    <select name="marital_status" class="form-select" required>
                        <option selected disabled>Select Option</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widowed">Widowed</option>
                        <option value="separated">Separated</option>
                        <option value="civil_union">Civil Union</option>
                        <option value="in_a_relationship">In a Relationship</option>
                        <option value="its_complicated">It's Complicated</option>
                    </select>
                </div>

                <!-- location -->
                <div class="row row-col-3 mb-3">
                    <div class="col">
                        <?php
                        $API_URL = 'https://psgc.gitlab.io/api/regions/';
                        $json = file_get_contents($API_URL);
                        $data = json_decode($json, true);
                        ?>
                        <label class="form-label fw-bold">Select Region:</label>
                        <select name="region" id="regionSelect" class="form-select" required
                            onchange="populateProvinces()">
                            <option value="">Select Region</option>
                            <?php
                            foreach ($data as $region) {
                                ?>
                                <option value="<?= $region['code'] ?>"><?= $region['name'] ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>

                    <div class="col mb-3">
                        <label class="form-label fw-bold">Select Province:</label>
                        <select name="province" id="provinceSelect" class="form-select" required disabled>
                            <option disabled selected>Select Region First</option>
                            <!-- Options will be populated dynamically using JavaScript -->
                        </select>
                    </div>

                    <div class="col d-flex align-items-center justify-content-center">
                        <div class="input-group" style="height: 1.4rem;">
                            <span class="input-group-text fw-bold">Zip</span>
                            <input class="form-control" placeholder="Enter zip code" type="text" name="zip" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <div class="input-group">
                        <span class="input-group-text fw-bold">School</span>
                        <input type="text" class="form-control" placeholder="Enter Elementary" name="elem" required>
                        <input type="text" class="form-control" placeholder="Enter Junior Highschool" name="jhs"
                            required>
                        <input type="text" class="form-control" placeholder="Enter Senior Highschool" name="shs"
                            required>
                        <input type="text" class="form-control" placeholder="Enter College" name="college" required>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_acc">
                    Back
                </button>
                <button type="submit" class="btn btn-success" name="add">Confirm</button>
            </div>

        </div>
    </div>
</div>

<script>
    function populateProvinces() {
        var regionCode = document.getElementById("regionSelect").value;
        var provinceSelect = document.getElementById("provinceSelect");
        provinceSelect.innerHTML = ""; // Clear previous options

        if (regionCode !== "") {
            provinceSelect.disabled = false; // Enable province selection
            // Fetch provinces based on the selected region using AJAX
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var provinces = JSON.parse(xhr.responseText);

                    if (provinces != null && provinces.length > 0) {
                        provinces.forEach(function (province) {
                            var option = document.createElement("option");
                            option.value = province['name'];
                            option.text = province['name'];
                            provinceSelect.appendChild(option);
                        });
                    } else {
                        var option = document.createElement("option");
                        option.text = "No Available Provinces";
                        provinceSelect.appendChild(option);
                    }
                }
            };
            xhr.open("GET", "https://psgc.gitlab.io/api/regions/" + regionCode + "/provinces", true);
            xhr.send();
        } else {
            provinceSelect.disabled = true; // Disable province selection if no region is selected
        }
    }
</script>