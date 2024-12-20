<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>



          

<div class="container">
                <div class="page-inner">
                    <div
                        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h3 class="fw-bold mb-3">Staff Information </h3>
                            <h6 class="op-7 mb-2">Staff collection of details</h6>
                        </div>
                      
                    </div>

                    <div class="container-fluid dashboard-content  ">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="">
                                    <!-- <h5 class="card-header">Add Customer Details</h5> -->
                                    <div class="card-body">
                                        <form id="validationform" data-parsley-validate="" novalidate=""
                                            class=" w-75  m-auto p-4" action="" method=""
                                            enctype="multipart/form-data">
                                            <h2 class="text-center">Add Staff Details</h2>
                                            <section class="">
                                                <div class="container">
                                                    <div class="row d-flex justify-content-center align-items-center">
                                                        <div class="col">
                                                            <div class="card card-registration">
                                                                <div class="row g-0">
                                                                    <div class="col-xl-12">
                                                                        <div class="card-body  text-black">
                                                                            <div class="row">
                                                                                <div class="col-md-6 mb-4">
                                                                                <input type="hidden" name="role" value="2">
                                                                                <input type="hidden" name="id" id="id">
                                                                                <?= csrf_field(); ?>
                                                                                    <div class="form-group">
                                                                                        <label class="form-label fs-5">First name</label>

                                                                                        <div class="input-icon">
                                                                                            <span class="input-icon-addon">
                                                                                                <i class="fa fa-user text-muted"></i>
                                                                                            </span>
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control border border-1"
                                                                                                placeholder="Enter Your Firstname"  name="name" id="name"/>
                                                                                        </div>
                                                                                        <div class="error text-danger" id="nameError"></div>
                                                                                    </div>
                                                                                   

                                                                                </div>
                                                                                <div class="col-md-6 mb-4">

                                                                                <div class="form-group">
                                                                                <label class="form-label fs-5">Phone</label>

                                                                                <div class="input-icon">
                                                                                    <span class="input-icon-addon">
                                                                                        <i class="fas fa-phone text-muted"></i>
                                                                                    </span>
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control border border-1"
                                                                                        placeholder="Enter Pnone Number" name="phone" id="phone"/>
                                                                                </div>
                                                                                <div class="error text-danger" id="phoneError"></div>
                                                                            </div>
                                                                                  
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6 mb-4">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label fs-5">Email</label>

                                                                                        <div class="input-icon">
                                                                                            <span class="input-icon-addon">
                                                                                                <i class="fas fa-tablet-alt text-muted"></i>
                                                                                            </span>
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control border border-1"
                                                                                                placeholder="Enter Your Email"  name="email" id="email"/>
                                                                                        </div>
                                                                                        <div class="error text-danger" id="emailError"></div>
                                                                                    </div>

                                                                                    
                                                                                </div>
                                                                                
                                                                                <div class="col-md-6 mb-4">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label fs-5">Password</label>

                                                                                        <div class="input-icon">
                                                                                            <span class="input-icon-addon">
                                                                                                <i class="fas fa-key text-muted"></i>
                                                                                            </span>
                                                                                            <input
                                                                                                type="password"
                                                                                                class="form-control border border-1"
                                                                                                placeholder="Enter Your Password" name="password" id="password" />
                                                                                        </div>
                                                                                        <div class="error text-danger" id="passwordError"></div>
                                                                                    </div>

                                                                                   
                                                                                </div>

                                                                            </div>
                                                                            <!-- <span id="demo8" style="color: red;" class="mt=0">Please enter your Number</span> -->
                                                                            <div class="d-md-flex justify-content-start align-items-center m-3">
                                                                                <label class="form-label fs-5">Gender</label>
                                                                              
                                                                                    <input type="radio" name="gender" id="gender" value="male" class="m-3 fs-4 text-light"/> Male

                                                                                       
                                                                            
                                                                              
                                                                                    <input type="radio" name="gender" id="gender" value="female" class="m-3"/> Female
                                                                                       
                                                                            </div>
                                                                            <div class="error text-danger" id="genderError"></div>
                                                                            <div class="row">
                                                                            <div class="col-md-6 mb-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label fs-5">City</label>

                                                                                <div class="input-icon">
                                                                                    <span class="input-icon-addon">
                                                                                        <i class="fas fa-home text-muted"></i>
                                                                                    </span>
                                                                                    <select class="form-control pl-3 border border-1" id="city"
                                                                                    name="city">
                                                                                    <option selected disabled> Choose city...</option>
                                                                                    <option value="Surat">Surat</option>
                                                                                    <option value="Mumbai">Mumbai</option>
                                                                                    <option value="London">London</option>
                                                                                    <option value="Rajkot">Rajkot</option>
                                                                                    
                                                                                </select>
                                                                                </div>
                                                                                <div class="error text-danger" id="cityError"></div>
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="form-label fs-5">Address</label>

                                                                                <div class="input-icon">
                                                                                    <span class="input-icon-addon">
                                                                                        <i class="fas fa-qrcode text-muted"></i>
                                                                                    </span>
                                                                                    <textarea
                                                                                                type="text"
                                                                                                class="form-control border border-1"
                                                                                                placeholder="Enter Your Address" name="address" id="address"></textarea>
                                                                                        </div>
                                                                                        <div class="error text-danger" id="addressError"></div>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                            
                                                                            <div class="form-group ms-4">
                                                                                <label class="form-label fs-5 me-2">Profime Image</label>
                                                                                <input type="file" id="image" name="image"
                                                                                    accept="image/*"><br>
                                                                                    <div class="error text-danger" id="imageError"></div>
                                <input type="hidden" name="existing_profile_image" id="existing_profile_image" value="">
                                <div id="currentProfileImage"></div>
                                                                             <div id="responseMessage"></div>
                                                                            </div>
                                                                        
                                                                        <div class="d-flex justify-content-end m-2">
                                                                            <button type="submit" data-mdb-button-init
                                                                                data-mdb-ripple-init class="btn text-uppercase"
                                                                                name=""
                                                                                style="background:#07193e;color:white">Submit
                                                                                </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                    </section>
                                   
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end valifation types -->
                        <!-- ============================================================== -->
                    </div>



                </div>
            </div>
            <!-- footetr -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const id = getQueryParameter('id');
        if (id) {
            fetchUserData(id);
        }

        function fetchUserData(id) {
            $.ajax({
                url: `<?= base_url('/staff/fetchUsers/') ?>${id}`,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        populateForm(response.data);
                    } else {
                        alert('Failed to fetch user data: ' + response.message);
                    }
                },
                error: function() {
                    alert('An error occurred while fetching user data.');
                }
            });
        }

        function populateForm(data) {
            $("#id").val(data.id);
            $("#name").val(data.name);
            $("#email").val(data.email);
            $(`input[name="gender"][value="${data.gender}"]`).prop("checked", true);
            $("#address").val(data.address);
            $("#city").val(data.city);
            $("#phone").val(data.phone);
            $("#existing_profile_image").val(data.image);

            if (data.image) {
                $('#currentProfileImage').html(`<img src="<?= base_url('uploads/') ?>${data.image}" alt="Profile Image" style="max-width: 100px; max-height: 200px;"/>`);
            } else {
                $('#currentProfileImage').html('<p>No image uploaded.</p>');
            }
        }


        function getQueryParameter(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        $("#validationform").on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const formAction = id ? 'update' : 'insert';

            $(".error").html("");

            $.ajax({
                url: `<?= base_url('staff/') ?>${formAction}`,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        $("#responseMessage").html('<p class="text-success">' + response.message + ' <a href="<?= base_url('/staff/view'); ?>">View</a>' + '</p>');
                    } else {
                        $.each(response.errors, function(key, value) {
                            $('#' + key + 'Error').html('<p class="text-danger">' + value + '</p>');
                        });
                    }
                },

                error: function() {
                    $("#responseMessage").html('<p class="text-danger">An error occurred while submitting the form. Please try again.</p>');
                }
            });
        });
    });
</script>   

        <?= $this->endSection(); ?>