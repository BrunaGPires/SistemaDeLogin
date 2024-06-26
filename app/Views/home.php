<?php
/**
 * @var array $user
 */
?>
<form form class="container mt-4">
    <div class="row justify-content-center">
        <fieldset class="col-md-6">
        <div class="card border-secondary mb-3">
                <div class="card-header bg-primary">Login</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="" class="form-control-plaintext" id="staticEmail" value="email@example.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" autocomplete="off" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                    <a class="btn btn-lg btn-primary btn-block" href="user/login">Login</a>
                    <a class="btn btn-lg btn-primary btn-block" href="/user/register">Cadastrar</a>
                </div>
        </fieldset>
    </div>
</form>