<script src="js/company_details.js" type="text/javascript"></script>
<div class="grid_10">
            <div class="box round first">
                <h2> Company Details </h2>
                <div class="block ">
						
                    <?php 	echo form_open_multipart('show-company/');?>
					<?php 
					if(!empty($error))
					var_dump($error);
					echo validation_errors();?>
					
                    <table class="form">
                         <tr>
                            <td>
                                <label>
                                    Company Name</label>
                            </td>
                            <td>
								<?PHP echo form_input('company_name',$statusof[0]->company_name);?>
                            </td>
							
							<td>
                                <label>-------
                                    <!--Company Unique ID--></label>
                            </td>
                            <td>-------
                             <?PHP //echo form_input('cmp_unique_id',$statusof[0]->cmp_unique_id); ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label>
                                    Company Address</label>
                            </td>
                            <td>
                                <?PHP echo form_input('company_address',$statusof[0]->company_address);?>
                            </td>
							<td >
                                <label>
                                    Company State</label>
                            </td>
                            <td>
								<?PHP echo form_input('company_state',$statusof[0]->company_state);?>
                               <!--<select name="cmp_state" >
									<option>SELECT</option>
									<option value="KA">KARNATAKA</option>
									<option value="AP">ANDRA PRADESH</option>
									<option value="KE">KERALA</option>
									<option value="CE">CHEENI</option>
									<option value="GA">GOA</option>
								</select>-->
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>
                                    Company city</label>
                            </td>
                            <td>
								<?php echo form_input('company_city',$statusof[0]->company_city);?>
                                <!--<input type="text" class="medium" name="cmp_city" />-->
                            </td>
							<td >
                                <label>
                                    Company zip</label>
                            </td>
                            <td>
								<?php echo form_input('company_zip',$statusof[0]->company_zip);?>
                                <!--<input type="text" class="medium" name="cmp_zip" />-->
                            </td>
							
							
                        </tr>
						<tr>
                            <td>
                                <label>
                                    Company fax</label>
                            </td>
                            <td>
                                <?php echo form_input('company_fax',$statusof[0]->company_fax);?>
                            </td>
							<td >
                                
                            </td>
                            <td>
                                
                            </td>
							
							
                        </tr>
						<tr>
                            <td>
                                <label>
                                    Starting Date</label>
                            </td>
                            <td>
								<?php echo form_input('company_starting_date',$statusof[0]->company_starting_date);?>
                                <!--<input type="text" class="medium" name="cmp_starting_date" />-->
                            </td>
							<td>
                                <label>
                                    Modification Date</label>
                            </td>
                            <td>
								<?php echo form_input('company_modification_date',$statusof[0]->company_modification_date);?>
                                <!--<input type="text" class="medium" name="cmp_modification_date" />-->
                            </td>
							
							
                        </tr>
						<tr>
                            <td>
                                <label>
                                    Mini Logo</label>
                            </td>
                            <td>
                               <input type="file" class="medium" name="userfile" />
                            </td>
							<td ></td>
                            <td></td>
                        </tr>
						<tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
							<td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
						<tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
							<td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
						<tr>
                            <td>
                                <label>Contact Person</label>
                            </td>
                            <td>
								<?php echo form_input('company_contact_person',$statusof[0]->company_contact_person);?>
                                <!--<input type="text" class="medium" name="contact_person" />-->
                            </td>
							
							<td>
                                <label> Contact Email</label>
                            </td>
                            <td>
								<?php echo form_input('company_contact_email',$statusof[0]->company_contact_email);?>                               
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>
                                    Contact Phone</label>
                            </td>
                            <td>
								<?php echo form_input('company_contact_phone',$statusof[0]->company_contact_phone);?>
                                <!--<input type="text" class="medium" name="contact_person_phone" />-->
                            </td>
							<td >
                              <label>No Of Emails Provided</label>  
							 
                            </td>
                            <td>
								
								
								
                                <?php /*?><?php echo form_input('no_of_emails_provided',$statusof[0]->no_of_emails_provided);?><?php */?>
								<input type="text" name="no_of_emails_provided" id="no_of_emails_provided" value="1000" />
                            </td>
							
                        </tr>
						<tr>
						<td>
								<label>No Of Emails Used</label>
							</td>
							<td>
							
								<?php /*?><?php echo form_input('no_of_emails_used',$statusof[0]->no_of_emails_used);?><?php */?>
								<input type="text" name="no_of_emails_used" id="no_of_emails_used" value="" />
							</td>
						</tr>
						<tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
							<td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
						
						<tr>
                            <td>&nbsp;</td>
                            <td colspan="2"><input type="submit" name="cmp_submit" class="btn" value="Submit"/>&nbsp;
							<input type="reset" name="cmp_reset" class="btn" value="Reset"/>
							</td>
							
                            <td>&nbsp;</td>
                        </tr>
						
						
                    </table>
                    </form>
                </div>
            </div>
        </div>
