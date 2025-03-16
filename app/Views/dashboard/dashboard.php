<?php $this->extend("_layout"); ?>
<?php $this->section("content"); ?>
<h1>Dashboard</h1>
<p>Welcome to your dashboard!</p>
<?php foreach ($facturas as $factura): ?>
    <p><?= $factura["id"] ?> - <?= $factura["monto"] ?> - <?= $factura[
     "contribuyenteId"
 ] ?> <button >Cobrar</button></p>
<?php endforeach; ?>
<?php $this->endSection(); ?>
