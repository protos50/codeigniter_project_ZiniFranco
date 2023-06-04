<!DOCTYPE html>
<html>

<head>
    <title>Factura Compra</title>

    <link rel="stylesheet" href="<?php echo base_url('/assets/css/estilos_factura.css'); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="card-header p-4">
                <a class="pt-2 d-inline-block" href="/" data-abc="true">HOME | SmartHomeCorrientes.com</a>
                <div class="float-right">
                    <h3 class="mb-0">Factura ID Compra: # <?php echo isset($cabeceraCompra['id']) ? $cabeceraCompra['id'] : 'Sin Datos'; ?></h3>
                    <?php echo isset($cabeceraCompra['fecha_alta']) ? "Fecha de emisión: " . $cabeceraCompra['fecha_alta'] : 'Sin Datos'; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h5 class="mb-3">De:</h5>
                        <h3 class="text-dark mb-1">Smart Home Corrientes</h3>
                        <div>Calle Sim 1560 - Barrio 1</div>
                        <div>Corrientes (CP: 3400), Argentina</div>
                        <div>Email: smartH_ctes@gmail.com</div>
                        <div>Telefono: ++ 54 379 4661 1164</div>
                    </div>

                    <div class="col-sm-6">
                        <h5 class="mb-3">Facturar a:</h5>
                        <h3 class="text-dark mb-1"><?php echo isset($usuario) ? $usuario['nombre'] . ' ' . $usuario['apellido'] : 'Sin Datos'; ?></h3>
                        <div>Dirección: <?php echo isset($usuario['direccion']) ? $usuario['direccion'] : 'Sin Datos'; ?></div>
                        <div>Email: <?php echo isset($usuario) ? $usuario['email'] : 'Sin Datos'; ?></div>
                        <div>Teléfono: <?php echo isset($usuario['telefono']) ? $usuario['telefono'] : 'Sin Datos'; ?></div>
                    </div>

                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th class="center">ID Producto</th>
                                <th class="center">Producto</th>
                                <th class="right">Precio Unitario</th>
                                <th class="center">Cantidad</th>
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($productos) : ?>
                                <?php $contador = 1;
                                foreach ($productos as $producto) : ?>
                                    <tr>
                                        <td class="center"><?php echo $contador; ?></td>
                                        <td class="center"><?php echo $producto['detalle']['id_producto']; ?></td>
                                        <td class="center"><?php echo $producto['detalle']['nombre']; ?></td>
                                        <td class="right"><?php echo $producto['detalle']['importe_unitario']; ?></td>
                                        <td class="center"><?php echo $producto['detalle']['cantidad']; ?></td>
                                        <td class="right"><?php echo $producto['detalle']['importe_total']; ?></td>
                                    </tr>
                                    <?php $contador++; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <td class="center"> <h3>No hay productos comprados</h3></td>
                                <td class="center"> <h3>Ingrese un 'id_compra' correcto</h3></td>
                            <?php endif; ?>


                        </tbody>
                    </table>

                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong class="text-dark"><?php echo isset($cabeceraCompra['total']) ? $cabeceraCompra['total'] : 'Sin Datos'; ?></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p class="mb-0">Para los casos de garantías, cambios o devoluciones se deberá presentar la siguiente factura emitida.</p>
            </div>
        </div>
    </div>
</body>

</html>