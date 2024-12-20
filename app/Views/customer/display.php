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
                  <div class="student-profile py-4">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-transparent text-center">
                                        <img id="customer-profile-img" class="profile_img w-75" src="" alt="Customer Image" > 
                                            
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0 text-center text-dark"><strong class="pr-1 text-dark" id="customer-name"></strong></p>
                                            <p class="mb-0 text-center text-dark"><strong class="pr-1 text-dark" id="customer-email"></strong></p>
                                            <a href="<?= base_url('/customer/view')?>" class="btn w-100 mt-3" style="background:#07193e;color:white">Back to List</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-transparent border-0">
                                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Custumer Information</h3>
                                        </div>
                                        <div class="card-body pt-0">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="30%">FirstName</th>
                                                    <td width="2%">:</td>
                                                    <td id="customer-firstname"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">LastName</th>
                                                    <td width="2%">:</td>
                                                    <td id="customer-lastname"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Gender</th>
                                                    <td width="2%">:</td>
                                                    <td id="customer-gender"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">City</th>
                                                    <td width="2%">:</td>
                                                    <td id="customer-city"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Pincode</th>
                                                    <td width="2%">:</td>
                                                    <td id="customer-pincode"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Phone</th>
                                                    <td width="2%">:</td>
                                                    <td id="customer-phone"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Address</th>
                                                    <td width="2%">:</td>
                                                    <td id="customer-address"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Company Name</th>
                                                    <td width="2%">:</td>
                                                    <td id="customer-company_name"></td>
                                                </tr>
                                               
                                            </table>
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


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
    const params = new URLSearchParams(window.location.search);
    const customerId = params.get('id'); 

    if (customerId) {
        $.ajax({
            url: `<?= site_url('customer/details'); ?>/${customerId}`,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data) {
                    $('#customer-name').text(data.first_name || 'N/A');
                    $('#customer-email').text(data.email || 'N/A');
                    $('#customer-firstname').text(data.first_name || 'N/A');
                    $('#customer-lastname').text(data.last_name || 'N/A');
                    $('#customer-gender').text(data.gender || 'N/A');
                    $('#customer-city').text(data.city || 'N/A');
                    $('#customer-pincode').text(data.pincode || 'N/A');
                    $('#customer-phone').text(data.phone || 'N/A');
                    $('#customer-address').text(data.address || 'N/A');
                    $('#customer-company_name').text(data.company_name|| 'N/A');

                    if (data.image_url) {
                        $('#customer-profile-img').attr('src', data.image_url);
                    }

                    // Show the profile container
                    $('#customer-profile-container').show();
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