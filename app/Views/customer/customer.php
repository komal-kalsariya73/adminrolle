<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>





<div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Customer</h3>
                <h6 class="op-7 mb-2">Free Bootstrap 5 Admin Dashboard</h6>
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
                                        <form id="customerForm" data-parsley-validate="" novalidate=""
                                            class=" w-75  m-auto p-4" action="" method="POST"
                                            enctype="multipart/form-data">
                                            <h2 class="text-center">Add Customer Details</h2>
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
                                                                                <input type="hidden" name="id" id="id">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label fs-5">First name</label>

                                                                                        <div class="input-icon">
                                                                                            <span class="input-icon-addon">
                                                                                                <i class="fa fa-user text-muted"></i>
                                                                                            </span>
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control border border-1"
                                                                                                placeholder="Enter Your Firstname"  name="first_name" id="first_name"/>
                                                                                        </div>
                                                                                        <span class="text-danger" id="first_nameError"></span>
                                                                                    </div>
                                                                                    <!-- <span id="text1" class="error-message" style="color:red">Please enter your name</span> -->

                                                                                </div>
                                                                                <div class="col-md-6 mb-4">

                                                                                    <div class="form-group">
                                                                                        <label class="form-label fs-5">Last name</label>

                                                                                        <div class="input-icon">
                                                                                            <span class="input-icon-addon ">
                                                                                                <i class="fa fa-user text-muted"></i>
                                                                                            </span>
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control border border-1"
                                                                                                placeholder="Enter Your Lastname"  name="last_name" id="last_name"/>
                                                                                        </div>
                                                                                        <span class="text-danger" id="last_nameError"></span>
                                                                                    </div>
                                                                                    <!-- <span id="demo7" style="color: red;">Please enter email</span> -->
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
                                                                                        <span class="text-danger" id="emailError"></span>
                                                                                    </div>

                                                                                    <!-- <span id="demo" style="color: red;">Please enter email</span> -->
                                                                                </div>
                                                                                <div class="col-md-6 mb-4">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label fs-5">Address</label>

                                                                                        <div class="input-icon">
                                                                                            <span class="input-icon-addon">
                                                                                                <i class="fas fa-tint text-muted"></i>
                                                                                            </span>
                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control border border-1"
                                                                                                placeholder="Enter Your Address"  id="address" name="address"/>
                                                                                        </div>
                                                                                        <span class="text-danger" id="addressError"></span>
                                                                                    </div>

                                                                                    <!-- <span id="demo9" style="color: red;">Please enter Address</span> -->
                                                                                </div>

                                                                            </div>
                                                                            <div class="row">
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
                                                                                        placeholder="Enter Pnone Number" id="phone" name="phone" />
                                                                                </div>
                                                                                <span class="text-danger" id="phoneError"></span>
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-6 mb-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label fs-5">Company Name</label>

                                                                                <div class="input-icon">
                                                                                    <span class="input-icon-addon">
                                                                                        <i class="fas fa-eye-dropper text-muted"></i>
                                                                                    </span>
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control border border-1"
                                                                                        placeholder="Enter Company Name" name="company_name" id="company_name"/>
                                                                                </div>
                                                                                <span class="text-danger" id="company_nameError"></span>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                            <!-- <span id="demo8" style="color: red;" class="mt=0">Please enter your Number</span> -->
                                                                            <div class="d-md-flex justify-content-start align-items-center m-3">
                                                                                <label class="form-label fs-5">Gender</label>
                                                                              
                                                                                    <input type="radio" name="gender" id="gender" value="male" class="m-3 fs-4 text-light"/> Male

                                                                                       
                                                                            
                                                                              
                                                                                    <input type="radio" name="gender" id="gender" value="female" class="m-3"/> Female
                                                                                    <span class="text-danger" id="genderError"></span>        
                                                                            </div>
                                                                            <div class="row">
                                                                            <div class="col-md-6 mb-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label fs-5">Pincode</label>

                                                                                <div class="input-icon">
                                                                                    <span class="input-icon-addon">
                                                                                        <i class="fas fa-qrcode text-muted"></i>
                                                                                    </span>
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control border border-1"
                                                                                        placeholder="Pincode" name="pincode" id="pincode"/>
                                                                                </div>
                                                                                <span class="text-danger" id="pincodeError"></span>
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-6 mb-4">
                                                                            <div class="form-group">
                                                                                <label class="form-label fs-5">City</label>
                                                                                <!-- <input type="text"id="course" name="course" class="form-control form-control-lg"  placeholder="Enter Your Course"/> -->
                                                                                <select 
                                                                                    class="form-control pl-3 border border-1" id="city"
                                                                                    name="city">
                                                                                    <option selected disabled> Choose...</option>
                                                                                    <option value="Surat">Surat</option>
                                                                                    <option value="Mumbai">Mumbai</option>
                                                                                    <option value="Rajkot">Rajkot</option>
                                                                                    <option value="Mahuva">Mahuva</option>
                                                                                </select>
                                                                                <span class="text-danger" id="cityError"></span>
                                                                                <!-- <i class="fas fa-home ml-3"></i>  -->
                                                                                <!-- <span id="demo6" style="color: red;">Please
                                                            enter course</span> -->
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                            <!-- <span id="demo10" style="color: red;">Please enter Pincode</span> -->
                                                                            <div class="form-group">
                                                                                <label class="form-label fs-5">Profime Image</label>
                                                                                <input type="file" id="image" name="image"
                                                                                    accept="image/*"><br>
                                                                        </div>
                                                                        <input type="hidden" name="existing_profile_image" id="existing_profile_image" value="">
                                                                        <div id="currentProfileImage"></div>
                                                                        <span class="text-danger" id="imageError"></span>
                                                                            <!-- <div class="form-group">
                                                                                <label class="form-label fs-5">Profime Image</label>
                                                                                <input type="file" id="image" name="image"
                                                                                    accept="image/*"><br>
                                                                                 <span id="demo11" style="color: red;">Please enter image</span> 
                                                                        </div> -->
                                                                        <div id="responseMessage"></div>
                                                                        <div class="d-flex justify-content-end m-2">
                                                                            <button type="submit" data-mdb-button-init
                                                                                data-mdb-ripple-init class="btn text-uppercase"
                                                                                name="upload"
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
                                    <div id="responseMessage"></div>
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
                url: `<?= base_url('/customer/fetchCustomer/') ?>${id}`,
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
            $("#first_name").val(data.first_name);
            $("#last_name").val(data.last_name);
            $("#email").val(data.email);
            $("#phone").val(data.phone);
            $("#address").val(data.address);
            $("#pincode").val(data.pincode);
            $(`input[name="gender"][value="${data.gender}"]`).prop("checked", true);
           
            $("#city").val(data.city);
            $("#company_name").val(data.company_name);
        

            $("#existing_profile_image").val(data.image);

            if (data.image) {
                $("#currentProfileImage").html(
                    `<p>Current Image: <img src="<?= base_url() ?>${data.image}" alt="Profile Image" class="img-fluid" style="max-width: 100px;"></p>`
                );
            }
        }

        function getQueryParameter(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        $("#customerForm").on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const formAction = id ? 'update' : 'insert';

            $(".text-danger").html("");

            $.ajax({
                url: `<?= base_url('customer/')?>${formAction}`,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        $("#responseMessage").html('<p class="text-success">' + response.message + '<a href="<?= base_url('/customer/view')?>">View</a>' + '</p>');
                        $("#customerForm")[0].reset();
                    } else {
                        $.each(response.errors, function(key, value) {
                            $('#' + key + 'Error').html('<small class="text-danger">' + value + '</small>');
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