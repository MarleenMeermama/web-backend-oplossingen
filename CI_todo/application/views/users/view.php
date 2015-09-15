				<div class="body">
        		
	       		<?php if ($this->session->flashdata('flashSuccess')): ?>
        			<p class='modal success'><?=$this->session->flashdata('flashSuccess')?></p>
        		<?php endif ?>
        		
        		
				<?php if (form_error('email') == '' && form_error('password') == ''): ?>
					
					<?php if ($this->session->flashdata('flashError')): ?>
	        			<p class='modal error'><?=$this->session->flashdata('flashError')?></p>
	        		<?php endif ?>
				<?php endif ?>
        			           	
                
        		<h1><?php echo $hoofding ?></h1>

        		<?php echo form_open($form); ?>
					
					<p>
				    <label for="email">Email</label>
				    <br>
				    <input type="text" id="email" name="email" value="<?php echo $email ?>" />
					</p>
					
					<div<?php echo (form_error('email') == '') ? '' : ' class=" modal error"'; ?>>
					    <?php echo form_error('email'); ?>
					</div>

					<p>
				    <label for="password">Password</label>
				    <br>
				    <input type="password" id="password" name="password" value="<?php echo $password ?>" />
					</p>
					
					<div<?php echo (form_error('password') == '') ? '' : ' class=" modal error"'; ?>>
					    <?php echo form_error('password'); ?>
					</div>
					
				    <p>
				    <input type="submit" name="submit" value="<?php echo $knop ?>" />
				    </p>

				</form>
				
			</div> <!-- body -->
		</div> <!-- container -->
	</body>

