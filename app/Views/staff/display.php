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
                                        <img id="profile-image" class="profile_img w-75" src="" alt="Customer Image" > 
                                            
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0 text-center text-dark"><strong class="pr-1 text-dark" id="users_info-name"></strong></p>
                                            <p class="mb-0 text-center text-dark"><strong class="pr-1 text-dark" id="users-email"></strong></p>
                                            <a href="<?= base_url('/staff/view')?>" class="btn w-100 mt-3" style="background:#07193e;color:white">Back to List</a>
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
                                                    <td id="users_username"></td>
                                                </tr>
                                               
                                                <tr>
                                                    <th width="30%">Gender</th>
                                                    <td width="2%">:</td>
                                                    <td id="users_info-gender"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">City</th>
                                                    <td width="2%">:</td>
                                                    <td id="users_info-city"></td>
                                                </tr>
                                               
                                                <tr>
                                                    <th width="30%">Phone</th>
                                                    <td width="2%">:</td>
                                                    <td id="users_info-phone"></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Address</th>
                                                    <td width="2%">:</td>
                                                    <td id="users_info-address"></td>
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
        const staffId = params.get('id');

        if (staffId) {
            $.ajax({
                url: `<?= site_url('staff/details'); ?>/${staffId}`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        const user = data.data;
                        $('#users_username').text(user.name);
                        $('#users_info-name').text(user.name);
                        $('#users-email').text(user.email);
                        $('#users_info-phone').text(user.phone);
                        $('#users_info-gender').text(user.gender);
                        $('#users_info-address').text(user.address);
                        $('#users_info-city').text(user.city);

                        if (user.image_url) {
                            $('#profile-image').attr('src', user.image_url);
                        }
                    } else {
                        alert(data.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error fetching staff details: ' + error);
                }
            });

        } else {
            alert('No customer ID provided.');
        }
    });
</script>

<?= $this->endSection(); ?>