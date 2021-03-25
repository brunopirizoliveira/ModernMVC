<?php include __DIR__ . '/../inicio-html.php'; ?>

<form action="realiza-login" method="post">
    <div class="row justify-content-md-center">
        <div class="col-xl-6 col-md-6">
            <div class="form-group">        
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </div>        
    </div>

    
</form>

<?php include __DIR__ . '/../fim-html.php'; ?>