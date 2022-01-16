<!-- https://getbootstrap.com/docs/5.1/helpers/position/#fixed-bottom -->
<!-- <footer class="footer bg-warning text-white text-center fixed-bottom p-4"> -->
    <footer class="bg-warning text-white text-center p-4">
        <div class="container">
            <span class="text-muted">
                <p>
                    <?php
                    setlocale(LC_TIME, 'fr_FR',"French");
                    echo strftime("%A %e %B %Y");
                    echo ' - ';
                    date_default_timezone_set("Europe/Paris");
                    echo date('H:i:s');
                    echo ' - Agence immobilière - Le bon Appart';
                    ?>
                </p>
            </span>
        </div>
    </footer>
