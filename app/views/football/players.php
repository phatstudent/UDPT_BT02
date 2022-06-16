
<?php $this->view("football/layout/header", $data) ?>
      
    <!-- MAIN -->
    <main role="main" class="scroll d-flex">
    <!-- Content -->
        <!-- sidebar -->
        <?php $this->view("football/layout/sidebar", $data) ?>

        <div class="container">
            <table class="table table-fluid" id="allPlayersTable">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Full name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Nationality</th>
                    <th scope="col">Number</th>
                    <th scope="col">Club</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($data['players_list'])): ?>
                <?php foreach($data['players_list'] as $row): ?>
                <tr>
                    <td><?=$row->PlayerID?></td>
                    <td><?=$row->FullName?></td>
                    <td><?=$row->Position?></td>
                    <td><?=$row->Nationality?></td> 
                    <td><?=$row->Number?></td> 
                    <td><?=$row->ClubName?></td> 
                </tr>
                <?php endforeach; ?>
                <?php endif;?>
                </tbody>

            </table>

        </div>
    </main>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#allPlayersTable').DataTable();
    });
    </script>           

      <!-- FOOTER -->
<?php $this->view("football/layout/footer", $data) ?>