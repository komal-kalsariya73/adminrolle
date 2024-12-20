<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>






<div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">All Staff</h3>
                <h6 class="op-7 mb-2">Staff-table-information</h6>
              </div>
              
            </div>
           
        
            
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                 
                  <div class="card-body p-0">
                  <div class="student-profile py-4 " id="customer-profile-container">
                        <div class="">
                            <div class="row">
                               
                                <div class="col-lg-8">
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-transparent border-0">
                                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Project Information</h3>
                                        </div>
                                        <div class="card-body pt-0">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="30%">Project Name</th>
                                                    <td width="2%">:</td>
                                                    <td id="project-project_name"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Description</th>
                                                    <td width="2%">:</td>
                                                    <td id="project-description"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Message</th>
                                                    <td width="2%">:</td>
                                                    <td id="project-message"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Status</th>
                                                    <td width="2%">:</td>
                                                    <td id="project-status"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Start date</th>
                                                    <td width="2%">:</td>
                                                    <td id="project-start_date"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">End date</th>
                                                    <td width="2%">:</td>
                                                    <td id="project-end_date"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Satff Name</th>
                                                    <td width="2%">:</td>
                                                    <td id="project-username"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Customer Name</th>
                                                    <td width="2%">:</td>
                                                    <td id="project-first_name"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Price</th>
                                                    <td width="2%">:</td>
                                                    <td id="project-price"></td>
                                                </tr>
                                               
                                            </table>
                                            <a href="<?= base_url('/project/view')?>" class="btn float-end  mt-3" style="background:#07193e;color:white">Back to List</a>
                                        </div>
                                    </div>
                                    <div style="height: 26px"></div>
                                   
                                </div>
                            </div>
                        </div>
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
    const params = new URLSearchParams(window.location.search);
    const projectId = params.get('id'); 

    if (projectId) {
        $.ajax({
            url: `<?= site_url('project/details'); ?>/${projectId}`,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    const projects=data.data;
                    $('#project-project_name').text(projects.project_name || 'N/A');
                    $('#project-description').text(projects.description || 'N/A');
                    $('#project-message').text(projects.message || 'N/A');
                    $('#project-status').text(projects.status || 'N/A');
                    $('#project-start_date').text(projects.start_date || 'N/A');
                    $('#project-end_date').text(projects.end_date || 'N/A');
                    $('#project-username').text(projects.user_name || 'N/A');
                    $('#project-first_name').text(projects.customer_name || 'N/A');
                    $('#project-price').text(projects.price || 'N/A');

                   
                } else {
                    alert('No data available for the specified customer.');
                }
            },
            error: function(xhr, status, error) {
                alert('Error fetching customer details: ' + xhr.responseText || error);
            }
        });
    } else {
        alert('Customer ID is missing in the URL.');
    }
});

</script>

    <?= $this->endSection(); ?>