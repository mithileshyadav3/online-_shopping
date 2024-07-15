<h3 class="text-center text-success my-3">All Order</h3>
<table class="table table-bordered ">
<thead class=bg-info>
<tr class="bg-info">
   <th class='bg-info text-light text-center'>S.No</th>
   <th class='bg-info text-light text-center'  > Amount Due</th>
   <th class='bg-info text-light text-center'>Invoice number</th>
   <th class='bg-info text-light text-center'>Total products</th>
   <th class='bg-info text-light text-center'>Order Status</th>
   <th class='bg-info text-light text-center'>Date</th>
   <th class='bg-info text-light text-center'>Delete</th>
</tr>
      </thead>
            <?php
      $select_order="SELECT * from user_orders";
      $select_order_query=mysqli_query($conn,$select_order);
     
      $select_row=mysqli_num_rows($select_order_query);
      if($select_row==0){
            echo" <h3 class='text-danger text-center my-3'>User has not order yet</h3>";
      }
      else{
            $number=0;
            while( $fetch_order=mysqli_fetch_assoc($select_order_query)){
            $Due_Amount=$fetch_order['amount_due'];
            $invoice_number=$fetch_order['invoice_number'];
            $total_products=$fetch_order['total_products'];
            $order_date=$fetch_order['order_date'];
            $order_status=$fetch_order['order_status'];
            $number++;
            echo" <tbody>
            <tr>
                  <td class='bg-secondary text-light text-center'>$number</td>
                  <td class='bg-secondary text-light text-center'>$Due_Amount</td>
                  <td class='bg-secondary text-light text-center'>$invoice_number</td>
                  <td class='bg-secondary text-light text-center'>$total_products</td>
                  <td class='bg-secondary text-light text-center'>$order_date</td>
                  <td class='bg-secondary text-light text-center'>$order_status</td>
                  <td class='bg-secondary text-light text-center'><i class='fa-solid fa-trash text-light'></i></td>
      
                 
                  
                  
            </tr>
      </tbody>";
            } 
      }
            
            ?>
            
      
</table>