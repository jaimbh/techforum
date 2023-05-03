<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup for a TechForum account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/forum/partials/_handleSignup.php" method="post">
                    <div class="mb-3">
                        <label for="userName" class="form-label">Username</label>
                        <input type="text" class="form-control" id="userName" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="signupPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword">
                    </div>
                    <div class="mb-3">
                        <label for="signupCpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="signupCpassword" name="signupcPassword">
                    </div>
                    <button type="submit" class="btn btn-success">Signup</button>
                </form>
            </div>
        </div>
    </div>
</div>