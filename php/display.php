<table>
  <tr>
    <th>First Name</th>
  </tr>
  <?php
  foreach ($name as $names) {
      echo ' <tr>
         <td>'. $names .'</td>
       </tr>';
  }
  ?>
</table>
