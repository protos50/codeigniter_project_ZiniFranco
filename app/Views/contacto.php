<div class="bg-color font-roboto">
    <section>
        <div class="hero img-fluid d-flex flex-column justify-content-center align-content-center" style="background-image: url(assets/img/hero-contact-us.jpg); height: 26vw; background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;">
            <div class="sub-hero">
                <h1 class="text-white text-center mb-4 font-lato" style="font-weight: 700; font-size: 3em;">Contáctanos</h2>
            </div>

        </div>

        <div class="container-fluid overflow-hidden">
            <div class="row py-5 p-3">
                <div class="col-md-7 col-12 p-md-0">
                    <h2 class="text-center font-lato">Inicie una conversación o consulta</h2>
                    <form action="submit-form.php" method="POST">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="tel" id="phone" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea id="message" name="message" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block my-3">Submit</button>
                    </form>
                </div>

                <div class="col-md-4 col-12 offset-md-1 p-md-0 py-3">

                    <h6 class="text-uppercase mb-4 font-weight-bold font-lato">Información de Contactos</h6>
                    <p><i class="fas fa-home mr-3"></i> Corrientes, Calle Sim 1560 - Barrio 1, Argentina</p>
                    <p><i class="fas fa-envelope mr-3"></i> smartH_ctes@gmail.com</p>
                    <p><i class="fas fa-phone mr-3"></i> + 54 379 4661 1164</p>

                </div>
            </div>
        </div>
    </section>

</div>