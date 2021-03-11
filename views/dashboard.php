
<?php
require "./config/fonction.php";

if(!is_connected()){
    header('LOCATION: /index.php?page=login');
    exit();
}

?>


<h2 class="textcenter">Bonjour  <span id="userConnect"><?php echo $_SESSION['admin']; ?></span></h2>

<!-- ------------------------la partie chat-appli -->
<?php
require "./config/sendmsg.php";

?>
<section class="bloccenter">
    <div class="input-group mb-3">
        <ul   id="space" >
        
        </ul>
    </div>
    <form class="input-group mb-3"  method="POST">
        <input type="text" class="form-control" placeholder="Message" aria-label="Recipient's username" aria-describedby="button-addon2" name="message">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Ajouter</button>
    </form>
</section>
<!-- <script type="text/javascript">
	element = document.getElementById('space');
	element.scrollTop = element.scrollHeight;
</script> -->
<script src="./assets/js/get_all_messages.js"></script>