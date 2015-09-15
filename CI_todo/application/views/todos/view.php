				<div class="body">
        		
	           <?php if ($this->session->flashdata('flashSuccess')): ?>
        			<p class='modal success'> <?=$this->session->flashdata('flashSuccess')?> </p>
        		<?php endif ?>
	           <?php if ($this->session->flashdata('flashError')): ?>
        			<p class='modal error'> <?=$this->session->flashdata('flashError')?> </p>
        		<?php endif ?>
                
        		<h1><?php echo $mainHeader ?></h1>

        		<?php echo validation_errors(); ?>

				<h2><?php echo $subHeader ?></h2>
				
				<p>
					<?php echo $emptyListMessage ?><a href=" <?php echo site_url('toevoegen'); ?> "> Voeg item toe</a>
				</p>
				
				<?php foreach ($tasks as $status => $list): ?>
					
					<h3><?php echo $status ?></h3>

					<p> 
						<?php if ($status == 'done'): ?>
							<?php echo $emptyListMessage_done ?>
						<?php else: ?>
							<?php echo $emptyListMessage_todo ?>
						<?php endif ?>
					</p>

					<ul class="list">
						
						<?php foreach ($list as $row): ?>
								
							<li class="<?php echo $row['status'] ?>">
								
								<span class="activate" title=" <?php if ($row['status'] == 'done'): ?><?php echo $done_activateTitle ?><?php else: ?><?php echo $todo_activateTitle ?><?php endif ?>"><a href="<?php echo site_url('activeren/'.$row['id']); ?>" class="icon fontawesome-ok-sign"></a>
								</span>
								
								<span class="text"><?php echo $row['description']; ?></span>
								
								<span class="delete" title="<?php echo $deleteTitle ?> "><a href="<?php echo site_url('verwijderen/'.$row['id']); ?>" class="icon fontawesome-remove"></a></span>

							</li>

						<?php endforeach ?>

				<?php endforeach ?>
					
								
			</div> <!-- body -->
		</div> <!-- container -->
	</body>