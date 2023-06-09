<?php $session = session(); ?>

<div class="font-roboto">
    <section>
        <div class="hero img-fluid d-flex flex-column justify-content-center align-content-center" style="background-image: url(assets/img/hero-contact-us.jpg); height: 26vw; background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;">
            <div class="sub-hero">

                <?php if (!session()->has('user_id')) : ?>
                    <h1 class="text-white text-center mb-4 font-lato" style="font-weight: 700; font-size: 3em;">Contáctanos</h1>
                <?php else : ?>
                    <h1 class="text-white text-center mb-4 font-lato" style="font-weight: 700; font-size: 3em;">Consultanos</h1>
                <?php endif; ?>

            </div>

        </div>

        <div class="container-fluid">
            <div class="row pb-3 p-3 m-sm-5 m-0">
                <!-- formulario de contacto -->
                <div class="col-lg-8 col-12 border rounded border-dark bg-color-2">
                    <div class="p-md-0 m-5">

                        <?php if (!session()->has('user_id')) : ?>
                            <h2 class="font-lato">Contactanos</h2>
                        <?php else : ?>
                            <h2 class="font-lato">Realiza una Consulta</h2>
                        <?php endif; ?>

                        <h3 class="font-lato" style="color: #ff6700; font-size: max(1.5vw, 20PX);">¡Ingresá tus datos y responderemos a la brevedad!</h3>
                        <form action="<?= site_url('/guardar_datos') ?>" method="post">
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" id="name" name="name" class="form-control" value="<?php echo $session->has('id_usuario') ? $session->get('nombre', '') : ''; ?>" <?php echo $session->has('id_usuario') ? 'readonly' : ''; ?> required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" value="<?php echo $session->has('id_usuario') ? $session->get('email', '') : ''; ?>" <?php echo $session->has('id_usuario') ? 'readonly' : ''; ?> required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Teléfono:</label>
                                <input type="tel" id="phone" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Mensaje:</label>
                                <textarea id="message" name="message" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block my-3">Enviar</button>
                        </form>
                    </div>





                </div>

                <!-- info de contacto -->
                <div class="col-lg-3 ms-lg-5 mt-lg-0 mt-3 col-12 border rounded border-info bg-color-2 d-flex justify-content-center align-items-center">
                    <div class="p-3 py-3  ">
                        <h6 class="text-uppercase mb-5 pb-3 font-weight-bold font-lato">Información de Contactos</h6>
                        <p><i class="fas fa-home mr-3"></i> Corrientes, Calle Sim 1560 - Barrio 1, Argentina</p>
                        <p><i class="fas fa-envelope mr-3"></i> smartH_ctes@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> + 54 379 4661 1164</p>
                    </div>



                </div>
                <hr class="hr hr-blurry mt-5" style="color: #ff6700" />
            </div>

        </div>


        <!--Google map-->
        <div class="container-fluid">
            <h2 class="mb-4 font-lato text-center">Donde nos encontramos</h2>
            <div class="z-depth-1-half position-static pb-5" style="display: flex; justify-content: center;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5458.402382791545!2d-58.78746485146623!3d-27.48992682999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sar!4v1681691303178!5m2!1ses-419!2sar" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!--Google Maps-->
        </div>
    </section>

</div>