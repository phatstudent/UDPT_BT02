<?php $this->view("football/layout/header", $data) ?>

<!-- MAIN -->
<main role="main" class="scroll d-flex">
    <?php $this->view("football/layout/sidebar", $data) ?>

    <!-- Content -->
    <div class="container">
        <table class="table table-fluid" id="allPlayesTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Club Name</th>
                    <th scope="col">Stadium Name</th>
                    <th scope="col">Coach FullName</th>
                </tr>
            </thead>
            <tbody>
                <?php if (is_array($data['clubs_list'])) : ?>
                    <?php foreach ($data['clubs_list'] as $row) : ?>
                        <tr>
                            <td><?= $row->ClubID ?></td>
                            <td><a href="<?= ROOT ?>players/playersOf/<?= $row->ClubID ?>"><?= $row->ClubName ?></a></td>
                            <td><?= $row->SName ?></td>
                            <td><?= $row->CFullName ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#allPlayesTable').DataTable();
    });
</script>

<!-- FOOTER -->
<?php $this->view("football/layout/footer", $data) ?>