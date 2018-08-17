 <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
	                <ul class="section menu">
					<?php foreach($leftmenu as $keys => $leftvals){
						if(!empty($leftvals)){
					?>
                        <li><a class="menuitem"><?php echo $keys;?></a>
                            <ul class="submenu">
							<?php foreach($leftvals as $leftv){?>
                                <li><a href="index.php/<?php echo $leftv[1]; ?>/"><?php echo $leftv[2]; ?></a> </li>
								<?php }?>
                            </ul>
                        </li>
						<?php } }?>
                    </ul>
                </div>
            </div>
        </div>