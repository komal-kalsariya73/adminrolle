<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>





<div class="container">
    <div class="page-inner">
        <div
            class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2">
            <div>
                <h3 class="fw-bold mb-3">Profile</h3>
                <h6 class="op-7">Admin-Profile-information</h6>
            </div>

        </div>



        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body p-0">
                        <!-- Profile 1 - Bootstrap Brain Component -->
                        <section class="bg-light py-3 py-md-5 py-xl-8">
                            <div class="">
                                <div class="row justify-content-md-center">
                                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                                        <h2 class=" display-5 text-center"></h2>

                                        <hr class="w-50 mx-auto  mb-xl-9 border-dark-subtle">
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <div class="row gy-4 gy-lg-0">
                                    <div class="col-12 col-lg-4 col-xl-3">
                                        <div class="row gy-4">
                                            <div class="col-12">
                                                <div class="card widget-card border-light shadow-sm">
                                                    <div class="card-header " style="background:#07193e;color:white">Welcome,</div>
                                                    <div class="card-body">
                                                        <div class="text-center mb-3" id="profileimage">

                                                        </div>
                                                        <h5 class="text-center mb-1"></h5>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="card widget-card border-light shadow-sm">
                                                    <div class="card-header" style="background:#07193e;color:white">About Me</div>
                                                    <div class="card-body">
                                                        <ul class="list-group list-group-flush mb-0">
                                                            <li class="list-group-item">
                                                                <h6 class="mb-1">
                                                                    <span class="bii bi-mortarboard-fill me-2"></span>
                                                                    Education
                                                                </h6>
                                                                <span>M.S Computer Science</span>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <h6 class="mb-1">
                                                                    <span class="bii bi-geo-alt-fill me-2"></span>
                                                                    Location
                                                                </h6>
                                                                <span>Mountain View, California</span>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <h6 class="mb-1">
                                                                    <span class="bii bi-building-fill-gear me-2"></span>
                                                                    Company
                                                                </h6>
                                                                <span>GitHub Inc</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-8 col-xl-9">
                                        <div class="card widget-card border-light shadow-sm">
                                            <div class="card-body p-4">
                                                <ul class="nav nav-tabs" id="profileTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview-tab-pane" type="button" role="tab" aria-controls="overview-tab-pane" aria-selected="true">Overview</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="editProfileBtn" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
                                                    </li>

                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-tab-pane" type="button" role="tab" aria-controls="password-tab-pane" aria-selected="false">Password</button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content pt-4" id="profileTabContent">
                                                    <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                                                        <h5 class="mb-3">About</h5>
                                                        <p class="lead mb-3">Ethan Leo is a seasoned and results-driven Project Manager who brings experience and expertise to project management. With a proven track record of successfully delivering complex projects on time and within budget, Ethan Leo is the go-to professional for organizations seeking efficient and effective project leadership.</p>
                                                        <h5 class="mb-3">Profile</h5>
                                                        <div id="profileInfo">
                                                            <!-- <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                                            <div class="p-2">First Name</div>

                                                                        </div>
                                                                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                                            <div class="p-2"></div>

                                                                        </div>
                                                                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                                            <div class="p-2">Last Name</div>
                                                                        </div>
                                                                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                                            <div class="p-2"></div>
                                                                        </div>
                                                                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                                            <div class="p-2">Gender</div>
                                                                        </div>
                                                                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                                            <div class="p-2"></div>
                                                                        </div>


                                                                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                                            <div class="p-2">Address</div>
                                                                        </div>
                                                                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                                            <div class="p-2"></div>
                                                                        </div>
                                                                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                                            <div class="p-2">City</div>
                                                                        </div>
                                                                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                                            <div class="p-2"></div>
                                                                        </div>

                                                                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                                            <div class="p-2">Phone</div>
                                                                        </div>
                                                                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                                            <div class="p-2"></div>
                                                                        </div>
                                                                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                                            <div class="p-2">Email</div>
                                                                        </div>
                                                                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                                            <div class="p-2"></div>
                                                                        </div> -->
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                                        <form action="" class="row gy-3 gy-xxl-4" id="updateProfile" method="POST" data-action="<?= site_url('profile/update'); ?>">
                                                            <div class="col-12">
                                                                <div class="row gy-2">
                                                                    <input type="hidden" name="id" value="" />
                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-md-6">
                                                                <label for="inputFirstName" class="form-label">First Name</label>
                                                                <input type="text" class="form-control" id="name" name="name" value="<?= $userInfo['name'] ?? '' ?>"> <!-- Use $userInfo -->
                                                                <span id="demo1" class="error-message" style="color:red"></span>
                                                            </div>

                                                            <div class="col-12 col-md-6">
                                                                <label for="inputPhone" class="form-label">Phone</label>
                                                                <input type="number" class="form-control" id="phone" name="phone" value="<?= $userInfo['phone'] ?? '' ?>"> <!-- Use $userInfo -->
                                                                <span id="demo3" class="error-message" style="color:red"></span>
                                                            </div>

                                                            <div class="col-12 col-md-6">
                                                                <label for="inputEmail" class="form-label">Email</label>
                                                                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?? '' ?>"> <!-- Use $user -->
                                                                <span id="demo4" class="error-message" style="color:red"></span>
                                                            </div>

                                                            <div class="col-12 col-md-6">
                                                                <label for="inputAddress" class="form-label">Address</label>
                                                                <input type="text" class="form-control" id="address" name="address" value="<?= $userInfo['address'] ?? '' ?>"> <!-- Use $userInfo -->
                                                                <span id="demo5" class="error-message" style="color:red"></span>
                                                            </div>





                                                            <div class="col-12 col-md-6">
                                                                <label for="inputProfileImage" class="form-label">Profile Image</label>
                                                                <input type="file" class="form-control" id="image" name="profile_image" />
                                                                <!-- <small>Current Image:</small><br> -->
                                                                <!-- <img id="profileImagePreview" src="<?= base_url('uploads/' . ($userInfo['image'] ?? 'default-avatar.jpg')); ?>" alt="Profile Image" style="width: 100px; height: 100px;"> -->
                                                                <span id="demo8" class="error-message" style="color:red"></span>
                                                            </div>
                                                            <div class="col-12">
                                                                <button type="submit" class="btn" style="background:#07193e;color:white" id="submitProfile">Save Changes</button>
                                                                <div id="responseMessage"></div>
                                                            </div>
                                                        </form>

                                                    </div>

                                                    <div class="tab-pane fade" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab" tabindex="0">
                                                    <form id="changePasswordForm">
        <div class="form-group">
            <label for="currentPassword">Current Password</label>
            <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
        </div>
        <div class="form-group">
            <label for="newPassword">New Password</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
        </div>
        <div id="responseMessages"></div>
        <button type="submit" class="btn btn-primary">Change Password</button>
    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Function to fetch and display user profile data
    function fetchUserProfile() {
        $.ajax({
            url: "<?= base_url('/admin/fetchUserProfile'); ?>",
            method: 'GET',
            success: function(data) {
                if (data.user && data.userInfo) {
                    $('#profileInfo').html(`
                        <p>Name: ${data.userInfo.name}</p>
                        <p>Address: ${data.userInfo.address}</p>
                        <p>Email: ${data.user.email}</p>
                        <p>Role: ${data.user.role == 1 ? 'Admin' : 'Staff'}</p>
                        <p>Phone: ${data.userInfo.phone || 'N/A'}</p>
                        <p>City: ${data.userInfo.city || 'N/A'}</p>
                    `);
                    $('#profileimage').html(`
                        <div>
                            <img id="profile-image" src="${data.image}" alt="Profile Image" class="rounded-circle" width="180">
                        </div>
                    `);
                } else {
                    alert('Failed to fetch user profile.');
                }
            },
            error: function() {
                alert('Error fetching profile data');
            }
        });
    }

    $(document).ready(function() {
        
     
   fetchUserProfile();
        
        $("#editProfileBtn").click(function() {
            $.ajax({
                url: "<?= site_url('admin/editProfile'); ?>", // Ensure this matches the route
                type: "GET",
                dataType: "json",
                success: function(response) {
                    if (response.user && response.userInfo) {
                        $("#user_id").val(response.user.id);
                        $("#name").val(response.userInfo.name);
                        $("#email").val(response.user.email);
                        $("#phone").val(response.userInfo.phone);
                        $("#address").val(response.userInfo.address);
                     
                    } else {
                        alert('Failed to fetch user data for editing.');
                    }
                    
                },
                error: function() {
                    alert("Unable to fetch profile data.");
                }
            });
        });

        // Handle profile update via AJAX
        $("#updateProfile").submit(function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            $.ajax({
                url: "<?= site_url('admin/update'); ?>",
                type: "POST",
                data: formData,
                processData: false, 
                contentType: false, 
                dataType: "json",
                success: function(response) {
                    if (response.status === "success") {
                        alert(response.message);

                        
                        $('#overview-tab').tab('show');
            
                        fetchUserProfile();

                        
                        if (response.imagePath) {
                            $("#profileImagePreview").attr("src", response.imagePath);
                        }
                    } else if (response.errors) {
                        
                        for (const [field, error] of Object.entries(response.errors)) {
                            $(`#demo${field}`).text(error);
                        }
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert("An error occurred. Please try again.");
                }
            });
        });

        $("#changePasswordForm").submit(function(e) {
        e.preventDefault();

        // Get form data
        var formData = $(this).serialize();

        $.ajax({
            url: "<?= site_url('AdminController/changepassword'); ?>",
            type: "POST",
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#responseMessages').html('<p class="text-success">' + response.message + '</p>');
                } else {
                    $('#responseMessages').html('<p class="text-danger">' + response.message + '</p>');
                }
            },
            error: function() {
                $('#responseMessages').html('<p class="text-danger">An error occurred. Please try again.</p>');
            }
        });
    });
    });
</script>

<?= $this->endSection(); ?>