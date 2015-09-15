			<div class="body">
        		
        		<?php if ($this->session->flashdata('flashSuccess')): ?>
        			<p class='modal success'> <?=$this->session->flashdata('flashSuccess')?> </p>
        		<?php endif ?>
	           <?php if ($this->session->flashdata('flashError')): ?>
        			<p class='model error'> <?=$this->session->flashdata('flashError')?> </p>
        		<?php endif ?>
                
        		<h1><?php echo $hoofding ?></h1>
				<p>Dit is een applicatie die je moet maken: 
					<a href="todo">Todo-applicatie</a> 
				</p>
			</div> <!-- body -->
		</div> <!-- container -->
	</body>
