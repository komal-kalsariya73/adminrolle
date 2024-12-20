<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>





<div class="container">
        <div class="page-inner">
          <div
            class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
              <h3 class="fw-bold mb-3">All Staff</h3>
              <h6 class="op-7 mb-2">Staff-table-information</h6>
            </div>
            <div class="ms-md-auto py-2 py-md-0">

              <a href="<?= base_url('/staff')?>" class="btn text-uppercase btn-round" style="background:#07193e;color:white">Add Staff</a>
            </div>
          </div>



          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Staff Details</div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center mb-0 table-secondary table-striped" id="myTable">
                      <thead class="thead-dark">
                        <tr>
                        <th scope="">Image</th>
                          <th scope="">First name</th>
                          <th scope="">Email</th>
                          <th scope="">Address</th>
                          <th scope="">Phone</th>

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
<!-- footetr -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function loadCustomers() {
            $.ajax({
                url: "<?= site_url('staff/fetch'); ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var rows = '';
                    $.each(data, function(index, users) {

                        const profileImageUrl = users.image ? `<?= base_url('uploads/'); ?>${users.image}` : '<?= base_url('public/uploads/customers/default-avatar.jpg'); ?>';

                        rows += `
                        <tr id="users_info-${users.id}">
                            <td><img src="${profileImageUrl}" alt="Profile Image" class="img-fluid rounded-circle" width="40" height="40" /></td>
                            <td>${users.name}</td>
                            <td>${users.email}</td>
                            <td>${users.address}</td>
                            <td>${users.phone}</td>
                            <td>
                                <a href="<?= base_url('/staff/display') ?>?id=${users.id}">
                                <i class='fas fa-box'  style='color:#7ca6ec;margin-right:10px;'></i>
                                </a>
                                <a href="<?= base_url('/staff') ?>?id=${users.id}">
                               <i class='fas fa-pencil-alt pr-2' style='color:orange;margin-right:10px;'></i>
                                </a>
                                <a href="javascript:void(0);" class="delete-btn" data-id="${users.id}">
                              <i class='fas fa-trash' style='color:red'></i>
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
            const staffId = $(this).data('id');
            if (confirm('Are you sure you want to delete this staff?')) {
                $.ajax({
                    url: `<?= site_url('staff/delete'); ?>/${staffId}`,
                    type: "POST",
                    success: function(response) {
                        if (response.success) {
                            $(`#users_info-${staffId}`).remove();
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