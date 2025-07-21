<?php $this->load->view('templates/header'); ?>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link href="https://bootswatch.com/5/brite/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-3 px-4">
    <h2>Login</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="post" action="<?php echo site_url('login'); ?>">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="<?php echo site_url('register'); ?>" class="btn btn-link">Don't have an account? Register</a>
    </form>
</div>
<?php $this->load->view('templates/footer'); ?>