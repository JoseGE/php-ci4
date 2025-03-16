<?php $this->extend("_layout"); ?>
<?php $this->section("content"); ?>
<form action="/login" method="post">
    <input type="text" name="telefono" placeholder="Telfono">
    <input type="password" name="clave" placeholder="Password">
    <button type="submit">Iniciar sesión</button>
</form>
<?php $this->endSection(); ?>
