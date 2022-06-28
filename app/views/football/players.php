<?php $this->view("football/layout/header", $data) ?>

<!-- MAIN -->
<main role="main" class="scroll d-flex">
    <!-- Content -->
    <!-- sidebar -->
    <?php $this->view("football/layout/sidebar", $data) ?>

    <div class="container">
    <?php check_messenger()?>
        <table class="table table-fluid" id="allPlayersTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Full name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Nationality</th>
                    <th scope="col">Number</th>
                    <th scope="col">Club</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                <?php if (is_array($data['players_list'])) : ?>
                    <?php foreach ($data['players_list'] as $row) : ?>
                        <!-- <?php show(json_encode($row))?> -->
                        <tr>
                            <td><?= $row->PlayerID ?></td>
                            <td>
                                <div edit_type="click"><?= $row->FullName ?></div>
                            </td>
                            <td><?= $row->Position ?></td>
                            <td><?= $row->Nationality ?></td>
                            <td><?= $row->Number ?></td>
                            <td><?= $row->ClubName ?></td>
                            <!-- <?php show(json_encode($row))?> -->
            
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>

        </table>

    </div>
</main>

<div class="modal fade" id="update_player" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Players
                <!-- <h5 class="modal-title" id="exampleModalLabel">Housing</h5> -->
                <button type="button" class="close my-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1>
                    Update player
                </h1>

                <form method="POST">
                    <div class="form-item" hidden={true}>
                         <input id="PlayerID" type="text" name="updated_PlayerID" placeholder="">
                    </div>
                    <div class="form-item">
                        <label for="updated_ClubName">Full Name</label>
                        <input id="FullName" type="text" name="updated_FullName" placeholder="">
                    </div>
                    <div class="form-item">
                        <label for="updated_Position">Position</label>
                        <input id="Position" type="text" name="updated_Position" placeholder="">
                    </div>
                    <div class="form-item">
                        <label for="updated_Nationality">Nationality</label>
                        <input id="Nationality" type="text" name="updated_Nationality" placeholder="">
                    </div>
                    <div class="form-item">
                        <label for="updated_Number">Number</label>
                        <input id="Number" type="text" name="updated_Number" placeholder="">
                    </div>
                    <label for="updated_ClubName">Club Name</label>
                    <select name="updated_ClubName" class="custom-select" placeholder="Club ID" >
                    <option id="ClubName" value=""></option>
                    <?php if (!empty($data['selected_club_list'])) : ?>
                        <?php foreach ($data['selected_club_list'] as $row) : ?>
                        <option><?= $row->ClubName ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </select>
                    <input id="update_button" class="btn btn btn-dark" name="submit" type="submit"></input>
                </form>

            </div>

        </div>
    </div>
</div>

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
            var str = "window.location.href='<?= ROOT ?>players/DeletePlayer/" + myVal + "'";
            $(this).find("#delete_confirmed").attr("onclick", str)
        });
    });
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#allPlayersTable').DataTable();
    });
</script>

<!-- FOOTER -->
<?php $this->view("football/layout/footer", $data) ?>