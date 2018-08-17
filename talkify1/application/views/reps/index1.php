<html>
<head>
<title>CRUD Operations using jQuery and Codeigniter</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />

<!--<link type="text/css" rel="stylesheet" href="css/demo_table.css" />-->
<link type="text/css" rel="stylesheet" href="http://localhost/talkify/css/smoothness/jquery-ui-1.8.2.custom.css" />
<link type="text/css" rel="stylesheet" href="http://localhost/talkify/css/styles.css" />

</head>
<body>

<div id="ajaxLoadAni">
    <img src="http://localhost/talkify/images/ajax-loader.gif" alt="Ajax Loading Animation" />
    <span>Loading...</span>
</div>

<div id="tabs">
    
    <ul>
        <li><a href="#read">Read</a></li>
        <li><a href="#create">Create</a></li>
    </ul>
    
    <div id="read">
        <table id="records">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
					<th>Mobile</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div id="create">
        <form action="" method="post">
           <p>
               <label for="cName">Name:</label>
               <input type="text" id="cName" name="cName" />
           </p>
           
           <p>
               <label for="cEmail">Email:</label>
               <input type="text" id="cEmail" name="cEmail" />
           </p>
           
           <p>
               <label>&nbsp;</label>
               <input type="submit" name="createSubmit" value="Submit" />
           </p>
        </form>
    </div>

</div> <!-- end tabs -->

<!-- update form in dialog box -->
<div id="updateDialog" title="Update">
    <div>
        <form action="" method="post">
            <p>
               <label for="name">Name:</label>
               <input type="text" id="name" name="name" />
            </p>
            
            <p>
               <label for="email">Email:</label>
               <input type="text" id="email" name="email" />
            </p>
            
            <input type="hidden" id="userId" name="id" />
        </form>
    </div>
</div>

<!-- delete confirmation dialog box -->
<div id="delConfDialog" title="Confirm">
    <p>Are you sure?</p>
</div>


<!-- message dialog box -->
<div id="msgDialog"><p></p></div>


<script type="text/javascript" src="http://localhost/talkify/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="http://localhost/talkify/js/jquery-ui-1.8.2.min.js"></script>
<script type="text/javascript" src="http://localhost/talkify/js/jquery-templ.js"></script>
<script type="text/javascript" src="http://localhost/talkify/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://localhost/talkify/js/jquery.dataTables.min.js"></script>

<script type="text/template" id="readTemplate">
    <tr id="${rep_id}">
        <td>${rep_id}</td>
        <td>${rep_username}</td>
        <td>${rep_email}</td>
		<td>${rep_mobile}</td>
        <td><a class="updateBtn" href="${updateLink}">Update</a> | <a class="deleteBtn" href="${deleteLink}">Delete</a></td>
    </tr>
</script>

<script type="text/javascript" src="http://localhost/talkify/js/all.js"></script>

</body>
</html>