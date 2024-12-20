<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>





<div class="container">
        <div class="page-inner">
          <div
            class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
              <h3 class="fw-bold mb-3">All Project</h3>
              <h6 class="op-7 mb-2">Customer > table > information</h6>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
            <?php if (session()->get('role') == 1) : ?>

                <a href="<?= base_url('/project')?>" class="btn text-uppercase btn-round" style="background:#07193e;color:white">Add Project</a>
                <?php endif; ?>
            </div>
          </div>



          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Project Details</div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center mb-0 table-secondary table-striped" id="myTable">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="">Project name</th>

                          <th scope="">Customer Project</th>
                          <th scope="">Staff</th>
                          <th scope="">Start Date</th>
                          <th scope="">End Date</th>
                          <th scope="">Action</th>


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

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script> 

<script>
 $(document).ready(function() {
        function loadCustomers() {
            $.ajax({
                url: "<?= site_url('project/getProject'); ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var rows = '';
                    $.each(data, function(index, project) {

                        const profileImageUrl = project.image ? `<?= base_url('uploads/'); ?>${project.image}` : '<?= base_url('public/uploads/customers/default-avatar.jpg'); ?>';
                        let actionButtons = '';
                        <?php if (session()->get('role') == 1): ?>
                            actionButtons = `

                               <a href="<?= base_url('/project') ?>?id=${project.id}">
                                    <i class='align-middle me-2' data-feather='edit'></i>
                                </a>
                                <a href="javascript:void(0);" class="delete-btn" data-id="${project.id}">
                                    <i class='align-middle me-2' data-feather='trash-2'></i>
                                </a>
                            `;
                        <?php endif; ?>

                        rows += `
                        <tr id="project-${project.id}">
                              <td>${project.project_name}</td>
                            <td>${project.customer_name}</td>
                            <td>${project.user_name}</td>
                             <td>${project.start_date}</td>
                            <td>${project.end_date}</td>
                           
                            <td>
                                <a href="<?= base_url('/project/display') ?>?id=${project.id}">
                                    <i class='align-middle me-2' data-feather='eye'></i>
                                </a>
                              ${actionButtons}
                            </td>
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

        $('#myTable').on('click', '.delete-btn', function() {
            const projectId = $(this).data('id');
            if (confirm('Are you sure you want to delete this product?')) {
                $.ajax({
                    url: `<?= site_url('project/delete'); ?>/${projectId}`,
                    type: "POST",
                    success: function(response) {
                        if (response.success) {
                            $(`#project-${projectId}`).remove();
                            alert(response.message);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Error deleting record: ' + error);
                    }
                });
            }
        });
    });
</script>

    <?= $this->endSection(); ?>