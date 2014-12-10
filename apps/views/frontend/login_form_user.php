<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/login.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/text.css" media="screen" />
<div class="container_16">
  <div class="grid_6 prefix_5 suffix_5">
   	  <h1>Organization Admin - Login</h1>
    	<div id="login">
    	 
          <p class="error"> <?php echo $this->session->flashdata('message'); ?></p>        
 <?php echo form_open('orgadmin/process_login'); ?>
    	    <p>
    	      <label><strong>Username</strong>
<input type="text" name="username" class="inputText" id="textfield" />
    	      </label>
               <span class="markcolor" style="color:red"><?php echo ucwords(form_error('username')); ?></span> 

  	      </p>
    	    <p>
    	      <label><strong>Password</strong>
  <input type="password" name="password" class="inputText" id="textfield2" />
  	        </label>
             <span class="markcolor"><?php echo ucwords(form_error('username')); ?></span> 

    	    </p>
           <input  type="submit" name="login" value="Sign in" class="black_button">
             <label>
             <input type="checkbox" name="checkbox" id="checkbox" />
              Remember me</label>  
          
    <?php echo form_close(); ?>
		  <br clear="all" />
    	</div>
        <div id="forgot">
       </div>
  </div>
</div>
<br clear="all" />