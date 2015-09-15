			<div class="body">
			    
			    <?php if ($this->session->flashdata('flashSuccess')): ?>
        			<p class='modal success'> <?=$this->session->flashdata('flashSuccess')?> </p>
        		<?php endif ?>
	           <?php if ($this->session->flashdata('flashError')): ?>
        			<p class='modal error'> <?=$this->session->flashdata('flashError')?> </p>
        		<?php endif ?>
			        
				<h1>Voeg een TODO-item toe</h1>

				<a href="  ">Terug naar mijn TODO's</a>

				<?php echo form_open('toevoegen'); ?>

					<ul>
						<li>
				    		<label for="description" class="label">Wat moet er gedaan worden?</label>

				    		<input name="description" type="text" id="description">
				    		
				    	</li>
					</ul>
			    
			    	<input type="submit" name = "submit" value="Toevoegen!">

				</form>

        	</div> <!-- body -->
		</div> <!-- container -->
	</body>