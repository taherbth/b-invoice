        	<?php foreach($account_info as $info):
			   $category=$info['account_category'];
			  endforeach;?>
             <div id="menu">
                <ul class="menu">
                    <li><a href="#" class="parent"><span>User Module</span></a>
                    	 <div>
                           <ul>
                    		<li><a href="<?php echo base_url();?>users/info/show_profile"><span>Show Profile</span></a></li>
                            <?php if($category==1):?>
                            <li> <a href="<?php echo base_url();?>users/deposit/show_deposit"><span> Deposit Details</span></a></li>
                            <li><a href="<?php echo base_url();?>users/deposit/account_detail"><span>Account details</span></a></li>
                            <?php else:?>
                           <li><a href="<?php echo base_url();?>users/investor/account_details"><span>Account Details</span></a></li>
                           <?php endif;?>
                          </ul></div>
                    </li>
                    <?php if($category==1):?> 
                   <li><a href="#" class="parent"><span>Child Account</span></a>
                    	 <div>
                           <ul>
                            <li><a href="<?php echo base_url();?>users/deposit/add_child_account"><span> Account Details</span></a></li>
                          </ul></div>
                    </li>
                       <?php endif;?>
            
                    <li class="last"><a href="<?php echo base_url();?>login/logout" title="Log out"><span>Log out</span></a>
                    
                    </li>
                    
                </ul>
        </div>
