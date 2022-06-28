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
                    <th scope="col">Option</th>
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
                            <td>
                                <!-- <a data-toggle="modal" detaches=<?= str_replace(" ", "__", json_encode($row)) ?> data-target="#update_player">Update</a> -->

                                <a data-val=<?= $row->ClubID ?> data-toggle="modal" data-target="#deletePlayerConfirm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<div class="modal fade" id="deletePlayerConfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Delete player
                <!-- <h5 class="modal-title" id="exampleModalLabel">Housing</h5> -->
                <button type="button" class="close my-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1>
                    Are you sure ?
                </h1>

                <div>
                    <button id="delete_confirmed" class="btn btn btn-dark" onclick="" name="Delete_player" type="submit">Yes</button>
                    <button class="btn btn btn-dark closebtn" name="no" type="submit">no</button>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.closebtn').on('click',function() {
            $('.modal').modal('hide');
        });

        $(document).on('show.bs.modal','#update_player', function (event) {
            var relate =  $(event.relatedTarget);
            var data = relate.attr('detaches').replace("__"," ");
            var json = JSON.parse(data);
            console.log(data);
            // alert(data);
            // $(this).find("#update_button").attr("onclick", str)
            // var fullname = $(this).getElementsByName("updated_FullName");
            // fullname.attr("placeholder", "s");
            $(this).find("#PlayerID").attr("value", json.PlayerID)
            $(this).find("#FullName").attr("value", json.FullName)
            $(this).find("#FullName").attr("value", json.FullName)
            $(this).find("#Position").attr("value", json.Position)
            $(this).find("#Nationality").attr("value", json.Nationality)
            $(this).find("#Number").attr("value", json.Number)
            $(this).find("#ClubName").attr("value", json.ClubName)
            $(this).find("#ClubName").text(json.ClubName)
        });

        $(document).on('show.bs.modal','#deletePlayerConfirm', function (event) {
            var myVal = $(event.relatedTarget).data('val');
            var str = "window.location.href='<?= ROOT ?>clubs/DeleteClub/" + myVal + "'";
            $(this).find("#delete_confirmed").attr("onclick", str)
        });
    });
</script>

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