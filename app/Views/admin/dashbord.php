<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>





<div class="container">
    <div class="page-inner">
        <div
            class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">Free Bootstrap 5 Admin Dashboard</h6>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <!-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                <a href="#" class="btn btn-primary btn-round">Add Customer</a> -->
            </div>
        </div>
        <?php if (session()->get('role') == 1) : ?>
            <div class="row row-card-no-pd">
                <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6><b>Total Staff</b></h6>
                                    <p class="text-muted">All Staff Value</p>
                                </div>
                                <h4 class="text-info fw-bold"><?= $totalusers; ?></h4>
                            </div>
                            <div class="progress progress-sm">
                                <div
                                    class="progress-bar bg-info w-75"
                                    role="progressbar"
                                    aria-valuenow="75"
                                    aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Change</p>
                                <p class="text-muted mb-0">75%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6><b>Total Customer</b></h6>
                                    <p class="text-muted">All Customer Value</p>
                                </div>
                                <h4 class="text-success fw-bold"><?= $totalCustomers; ?></h4>
                            </div>
                            <div class="progress progress-sm">
                                <div
                                    class="progress-bar bg-success w-25"
                                    role="progressbar"
                                    aria-valuenow="25"
                                    aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Change</p>
                                <p class="text-muted mb-0">25%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6><b>Total Project</b></h6>
                                    <p class="text-muted">All Project Amount</p>
                                </div>
                                <h4 class="text-danger fw-bold"><?= $totalprojects; ?></h4>
                            </div>
                            <div class="progress progress-sm">
                                <div
                                    class="progress-bar bg-danger w-50"
                                    role="progressbar"
                                    aria-valuenow="50"
                                    aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Change</p>
                                <p class="text-muted mb-0">50%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6><b>Total FollowUp</b></h6>
                                    <p class="text-muted">Joined New FollowUp</p>
                                </div>
                                <h4 class="text-secondary fw-bold"><?= $totalfollowups; ?></h4>
                            </div>
                            <div class="progress progress-sm">
                                <div
                                    class="progress-bar bg-secondary w-25"
                                    role="progressbar"
                                    aria-valuenow="25"
                                    aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">Change</p>
                                <p class="text-muted mb-0">25%</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif (session()->get('role') == 2) : ?>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6><b>Total Staff</b></h6>
                                        <p class="text-muted">All Staff Value</p>
                                    </div>
                                    <h4 class="text-info fw-bold"><?= $totalusers; ?></h4>
                                </div>
                                <div class="progress progress-sm">
                                    <div
                                        class="progress-bar bg-info w-75"
                                        role="progressbar"
                                        aria-valuenow="75"
                                        aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <p class="text-muted mb-0">Change</p>
                                    <p class="text-muted mb-0">75%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6><b>Total FollowUp</b></h6>
                                        <p class="text-muted">Joined New FollowUp</p>
                                    </div>
                                    <h4 class="text-secondary fw-bold"><?= $totalfollowups; ?></h4>
                                </div>
                                <div class="progress progress-sm">
                                    <div
                                        class="progress-bar bg-secondary w-25"
                                        role="progressbar"
                                        aria-valuenow="25"
                                        aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <p class="text-muted mb-0">Change</p>
                                    <p class="text-muted mb-0">25%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



        <?php endif; ?>

        <!-- <div class="row">

                            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6><b>Total Project</b></h6>
                                                <p class="text-muted">All Project Amount</p>
                                            </div>
                                            <h4 class="text-danger fw-bold"></h4>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div
                                                class="progress-bar bg-danger w-50"
                                                role="progressbar"
                                                aria-valuenow="50"
                                                aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <p class="text-muted mb-0">Change</p>
                                            <p class="text-muted mb-0">50%</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6><b>Total Followup</b></h6>
                                                <p class="text-muted">All Followup </p>
                                            </div>
                                            <h4 class="text-danger fw-bold"></h4>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div
                                                class="progress-bar bg-danger w-50"
                                                role="progressbar"
                                                aria-valuenow="50"
                                                aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <p class="text-muted mb-0">Change</p>
                                            <p class="text-muted mb-0">50%</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
         -->
        <?php if (session()->get('role') == 1) : ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Latest Customer</div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <!-- Projects table -->
                                <table class="table align-items-center mb-0 table-secondary table-striped" id="myTable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Address</th>
                                            <!-- <th scope="col">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Top Project</div>
                                    </div>
                                    <div class="card-body pb-0">
                                         <div class="d-flex">
                      <div class="avatar">
                        <img
                          src="assets/img/logoproduct.svg"
                          alt="..."
                          class="avatar-img rounded-circle"
                        />
                      </div>
                      <div class="flex-1 pt-1 ms-2">
                        <h6 class="fw-bold mb-1">CSS</h6>
                        <small class="text-muted">Cascading Style Sheets</small>
                      </div>
                      <div class="d-flex ms-auto align-items-center">
                        <h4 class="text-info fw-bold">+$17</h4>
                      </div>
                    </div> 







                                    </div>
                                </div>
                            </div> -->
            </div>

        <?php endif; ?>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Project Details</div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center mb-0 table-secondary table-striped" id="myTables">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="">Project name</th>

                                        <th scope="">Customer Project</th>
                                        <th scope="">Staff</th>
                                        <th scope="">Start Date</th>
                                        <th scope="">End Date</th>



                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- footetr -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function loadCustomers() {
            $.ajax({
                url: "<?= site_url('customer/getCustomers'); ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var rows = '';
                    $.each(data, function(index, customer) {

                        const profileImageUrl = customer.image ? `<?= base_url('uploads/'); ?>${customer.image}` : '<?= base_url('public/uploads/customers/default-avatar.jpg'); ?>';

                        rows += `
                        <tr id="customer-${customer.id}">
                            
                            <td>${customer.first_name}</td>
                            <td>${customer.email}</td>
                             <td>${customer.city}</td>
                            
                            <td>${customer.phone}</td>
                              <td>${customer.address}</td>
                           
                        </tr>`;
                    });
                    $('#myTable tbody').html(rows);
                    feather.replace();
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data: ' + error);
                }
            });
        }

        loadCustomers();

        function loadProject() {
            $.ajax({
                url: "<?= site_url('project/getProject'); ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var rows = '';
                    $.each(data, function(index, project) {

                        const profileImageUrl = project.image ? `<?= base_url('uploads/'); ?>${project.image}` : '<?= base_url('public/uploads/customers/default-avatar.jpg'); ?>';

                        rows += `
                        <tr id="project-${project.id}">
                              <td>${project.project_name}</td>
                            <td>${project.customer_name}</td>
                            <td>${project.user_name}</td>
                             <td>${project.start_date}</td>
                            <td>${project.end_date}</td>
                           
                          
                        </tr>`;
                    });
                    $('#myTables tbody').html(rows);
                    feather.replace();
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data: ' + error);
                }
            });
        }

        loadProject();

    });
</script>
<?= $this->endSection(); ?>