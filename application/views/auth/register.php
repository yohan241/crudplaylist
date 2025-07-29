<?php $this->load->view('templates/header'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link href="https://bootswatch.com/5/brite/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 px-5">
<div class="container mt-5 px-5" style="width: 70%;">
    <h2>Register</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="post" action="<?php echo site_url('register'); ?>">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>

        <!-- Button group centered -->
        <div class="btn-group" role="group" style="margin-left: 50%; transform: translateX(-50%); align-items: center; align-content: center;">
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="<?php echo site_url('login'); ?>" class="btn btn-link">Already have an account? Login</a>
        </div>
    </form>
</div>
</div>
<?php $this->load->view('templates/footer'); ?>
