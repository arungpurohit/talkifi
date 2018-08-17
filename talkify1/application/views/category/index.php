<div class="grid_10">
            <div class="box round first">
                <h2>
                   Category Details</h2>
                <div class="block">
						
	<div id="ajaxLoadAni">
    	<img src="images/ajax-loader.gif" alt="Ajax Loading Animation" />
    	<span>Loading...</span>
	</div>

<div id="tabs">
    <button class="btn btn-grey btn-small">Delete All</button><br />
    <ul>
        <li><a href="#read">Read</a></li>
        <li><a href="#create">Create Category</a></li>
		<li><a href="#subcat">Create SubCategory</a></li>
		
    </ul>
    <div id="read">
        <table id="records">
            <thead>
                <tr>
                    <th><input type="checkbox" name="checkAllStat" /></th>
                    <th>Category name</th>
                    <th>Sub Category name</th>
					<th>Mobile No</th>
					<th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div id="create">
        <form action="" method="post" >
           <p>
               <label for="cName">Category Name:</label>
               <input type="text" id="category_name" name="category_name" />
           </p>
		   <p>
               <label for="cPhone">Category phone:</label>
               <input type="text" id="category_phone" name="category_phone" />
           </p>
		   <p>
               <label for="cEmail">Category email:</label>
               <input type="text" id="category_email" name="category_email" />
           </p>
            <p>
               <label>&nbsp;</label>
               <input type="submit" name="createSubmit" value="Submit" />
           </p>
        </form>
    </div>
	<div id="subcat">
        <form action="" method="post" >
           <p>
               <label for="cName">Category Name:</label>
               <select name="categorysel" id="categorysel">
			 	  <option value="">Please Select</option>
				  <?php foreach($categorylist as $r){?>
					<option value="<?php echo $r->lead_category_id;?>"><?php echo $r->lead_category_name;?></option>
				  <?php }  ?>
				  
			   </select>
           </p>
		   <p>
               <label for="cName">Sub Category Name:</label>
               <input type="text" id="subcategory_name" name="subcategory_name" />
           </p>
            <p>
               <label>&nbsp;</label>
               <input type="submit" name="createSubcat" value="Submit" />
           </p>
        </form>
    </div>

</div> <!-- end tabs -->

<!-- update form in dialog box -->
<div id="updateDialog" title="Update">
    <div>
        <form action="" method="post" >
           <p>
               <label for="cName">Category Name:</label>
               <input type="text" id="ucategory_name" name="ucategory_name" />
           </p>
            <input type="hidden" id="category_id" name="category_id" />
        </form>
    </div>
</div>

<!-- delete confirmation dialog box -->
<div id="delConfDialog" title="Confirm">
    <p>Are you sure?</p>
</div>


<!-- message dialog box -->
<div id="msgDialog"><p></p></div>

<script type="text/template" id="readTemplate">
    <tr id="${cat_id}">
        <td><input type="checkbox" name="checkAllCat${cat_id}" /></td>
        <td>${category_name}</td>
		 <td>${subcategory_name}</td>
		 <td>${category_phone}</td>
		 <td>${category_email}</td>
        <td>${cat_status}</td>
        <td><a class="updateBtn" href="${updateLink}">Update</a> </td>
    </tr>
</script>

<script type="text/javascript" src="js/category.js"></script>
			
                </div>
            </div>
            
        </div>
        
        <div class="clear">
        </div>
    </div>