<div class="row">
    <div class="col-md-offset-3">
        <div class="col-md-8">
            <h2>Register</h2>
            <hr/>
            <form action="/auth/login" method="post">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirm" class="form-control" placeholder="Repeat Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
