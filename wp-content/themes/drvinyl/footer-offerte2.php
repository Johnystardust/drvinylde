				
       <?php
	   
	   
	   get_header();
	   
	   ?>         
                
                
                
                <!-- aside -->
				<div class="aside">
					<div class="box">
						<h2>Offerte aanvragen</h2>
						
						<form class="offerte" method="post"  id ="myForm" enctype="multipart/form-data"  onsubmit=" return save_form_request_submitted();">
						
							<?php
							
								$valid = $captchaflag = false;
								
								/* Custom Numeric cpatcha code validation */
								if (isset($_POST['cptcharesponse'])) {
									if ($_POST['cptcharesponse'] == $_POST['cpatcharesp']) {
										 $captchaflag = true;
									}
									else {
										$errormsg = "De code is fout, probeer het a.u.b. opnieuw";
									}
									
								}
								$arjjcaptcha = mt_rand(10000, 99999);
								/* end cpatcha block */
								
								// Form process, indien verkeerd ingevoerd -> foutmelding.
								if(isset($_POST['offerte_branche']) && ($captchaflag == true)) {
								
									$errors = array();
								
									if(empty($_POST['offerte_branche'])) {
										$errors[] = "Kies een branche";
									}
									
									if(empty($_POST['offerte_onderdeel'])) {
										$errors[] = "Kies een onderdeel";
									}
									
									if(empty($_POST['offerte_beschrijving'])) {
										$errors[] = "Omschrijf de beschadiging";
									}
									
									if(empty($_POST['offerte_contactpersoon'])OR $_POST['offerte_contactpersoon'] == "Contactpersoon") {
										$errors[] = "Geef uw contactpersoon op";
									}
									
									if(empty($_POST['offerte_vestigingsplaats']) OR $_POST['offerte_vestigingsplaats'] == "Vestigingsplaats") {
										$errors[] = "Geef uw vestigingsplaats op";
									}
									
									if(empty($_POST['offerte_telefoonnummer']) OR $_POST['offerte_telefoonnummer'] == "Telefoon") {
										$errors[] = "Geef uw telefoonnummer op";
									}
									
									if(empty($_POST['offerte_email']) OR $_POST['offerte_email'] == "E-mail") {
										$errors[] = "Geef uw e-mail op";
									}
									
									if(count($errors) > 0) {
										foreach($errors AS $error) {
											?>
											<p class="error"><?=$error?></p>
											<?php
										}
										
										echo "<p>&nbsp;</p>";
									} else {
										// its all good  (Let op de files worden naar uploads/offertes , geupload
										
										$valid = true;
										$upload_dir = ABSPATH . 'wp-content/uploads/offertes/';
										$attachments = array();
										
										if(isset($_FILES['offerte_file_1']['name'])) {
										
											$ext = end(explode(".", $_FILES['offerte_file_1']['name']));
											$filename = uniqid().".".$ext;
											
											if(move_uploaded_file($_FILES['offerte_file_1']['tmp_name'], $upload_dir.$filename)) {
												$attachments[] = $filename;
											} 
										}
										
										if(isset($_FILES['offerte_file_2']['name'])) {
										
											$ext = end(explode(".", $_FILES['offerte_file_2']['name']));
											$filename = uniqid().".".$ext;
											
											if(move_uploaded_file($_FILES['offerte_file_2']['tmp_name'], $upload_dir.$filename)) {
												$attachments[] = $filename;
											} 
										}
										
										if(isset($_FILES['offerte_file_3']['name'])) {
										
											$ext = end(explode(".", $_FILES['offerte_file_3']['name']));
											$filename = uniqid().".".$ext;
											
											if(move_uploaded_file($_FILES['offerte_file_3']['tmp_name'], $upload_dir.$filename)) {
												$attachments[] = $filename;
											} 
										}
										
										$message = "Deze informatie is ingevoerd via de website.\n\n";
										$message .= "Branche: ".htmlspecialchars($_POST['offerte_branche'])."\n";
										$message .= "Onderdeel: ".htmlspecialchars($_POST['offerte_onderdeel'])."\n";
										$message .= "Omschrijving:\n\n".htmlspecialchars($_POST['offerte_beschrijving'])."\n\n";
										
										if(count($attachments) > 0) {
											foreach($attachments AS $attachment) {
												$message .= "Bijlage: ".home_url()."/wp-content/uploads/offertes/".$attachment."\n";
											}
										}
										
										$message .= "Bedrijfsnaam: ".htmlspecialchars($_POST['offerte_bedrijfsnaam'])."\n";
										$message .= "Contactpersoon: ".htmlspecialchars($_POST['offerte_contactpersoon'])."\n";
										$message .= "Vestigingsplaats: ".htmlspecialchars($_POST['offerte_vestigingsplaats'])."\n";
										$message .= "Telefoon: ".htmlspecialchars($_POST['offerte_telefoonnummer'])."\n";
										$message .= "E-mail: ".htmlspecialchars($_POST['offerte_email'])."\n";
										
										mail("ali@drvinyl.nl", "Offerte aanvraag", $message, 
										"FROM: ".$_POST['offerte_contactpersoon'].
										" <".$_POST['offerte_email'].">" . "\r\n" . "BCC:nick@eenpuntnul.nl") ;
										// mail("niels@media-enzo.nl", "Offerte aanvraag", $message, "FROM: Website DR. Vinyl <info@drvinyl.nl>");
									
									}
								
								}
							
							?>
							<?php echo ( isset( $errormsg ) )? '<div class="field"><label><font color="red">' . $errormsg . '</font></label></div>': '';?>
							<?php if(!$valid) { ?>
							
							
							<div class="field">
								<label>Selecteer branche *</label>
								<select name="offerte_branche" id="offerte_branche_trigger">
									<option value="Automotive" <?=(isset($_POST['offerte_branche']) && $_POST['offerte_branche'] == "Automotive" ? "selected='selected'" : "")?>>Automotive</option>
									<option value="Bouwsector" <?=(isset($_POST['offerte_branche']) && $_POST['offerte_branche'] == "Bouwsector" ? "selected='selected'" : "")?>>Bouwsector</option>
									<option value="Openbaar vervoer" <?=(isset($_POST['offerte_branche']) && $_POST['offerte_branche'] == "Openbaar vervoer" ? "selected='selected'" : "")?>>Openbaar vervoer</option>
									<option value="Scheepvaart" <?=(isset($_POST['offerte_branche']) && $_POST['offerte_branche'] == "Scheepvaart" ? "selected='selected'" : "")?>>Scheepvaart</option>
									<option value="Overig" <?=(isset($_POST['offerte_branche']) && $_POST['offerte_branche'] == "Overig" ? "selected='selected'" : "")?>>Overig</option>
								</select>
							</div>
							
							<div class="field">
								<label>Selecteer te repareren onderdeel *</label>
								<select name="offerte_onderdeel" id="offerte_onderdeel">
									<option value="Interieur" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Interieur" ? "selected='selected'" : "")?>>Interieur</option>
									<option value="Dashboard" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Dashboard" ? "selected='selected'" : "")?>>Dashboard</option>
									<option value="Stuurwiel" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Stuurwiel" ? "selected='selected'" : "")?>>Stuurwiel</option>
									<option value="Interieurreparaties" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Interieurreparaties" ? "selected='selected'" : "")?>>Interieurreparaties</option>
									<option value="Geurverwijdering" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Geurverwijdering" ? "selected='selected'" : "")?>>Geurverwijdering</option>
									<option value="Exterieur" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Exterieur" ? "selected='selected'" : "")?>>Exterieur</option>
									<option value="Spotrepair" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Spotrepair" ? "selected='selected'" : "")?>>Spotrepair</option>
									<option value="Steenslag Camouflage" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Steenslag Camouflage" ? "selected='selected'" : "")?>>Steenslag Camouflage</option>
									<option value="Uitdeuken zonder spuiten" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Uitdeuken zonder spuiten" ? "selected='selected'" : "")?>>Uitdeuken zonder spuiten</option>
								</select>
							</div>
							
							<div class="field">
								<label>Omschrijf beschadiging *</label>
								<textarea name="offerte_beschrijving"  id="offerte_beschrijving"><?=(isset($_POST['offerte_beschrijving']) ? htmlspecialchars($_POST['offerte_beschrijving']) : "")?></textarea>
							</div>
							
							<div class="field">
								<label>Foto uploaden</label>
								<input type="file" name="offerte_file_1" />
							</div>
							
							<div class="field">
								<input type="file" name="offerte_file_2" />
							</div>
							
							<div class="field">
								<input type="file" name="offerte_file_3" /><br/>
								<br/>
								<label>Wilt u meer foto's versturen?<br/>Mail deze dan naar <u>info@ drvinyl.nl</u><br/>Zonder foto's geen prijsopgave!</label>
							</div>
							
							<div class="field">
								<label>Uw gegevens</label> 
<!-------------  [offerte_bedrijfsnaam]) : "Tekst")?>  is veranderd vanwege placeholder ------------>
								<input type="text" name="offerte_bedrijfsnaam" placeholder="Bedrijfsnaam" class="input-text" value="<?=(isset($_POST['offerte_bedrijfsnaam']) ? htmlspecialchars($_POST['offerte_bedrijfsnaam']) : "")?>" /> 
							</div>
							
							<div class="field">
								<input type="text" name="offerte_contactpersoon" id="offerte_contactpersoon" class="input-text" id="offerte_contactpersoon" placeholder="Contactpersoon" value="<?=(isset($_POST['offerte_contactpersoon']) ? htmlspecialchars($_POST['offerte_contactpersoon']) : "")?>" />
							</div>
							
							<div class="field">
								<input type="text" name="offerte_vestigingsplaats" id="offerte_vestigingsplaats" class="input-text" placeholder="Vestigingsplaats" value="<?=(isset($_POST['offerte_vestigingsplaats']) ? htmlspecialchars($_POST['offerte_vestigingsplaats']) : "")?>" />
							</div>
							
							<div class="field">
								<input type="text" name="offerte_telefoonnummer"  id="offerte_telefoonnummer" class="input-text" placeholder="Telefoon" value="<?=(isset($_POST['offerte_telefoonnummer']) ? htmlspecialchars($_POST['offerte_telefoonnummer']) : "")?>" />
							</div>
							
							<div class="field">
								<input type="text" name="offerte_email"  id ="offerte_email" class="input-text" placeholder="Email" value="<?=(isset($_POST['offerte_email']) ? htmlspecialchars($_POST['offerte_email']) : "")?>" />
							</div>
							
							<div class="field" style="background:#bbb;padding:5px;width:90%;">
								<?php echo "Validatiecode: <font color=\"#223f70\"><strong> " . $arjjcaptcha . "</strong></font>"; ?>
								<input type="hidden" name="cpatcharesp" id="cpatcharesp" value="<?php echo $arjjcaptcha; ?>" />
								<input type="text" name="cptcharesponse" id="cptcharesponse" class="input-text" Placeholder="code" style="width:40%;" />
							</div>
							<input  class="btn btn-right" name="offerte_aanvragen"  type="button" onclick="save_form_request_submitted()" value="Verzend aanvraag" />
							
							
							<div class="clear"></div>
							<?php } else { ?>
								<p>Bedankt! Uw aanvraag is verzonden.</p>
								<?php echo ( isset( $errormsg ) )? '<div class="field"><label>' . $errormsg . '</label></div>': ''; ?>
							<?php } ?>
						</form>
						<p>&nbsp;</p>
					</div>
					
				</div>
			</div>
			<!-- sidebar -->
			<div id="sidebar">
				<!-- menu -->
				<?php
					wp_nav_menu(array(
						  'theme_location'  => "Hoofdnavigatie",
						  'menu'            => "Hoofdnavigatie", 
						  'container'       => false, 
						  'container_class' => false, 
						  'container_id'    => false, 
						  'menu_class'      => 'menu', 
						  'menu_id'         => '',
						  'echo'            => true,
						  'fallback_cb'     => false,
						  'before'          => false,
						  'after'           => false,
						  'link_before'     => false,
						  'link_after'      => false,
						  'depth'           => 0,
						  'walker'          => false
						));
				?>
				<a href="/offerte"><img src="<?=get_bloginfo("template_url")?>/images/banner1.gif" width="153" height="95" alt="Vervangen of herstellen?" /></a>
				<a href="http://www.drvinyl.com" target="_blank"><img src="<?=get_bloginfo("template_url")?>/images/banner2.gif" width="153" height="117" alt="DRVinyl" /></a>
			</div>
		</div>
		<!-- footer -->
		<div id="footer">
			<div class="holder">
				<!-- columns -->
				<div class="columns">
					<h3><a href="#">Diensten</a></h3>
					
			</div>
			<p class="by"><a href="http://www.gstalt.nl" target="_blank">ontwerp en realisatie // GSTALT</a><br>		</div>
	</div>
	<?php
		wp_footer();
	?>
</body>
<script>
 // validatong form feilds before gets uploaded   so that we can keep the  required feils safe if some required feild is not filled by user
 function save_form_request_submitted()
 {
	 // declaring variables for checks - Voordat het geupload wordt
	  var offerte_branche_trigger = document.getElementById('offerte_branche_trigger').value;
	  var offerte_onderdeel       = document.getElementById('offerte_onderdeel').value;
	  var offerte_beschrijving       = document.getElementById('offerte_beschrijving').value;
	  var offerte_contactpersoon    =   document.getElementById('offerte_contactpersoon').value;
	  var offerte_vestigingsplaats  =  document.getElementById('offerte_vestigingsplaats').value;
	  var offerte_telefoonnummer    =  document.getElementById('offerte_telefoonnummer').value;
	  var offerte_email            =  document.getElementById('offerte_email').value;
	  var cptcharesponse          =  document.getElementById('cptcharesponse').value;
	  var cpatcharesp             = document.getElementById('cpatcharesp').value;
	
	if(offerte_branche_trigger=='')
	{
		alert('Kies een branche');
		
		document.getElementById('offerte_branche_trigger').focus();
		return false;
		
		}
	  if(offerte_onderdeel=='')
	 {
		 
		 alert('Kies een onderdeel');
		 document.getElementById('offerte_onderdeel').focus();
		 return false;
		 }
		 
	 
	 if(offerte_beschrijving=='')
	 {
		 
		 alert('Omschrijf de beschadiging');
		 document.getElementById('offerte_beschrijving').focus();
		 return false;
		 
		 }
		 
		if(offerte_beschrijving=='')
	   {
		 
		 alert('Omschrijf de beschadiging');
		 document.getElementById('offerte_beschrijving').focus();
		
		 return false;
		 
		 } 
	 
	    if(offerte_contactpersoon=='' ||  offerte_contactpersoon=='Contactpersoon' )
	   {
		 
		 alert('Geef uw contactpersoon op');
		  document.getElementById('offerte_contactpersoon').focus();
		 return false;
		 
		 } 
	 
	 if(offerte_vestigingsplaats=='' ||  offerte_vestigingsplaats=='Vestigingsplaats' )
	   {
		 
		 alert('Geef uw vestigingsplaats op');
		 document.getElementById('offerte_vestigingsplaats').focus();
		 return false;
		 } 
		 
		 if(offerte_vestigingsplaats=='' ||  offerte_vestigingsplaats=='Vestigingsplaats' )
	   {
		
		 alert('Geef uw contactpersoon op');
		 document.getElementById('offerte_vestigingsplaats').focus();
		 return false;
		 
		 } 
		 
		 if(offerte_telefoonnummer=='' || offerte_telefoonnummer =='Telefoon')
           
		   {
			  
			   alert('Geef uw telefoonnummer op');
			   document.getElementById('offerte_telefoonnummer').focus();
			   return false;
			   }
			    
			   
			   
			   if(offerte_email=='' || offerte_email =='E-mail')
           
		      {
			   
			    alert('Geef uw e-mail op');
				document.getElementById('offerte_email').focus();
			    return false;
			   
			  }
			   var x = offerte_email;
               var atpos = x.indexOf("@");
               var dotpos = x.lastIndexOf(".");
               if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
				   alert('Geef uw e-mail op');
                document.getElementById('offerte_email').focus();
               return false;
                }
			   if(cptcharesponse=='' || cptcharesponse != cpatcharesp)
			   {
				   
				   alert('De code is fout, probeer het a.u.b. opnieuw');
				   
				   document.getElementById('cptcharesponse').focus();	
				    return false;
				   }
				   else
				   {
					   document.getElementById("myForm").submit();
					   
					   }
		
	 }



</script>


</html>