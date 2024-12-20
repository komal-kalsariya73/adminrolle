<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<div class="container">
        <div class="page-inner">
          <div
            class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
              <h3 class="fw-bold mb-3">All FollowUp</h3>
              <h6 class="op-7 mb-2">Followup > table > information</h6>
            </div>
            <div class="ms-md-auto py-2 py-md-0">

              <a href="<?= base_url('/followup')?>" class="btn text-uppercase btn-round" style="background:#07193e;color:white">Add FollowUp</a>
            </div>
          </div>



          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">FollowUp Details</div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center mb-0 table-secondary table-striped" id="myTable">
  <thead class="thead-dark">
    <tr>
      <th scope="">Customer Name</th>
      <th scope="">Project name</th>
      <th scope="">FollowUp Date</th>
      <th scope="">Action</th>
    </tr>
  </thead>
  <tbody></tbody> <!-- Ensure this is empty initially -->
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
                url: "<?= site_url('followup/getFollowup'); ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var rows = '';
                    $.each(data, function(index, followup) {

                      

                        rows += `
                        <tr id="followup-${followup.id}">
                              <td>${followup.customer_name}</td>
                            <td>${followup.project_name}</td>
                           
                             <td>${followup.followup_date}</td>
                           
                           
                            <td>
                                <a href="<?= base_url('/followup/display') ?>?id=${followup.id}">
                                    <i class='align-middle me-2' data-feather='eye'></i>
                                </a>
                                <a href="<?= base_url('/followup') ?>?id=${followup.id}">
                                    <i class='align-middle me-2' data-feather='edit'></i>
                                </a>
                                <a href="javascript:void(0);" class="delete-btn" data-id="${followup.id}">
                                    <i class='align-middle me-2' data-feather='trash-2'></i>
                                </a>
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
            const followupId = $(this).data('id');
            if (confirm('Are you sure you want to delete this product?')) {
                $.ajax({
                    url: `<?= site_url('followup/delete'); ?>/${followupId}`,
                    type: "POST",
                    success: function(response) {
                        if (response.success) {
                            $(`#followup-${followupId}`).remove();
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