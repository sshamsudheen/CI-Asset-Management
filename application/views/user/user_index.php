

<div class="container">
     <div class="row">
          <div class="">
         
          <fieldset>
               <legend>Users</legend>
			   <table width="100%" style="border:1px solid grey;">
			   <tr>
					<th>
						S.no
					</th>
					<th>
						User Name
					</th>
					<th>
						User id
					</th>
				</tr>

				
				<?php	
				$cnt=1;
				foreach($results as $userdata)
				{
					if($cnt%2==0)$bgcolor="white";else $bgcolor="#e5e5e5";
					echo "<tr bgcolor='".$bgcolor."'><td>".$userdata->userid."</td>";
					echo "<td>".$userdata->user_name."</td>";
					echo "<td>".$userdata->user_id."</td></tr>";
					$cnt++;
				}
				?>
				
			   </table>
               <p><?php echo $links; ?></p>
          </fieldset>
          
          </div>
     </div>
</div>
     
