
<style>
#displayDiv th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

#displayDiv td, #displayDiv th {
  border:  solid #ddd;
  padding: 8px;
}

#displayDiv tr:nth-child(even){background-color: #f2f2f2;}
</style>
<div id="displayDiv" class="tabcontent">
<table>
  <tr>
    <th>First Name</th>
    <th>Game Name</th>
  </tr>
  <?php
  foreach ($name as $names => $gameNames) {
      echo ' <tr>
         <td>'. $names . '</td>
         <td>'. $gameNames . '</td>
       </tr>';
  }
  ?>
</table>
</div>
