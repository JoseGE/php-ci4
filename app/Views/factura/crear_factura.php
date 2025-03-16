<?= $this->extend("_layout") ?>
<?= $this->section("content") ?>
<form action="/crear_factura" method="post">
    <input type="text" name="contribuyente" placeholder="contribuyente">
    <input type="number" step="1" name="monto" placeholder="Monto">
    <input type="text" name="nota" placeholder="Nota">
    <button type="submit">Crear Factura</button>
</form>
<?= $this->endSection() ?>
