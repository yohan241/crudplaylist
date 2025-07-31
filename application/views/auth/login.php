 


<div class="container mt-5 px-5">
<div class="formpage">
    <h2>Login</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="post" action="<?php echo site_url('login'); ?>">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="btn-group text-right" role="group">
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="<?php echo site_url('register'); ?>" class="btn btn-link">Don't have an account? </a>
        </div>
    </form>
    </div>
</div>
 