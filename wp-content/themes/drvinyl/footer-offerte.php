			
	<!-- aside -->
				<div class="aside">
					<div class="box">
						<h2>Angebot beantragen</h2>
						
						<form class="offerte" method="post" enctype="multipart/form-data">
						
							<?php
							
								$valid = $captchaflag = false;
								
								/* Custom Numeric cpatcha code validation */
								if (isset($_POST['cptcharesponse'])) {
									if ($_POST['cptcharesponse'] == $_POST['cpatcharesp']) {
										 $captchaflag = true;
									}
									else {
										$errormsg = "Der Code ist falsch, bitte versuchen Sie es wieder";
									}
									
								}
								$arjjcaptcha = mt_rand(10000, 99999);
								/* end cpatcha block */
								
								// Form process, indien verkeerd ingevoerd -> foutmelding.
								if(isset($_POST['offerte_branche']) && ($captchaflag == true)) {
								
									$errors = array();
								
									if(empty($_POST['offerte_branche'])) {
										$errors[] = "Geschäftszweig eingeben";
									}
									
									if(empty($_POST['offerte_onderdeel'])) {
										$errors[] = "Reparatur Teil eingeben";
									}
									
									if(empty($_POST['offerte_beschrijving'])) {
										$errors[] = "Beschreiben Sie die Beschädigung";
									}
									
									if(empty($_POST['offerte_contactpersoon'])OR $_POST['offerte_contactpersoon'] == "Contactpersoon") {
										$errors[] = "Geben Sie Ihre Name ein";
									}
									
									if(empty($_POST['offerte_vestigingsplaats']) OR $_POST['offerte_vestigingsplaats'] == "Vestigingsplaats") {
										$errors[] = "Geben Sie Ihre Wohnsitz ein";
									}
									
									if(empty($_POST['offerte_telefoonnummer']) OR $_POST['offerte_telefoonnummer'] == "Telefoon") {
										$errors[] = "Geben Sie Ihre Telefonnummer ein";
									}
									
									if(empty($_POST['offerte_email']) OR $_POST['offerte_email'] == "E-mail") {
										$errors[] = "Geben Sie Ihre E-Mail ein";
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
										
										$message = "Deze informatie is ingevoerd via de Duitse website.\n\n";
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
										
										mail("info@drvinyl.nl", "Offerte aanvraag DE", $message, 
										"FROM: ".$_POST['offerte_contactpersoon'].
										" <".$_POST['offerte_email'].">" . "\r\n" . "BCC:nick@eenpuntnul.nl") ;
										// mail("niels@media-enzo.nl", "Offerte aanvraag DE", $message, "FROM: Website DR. Vinyl <info@drvinyl.nl>");
									
									}
								
								}
							
							?>
							<?php echo ( isset( $errormsg ) )? '<div class="field"><label><font color="red">' . $errormsg . '</font></label></div>': '';?>
							<?php if(!$valid) { ?>
							
							
							<div class="field">
								<label>Geschäftszweig selektieren  *</label>
								<select name="offerte_branche" id="offerte_branche_trigger">
									<option value="Automotive" <?=(isset($_POST['offerte_branche']) && $_POST['offerte_branche'] == "Automotive" ? "selected='selected'" : "")?>>Fahrzeugindustrie</option>
									<option value="Bouwsector" <?=(isset($_POST['offerte_branche']) && $_POST['offerte_branche'] == "Bouwsector" ? "selected='selected'" : "")?>>Bauindustrie</option>
									<option value="Openbaar vervoer" <?=(isset($_POST['offerte_branche']) && $_POST['offerte_branche'] == "Openbaar vervoer" ? "selected='selected'" : "")?>>Öffentliche Verkehrsmittel</option>
									<option value="Scheepvaart" <?=(isset($_POST['offerte_branche']) && $_POST['offerte_branche'] == "Scheepvaart" ? "selected='selected'" : "")?>>Schifffahrt</option>
									<option value="Overig" <?=(isset($_POST['offerte_branche']) && $_POST['offerte_branche'] == "Overig" ? "selected='selected'" : "")?>>Übrig</option>
								</select>
							</div>
							
							<div class="field">
								<label>Reparaturteil *</label>
								<select name="offerte_onderdeel" id="offerte_onderdeel">
									<option value="Interieur" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Interieur" ? "selected='selected'" : "")?>>Innenausstattung</option>
									<option value="Dashboard" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Dashboard" ? "selected='selected'" : "")?>>Armaturenbrett</option>
									<option value="Stuurwiel" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Stuurwiel" ? "selected='selected'" : "")?>>Steuerrad</option>
									<option value="Interieurreparaties" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Interieurreparaties" ? "selected='selected'" : "")?>>Innenausstattungsreparaturen</option>
									<option value="Geurverwijdering" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Geurverwijdering" ? "selected='selected'" : "")?>>Geruchsneutralisation</option>
									<option value="Exterieur" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Exterieur" ? "selected='selected'" : "")?>>Außenseite</option>
									<option value="Spotrepair" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Spotrepair" ? "selected='selected'" : "")?>>Spot-Reparatur</option>
									<option value="Steenslag Camouflage" <?=(isset($_POST['offerte_onderdeel']) && $_POST['offerte_onderdeel'] == "Steenslag Camouflage" ? "selected='selected'" : "")?>>Splitt-Tarnung</option>
								</select>
							</div>
							
							<div class="field">
								<label>Umschreibung Beschädigung *</label>
								<textarea name="offerte_beschrijving"><?=(isset($_POST['offerte_beschrijving']) ? htmlspecialchars($_POST['offerte_beschrijving']) : "")?></textarea>
							</div>
							
							<div class="field">
								<label>Foto Uploaden</label>
								<input type="file" name="offerte_file_1" />
							</div>
							
							<div class="field">
								<input type="file" name="offerte_file_2" />
							</div>
							
							<div class="field">
								<input type="file" name="offerte_file_3" /><br/>
								<br/>
								<label>Möchten Sie mehr Fotos verschicken?<br/>Schicken Sie die Fotos an: <u>info@ drvinyl.eu</u><br/>Ohne Fotos keine Preisangabe!</label>
							</div>
							
							<div class="field">
								<label>Ihre Daten</label> 
<!-------------  [offerte_bedrijfsnaam]) : "Tekst")?>  is veranderd vanwege placeholder ------------>
								<input type="text" name="offerte_bedrijfsnaam" placeholder="(Firma) Name" class="input-text" value="<?=(isset($_POST['offerte_bedrijfsnaam']) ? htmlspecialchars($_POST['offerte_bedrijfsnaam']) : "")?>" /> 
							</div>
							
							<div class="field">
								<input type="text" name="offerte_contactpersoon" class="input-text" placeholder="Ihre Name" value="<?=(isset($_POST['offerte_contactpersoon']) ? htmlspecialchars($_POST['offerte_contactpersoon']) : "")?>" />
							</div>
							
							<div class="field">
								<input type="text" name="offerte_vestigingsplaats" class="input-text" placeholder="Platz" value="<?=(isset($_POST['offerte_vestigingsplaats']) ? htmlspecialchars($_POST['offerte_vestigingsplaats']) : "")?>" />
							</div>
							
							<div class="field">
								<input type="text" name="offerte_telefoonnummer" class="input-text" placeholder="Telefon" value="<?=(isset($_POST['offerte_telefoonnummer']) ? htmlspecialchars($_POST['offerte_telefoonnummer']) : "")?>" />
							</div>
							
							<div class="field">
								<input type="text" name="offerte_email" class="input-text" placeholder="E-Mail" value="<?=(isset($_POST['offerte_email']) ? htmlspecialchars($_POST['offerte_email']) : "")?>" />
							</div>
							
							<div class="field" style="background:#bbb;padding:5px;width:90%;">
								<?php echo "Validation Code: <font color=\"#223f70\"><strong> " . $arjjcaptcha . "</strong></font>"; ?>
								<input type="hidden" name="cpatcharesp" value="<?php echo $arjjcaptcha; ?>" />
								<input type="text" name="cptcharesponse" class="input-text" Placeholder="code" style="width:40%;" />
							</div>
							
							<button class="btn btn-right" name="offerte_aanvragen" type="submit" onclick="this.disabled=1; this.form.submit();">Schicken</button>
							
							<div class="clear"></div>
							<?php } else { ?>
								<p>Danke! Ihre Anfrage wurde abgeschickt.</p>
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
					<h3><a href="#">Dienstleistungen</a></h3>
					<div class="col">
						<?php
							the_field("footer_column_1", "options");
						?>
					</div>
					<div class="col">
						<?php
							the_field("footer_column_2", "options");
						?>
					</div>
					<div class="col">
						<?php
							the_field("footer_column_3", "options");
						?>
					</div>
				</div>
				<div class="col">
					<?php
						the_field("footer_column_4", "options");
					?>
				</div>
				<div class="col">
					<?php
						the_field("footer_column_5", "options");
					?>
				</div>
			</div>
			<p class="by"><a href="http://www.gstalt.nl" target="_blank">Konzept und Realisierung // GSTALT</a><br>		</div>
	</div>
	<?php
		wp_footer();
	?>
</body>
</html>