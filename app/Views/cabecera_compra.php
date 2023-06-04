<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
<style>
    .container {
        padding-top: 40px;
    }

    h1 {
        font-size: 24px;
        margin-bottom: 30px;
    }

    .table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        border-bottom: 1px solid #dee2e6;
    }

    .table thead th {
        background-color: #3F729B;
        border-color: #dee2e6;
    }

    .btn-detail {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        background-color: #00695c;
        color: #fff;
    }

    .btn-detail:hover {
        background-color: #c82333;
        color: #fff;
    }
</style>

<div class="container">
    <h1>Ventas Realizadas</h1>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Total</th>
                    <th>Usuario</th>
                    <th>Dirección</th>
                    <th>Método de Pago</th>
                    <th>Número de Tarjeta</th>
                    <th>Cuotas</th>
                    <th>Fecha de Venta</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($compras as $compra) : ?>
                    <?php
                    // Buscar el usuario correspondiente
                    $usuario = null;
                    foreach ($usuarios as $u) {
                        if ($u['id'] == $compra['id_usuario']) {
                            $usuario = $u;
                            break;
                        }
                    }
                    ?>
                    <tr>
                        <td><?= $compra['id'] ?></td>
                        <td><?= $compra['total'] ?></td>
                        <td><?= $usuario ? $usuario['nombre'] : 'S/N' ?> <?= $usuario ? $usuario['apellido'] : 'S/A' ?></td>
                        <td><?= $usuario ? $usuario['direccion'] : 'S/D' ?></td>
                        <td><?= $compra['metodo_pago'] ?></td>
                        <td><?= $compra['numero_tarjeta'] ?></td>
                        <td><?= $compra['cuotas'] ?></td>
                        <td><?= $compra['fecha_alta'] ?></td>
                        <td>
                            <a href="<?php echo base_url('/factura/' . $compra['id']); ?>" class="btn btn-detail">Detalle</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>