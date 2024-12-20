<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>




<div class="container">
        <div class="page-inner">
          <div
            class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
              <h3 class="fw-bold mb-3">Followup</h3>
              <h6 class="op-7 mb-2">Followup-table-information</h6>
            </div>

          </div>



          <div class="row">
            <div class="col-lg-12">
              <div class="card">

                <div class="card-body p-0">
                  <div class="student-profile py-4">
                    <div class="">
                      <div class="row">

                        <div class="col-lg-8">
                          <div class="card shadow-sm">
                            <div class="card-header bg-transparent border-0">
                              <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Followup Information</h3>
                            </div>
                            <div class="card-body pt-0">
                              <table class="table table-bordered">
                                <tr>
                                  <th width="30%">Customers Name</th>
                                  <td width="2%">:</td>
                                  <td id="followup-customer_name"></td>
                                </tr>
                                <tr>
                                  <th width="30%">Project Name</th>
                                  <td width="2%">:</td>
                                  <td id="followup-project_name"></td>
                                </tr>

                                <tr>
                                  <th width="30%">Message</th>
                                  <td width="2%">:</td>
                                  <td id="followup-message"></td>
                                </tr>
                                <tr>
                                  <th width="30%">Status</th>
                                  <td width="2%">:</td>
                                  <td id="followup-status"></td>
                                </tr>
                                <tr>
                                  <th width="30%">followup date</th>
                                  <td width="2%">:</td>
                                  <td id="followup-followup_date"></td>
                                </tr>


                              </table>
                              <a href="<?= base_url('/followup/view')?>" class="btn float-end  mt-3" style="background:#07193e;color:white">Back to List</a>
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
    const followupId = params.get('id'); 

    if (followupId) {
        $.ajax({
            url: `<?= site_url('followup/details'); ?>/${followupId}`,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    const followups=data.data;
                    $('#followup-customer_name').text(followups.customer_name || 'N/A');
                    $('#followup-project_name').text(followups.project_name || 'N/A');
                    $('#followup-message').text(followups.message || 'N/A');
                    $('#followup-status').text(followups.status || 'N/A');
                    $('#followup-followup_date').text(followups.followup_date || 'N/A');
                 
                   
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