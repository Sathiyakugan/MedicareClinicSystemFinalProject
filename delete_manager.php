

















    <br>
    <div class="table-responsive">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Fees</th>
                <th>Payment</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>View Profile</th>
            </tr>
            </thead>
            <tbody>
            <?php
            /*
            View
            Displays all data from 'Patient' table
            */
            // get results from database
            $res_pending=$appointment_cl->getresultsbyDocPending($doctor->getUsername());


            // display data in table
            $count=sizeof($res_pending);
            // loop through results of database query, displaying them in the table
            $patient=null;
            for($i=0;$i<$count;$i++) {
                // echo out the contents of each row into a table
                echo "<tr>";
                $patient=new Patient($res_pending[$i]['pusername']);
                echo '<td>' . $res_pending[$i]['id'] . '</td>';
                echo '<td>' . $patient->getFirstName(); '</td>';
                echo '<td>' . $res_pending[$i]['consultancyFees'] . '</td>';
                echo '<td>' . $res_pending[$i]['appointmentDate'] . '</td>';
                echo '<td>' . $res_pending[$i]['appointmentTime'] . '</td>';
                ?>
                <td><button type='button' data-a="../Admin/profile.php?type=Patient&username=<?php echo $res_pending[$i]['pusername']?>" href='#editarUsuario' class='modalEditarUsuario btn btn-primary'  data-toggle='modal' data-backdrop='static' data-keyboard='false' title='Editar usuario'>Profile</button></td>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>










