<div class="wrapper h-100 d-flex align-items-center justify-content-center">
    <div class="card border-0" style="width: 24rem; margin: auto">
        <div class="card-body m-2">
            <h5 class="card-title text-center mt-4">Sign Up</h5>
            <form id="formSignUp">
                <div class="form-group mt-5 mb-4">
                    <input type="text" class="form-input w-100 border-0" name="fullName" id="fullName" placeholder="Full Name" autocomplete="off">
                </div>
                <div class="form-group mb-4">
                    <input type="text" class="form-input w-100 border-0" name="username" id="username" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" class="form-input w-100 border-0" name="password" id="password" placeholder="Password" autocomplete="off">
                </div>
                <button type="submit" class="btn-sign-in border-0 w-100 rounded-lg mt-4" id="btn-signup">Sign Up</button>
            </form>
            <p class="sign-up mt-4 text-center text-small">Already have an account? <a href="<?= site_url('Auth'); ?>">Sign In</a></p>
        </div>
    </div>
</div>