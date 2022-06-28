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
                    <th scope="col">Short Name</th>
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
                            <td><?= $row->Shortname ?></td>
                            <td><?= $row->SName ?></td>
                            <td><?= $row->CFullName ?></td>
                            <td>
                                <a data-toggle="modal" detaches=<?= str_replace(" ", "__", json_encode($row)) ?> data-target="#update_player">Update</a>

                                <!-- <a data-val=<?= $row->ClubID ?> data-toggle="modal" data-target="#deleteClubConfirm">Delete</a> -->
                            </td>
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
                         <input id="ClubID" type="text" name="updated_ClubID" placeholder="">
                    </div>
                    <div class="form-item">
                        <label for="updated_ClubName">Club Name</label>
                        <input id="ClubName" type="text" name="updated_ClubName" placeholder="">
                    </div>
                    <div class="form-item">
                        <label for="updated_Position">Short Name</label>
                        <input id="ShortName" type="text" name="updated_ShortName" placeholder="">
                    </div>

                    <label for="updated_Stadium">Stadium</label>
                    <select name="updated_Stadium" class="custom-select" placeholder="Stadium" >
                    <option id="Stadium" value=""></option>
                    <?php foreach ($data['option_stadiums_list'] as $row) : ?>
                        <option value=<?=$row->StadiumID?>><?= $row->SName ?></option>
                    <?php endforeach; ?>
                    </select>

                    <label for="updated_Coach">Coach</label>
                    <select name="updated_Coach" class="custom-select" placeholder="Coach" >
                    <option id="Coach" value=""></option>
                    <?php foreach ($data['option_coachs_list'] as $row) : ?>
                        <option value=<?=$row->CoachID?>><?= $row->CFullName ?></option>
                    <?php endforeach; ?>
                    </select>
                    <input id="update_button" class="btn btn btn-dark" name="submit" type="submit"></input>
                </form>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="deleteClubConfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            $(this).find("#ClubID").attr("value", json.ClubID)
            $(this).find("#ClubName").attr("value", json.ClubName)
            $(this).find("#ShortName").attr("value", json.Shortname)
            // $(this).find("#FullName").attr("value", json.FullName)

            $(this).find("#Stadium").attr("value", json.StadiumID)
            $(this).find("#Stadium").text(json.SName)

            $(this).find("#Coach").attr("value", json.CoachID)
            $(this).find("#Coach").text(json.CFullName)
        });

        $(document).on('show.bs.modal','#deleteClubConfirm', function (event) {
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