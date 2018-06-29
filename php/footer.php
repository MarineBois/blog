		<!--FOOTER-->
		<footer>
			<a href="#top" id="scrollTop"><i class="fas fa-arrow-up"></i></a>
		</footer>

		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


	<script type="text/javascript">

	//afficher le formulaire pour modifier son mdp :

	$('#modifier_mdp').on("click",function(){
		$('#modifier_mdp').toggleClass("red");
		$('#formmdp').toggleClass("show");
	})

	//afficher le formulaire pour ajouter un auteur :	

	$('#ajoutauteur').on("click",function(){
		$('#ajoutauteur').toggleClass("red");	
		$('#nouvelAuteur').toggleClass("show");
	})

	// croll top :
	$('a[href^="#"]').click(function(){
		var the_id = $(this).attr("href");$('html, body').animate({scrollTop:$(the_id).offset().top}, 'slow');//return false;
	});	


	</script>	

	</body>
</html>