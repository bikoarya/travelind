<div class="wrapper h-100 d-flex align-items-center justify-content-center">
    <?= $this->session->flashdata('message'); ?>
    <div class="card border-0" style="width: 24rem; margin: auto">
        <div class="card-body m-2">
            <h5 class="card-title text-center mt-4">Sign In</h5>
            <form id="formSignIn">
                <div class="form-group mt-5 mb-4">
                    <input type="text" class="form-input w-100 border-0" name="txtUsername" id="txtUsername" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" class="form-input w-100 border-0" name="txtPassword" id="txtPassword" placeholder="Password" autocomplete="off">
                </div>
                <button type="submit" class="btn-sign-in border-0 w-100 rounded-lg mt-4" id="btn-signin">Sign In</button>
            </form>
            <p class="sign-up mt-4 text-center text-small">Don't have an account? <a href="<?= site_url('Register'); ?>">Sign Up</a></p>
        </div>
    </div>
</div>