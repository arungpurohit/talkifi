<div class="grid_10">
	<div class="box round first">
		<h2> <?php echo $title;?> </h2>
			<div class="block ">
			
				<?php echo form_open("repreports/$set_module",array('id' => 'report_search','name' => 'report_search')); ?>
				
				<div class="demo">
					<label for="from"><b>From</b></label>
							<?php 
					$data = array(
								  'name'        => 'date_from',
								  'id'          => 'date_from',
								  'value'       => set_value('date_from'),
								  'required'   => 'required',
								);
					echo form_input($data);
					?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label for="to"><b>To</b></label>
								<?php $data = array(
								  'name'        => 'date_to',
								  'id'          => 'date_to',
								  'value'       => set_value('date_to'),
								  'required'   => 'required',
								);
								echo form_input($data);
								?>
				</div><br />
				<?php echo form_submit('search','Search');
				echo form_close();?>
			<br />
			<br />
			<br />
				<?php /*?><table border="1" width="100%" >
					<tr >
					<th> REP </th>
					<?php foreach ($header_cols as $header_value => $header_display):?>
					<th><?php echo $header_display;?></th>
					<?php  endforeach ;?>
					</tr>
					<?php foreach ($rows as $row): ?>
					<tr>
					<td><?php echo $row['RepName'];?></td>
					<?php foreach ($header_cols as $header_value => $header_display):?>
						<td><?php echo $row[$header_display]?></td>
					<?php  endforeach ; ?>
					</tr>
					<?php endforeach ;?>
				</table><?php */?>
				<table class="data display datatable" border="1" width="100%" id="records" >
			<tr >
			<thead>
			<th class="sorting"> REP </th>
			<?php foreach ($header_cols as $header_value => $header_display):?>
			<th class="sorting"><?php echo $header_display;?></th>
			<?php  endforeach ;?>
			</thead>
			</tr>
			<?php foreach ($rows as $row): ?>
			<tr >
			<td><?php echo $row['RepName'];?></td>
			<?php foreach ($header_cols as $header_value => $header_display):?>
				<td><?php echo $row[$header_display]?></td>
			<?php  endforeach ; ?>
			</tr>
			<?php endforeach ;?>
			</table>
			<br />
			<br />
			<br />
				<a style="cursor:pointer; text-decoration:none;" href="csv_reports/<?php echo $set_module?>.csv" >
				<!--<img src="<?php echo base_url();?>images/export_1.jpg" alt="Export to CSV" />-->Exports to CSV</a>
				
			
			
			</div>
	</div>
</div>
<script type="text/javascript" src="js/reports.js"></script>