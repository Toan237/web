 <div class="col-10">
     <div class="dashboard--layout">
         <h3>Danh sách tài khoản khách hàng</h3>
         <div class="block">



             <table class="table">
                 <thead>
                     <tr>
                         <th scope="col">ID</th>
                         <th scope="col"> Customer Name</th>
                         <th scope="col">Phone</th>
                         <th scope="col">Email</th>
                         <th scope="col">Address</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        $i = 0;
                        foreach ($customer as $key => $cus) {
                            $i++;
                        ?>
                         <td><?php echo $i ?></td>
                         <td><?php echo $cus['customer_name'] ?></td>
                         <td><?php echo $cus['customer_phone'] ?></td>
                         <td><?php echo $cus['customer_email'] ?></td>
                         <td><?php echo $cus['customer_address'] ?></td>
                     <?php
                        }
                        ?>

                 </tbody>
             </table>
             <div class="pull-right">
                 <nav aria-label="Page navigation">
                     <ul class="pagination">
                         <li>
                             <a href="#" aria-label="Previous">
                                 <span aria-hidden="true">&laquo;</span>
                             </a>
                         </li>


                         <li class="<?php
                                    // echo ($i == $p) ? 'active' : '' 
                                    ?>">
                             <a href="?page=<?php
                                            // echo $i ;
                                            ?>"><?php
                                                // echo $i; 
                                                ?></a>
                         </li>

                         <a href="#" aria-label="Next">
                             <span aria-hidden="true">&raquo;</span>
                         </a>
                         </li>
                     </ul>
                 </nav>
             </div>
         </div>
     </div>
 </div>
 <script type="text/javascript">
     $(document).ready(function() {
         setupLeftMenu();

         $('.datatable').dataTable();
         setSidebarHeight();
     });
 </script>