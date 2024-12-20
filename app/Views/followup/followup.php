<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>





<div class="container">
    <div class="page-inner">
        <div
            class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2">
            <div>
                <h3 class="fw-bold mb-3">FollowUp</h3>
                <h6 class="op-7 ">FollowUp > Add > Detail</h6>
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
                                class="w-75  m-auto p-4" action="" method=""
                                enctype="multipart/form-data">
                                <h2 class="text-center">Add FollowUp Details</h2>
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
                                                                        <div class="form-group">
                                                                            <label class="form-label fs-5">Customer Name</label>

                                                                            <div class="input-icon">
                                                                                <span class="input-icon-addon">
                                                                                    <i class="fa fa-user text-muted"></i>
                                                                                </span>
<input type="hidden" id="id" name="id">
                                                                                <select
                                                                                    class="form-select ps-5 border border-1"
                                                                                    id="customer_id" name="customer_id">
                                                                                    <option selected disabled>Select Customer</option>


                                                                                    <?php foreach ($customers as $customer) : ?>
                                                                                        <option value="<?= $customer['id'] ?>"><?= $customer['first_name'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <span class="text-danger" id="customer_idError"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label fs-5">Project</label>
                                                                            <div class="input-icon position-relative">
                                                                                <span class="input-icon-addon position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%);">
                                                                                    <i class="fas fa-copy text-muted"></i>
                                                                                </span>
                                                                                <select class="form-select ps-5 border border-1" id="project_id" name="project_id">
                                                                                    <option selected disabled>Select Project</option>


                                                                                    <?php foreach ($projects as $project) : ?>
                                                                                        <option value="<?= $project['id'] ?>"><?= $project['project_name'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <span class="text-danger" id="project_idError"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="row">
                                                                            <div class="col-md-6 mb-4">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label fs-5">Description</label>
                                                                                        <div class="input-icon">
                                                                                            <span class="input-icon-addon">
                                                                                                <i class="fas fa-copy text-muted"></i>
                                                                                            </span>
                                                                                            <textarea class="form-control border border-1" id="comment" rows="3" placeholder="Enter your description here..."></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                            <div class="col-md-6 mb-4">
                                                                            <div class="form-group">
                                                                                        <label class="form-label fs-5">Message</label>
                                                                                        <div class="input-icon">
                                                                                            <span class="input-icon-addon">
                                                                                                <i class="fas fa-copy text-muted"></i>
                                                                                            </span>
                                                                                            <textarea class="form-control border border-1" id="comment" rows="3" placeholder="Enter your Message here..."></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                            </div>-->
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label fs-5">FollowUp Date</label>
                                                                            <input
                                                                                type="date"
                                                                                class="form-control border border-1"
                                                                                id="followup_date"
                                                                                placeholder="Enter Input" name="followup_date" />
                                                                        </div>
                                                                        <span class="text-danger" id="followup_dateError"></span>
                                                                    </div>
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label fs-5">Status</label>
                                                                            <div class="input-icon position-relative">
                                                                                <span class="input-icon-addon position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%);">
                                                                                    <i class="fas fa-id-badge text-muted"></i>
                                                                                </span>
                                                                                <select
                                                                                    class="form-select ps-5 border border-1"
                                                                                    id="status" name="status">
                                                                                    <option value="">Choose Status...</option>
                                                                                    <option value="pending">pending</option>
                                                                                    <option value="completed">completed</option>

                                                                                </select>
                                                                            </div>
                                                                            <span class="text-danger" id="statusError"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>








                                                                <div class="form-group">
                                                                    <label class="form-label fs-5">Message</label>
                                                                    <div class="input-icon">
                                                                        <span class="input-icon-addon">
                                                                            <i class="fas fa-copy text-muted"></i>
                                                                        </span>
                                                                        <textarea class="form-control border border-1" id="message" rows="3" placeholder="Enter your Message here..." name="message"></textarea>
                                                                    </div>
                                                                    <span class="text-danger" id="messageError"></span>
                                                                </div>













                                                                <!-- <div id="responseMessage"></div> -->
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

    <!-- end footer -->
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
                url: `<?= base_url('/followup/fetchfollowup/') ?>${id}`,
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
            $("#customer_id").val(data.customer_id);
            $("#project_id").val(data.project_id);
            $("#followup_date").val(data.followup_date);
            $("#message").val(data.message);
            $("#status").val(data.status);
           }

        function getQueryParameter(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        $("#validationform").on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const formAction = id ? 'update' : 'insert';

            $(".text-danger").html("");

            $.ajax({
                url: `<?= base_url('followup/') ?>${formAction}`,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success')  {
                        $("#responseMessage").html('<p class="text-success">' + response.message + '<a href="<?= base_url('/followup/view') ?>">View</a>' + '</p>');
                        $("#validationform")[0].reset();
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