<script>
    // When the user clicks on the profile icon, show the popup
    $('.fas.fa-user-circle').click(function() {
        $('#profile-popup').modal('show');
    });
</script>

<!-- The popup -->
<div class="modal fade" id="profile-popup" tabindex="-1" aria-labelledby="profile-popup-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profile-popup-label">User Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="..." class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h4>{{Auth::user()->name}}</h4>
                        <p>Email: {{Auth::user()->email}}</p>
                        <p>Joined Date: {{Auth::user()->created_at}}</p>
                        <p>Phone No#: {{Auth::user()->phone}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
