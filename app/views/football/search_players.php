<?php $this->view("football/layout/header", $data) ?>

<!-- MAIN -->
<main role="main" class="scroll d-flex">
    <?php $this->view("football/layout/sidebar", $data) ?>

    <!-- Content -->
    <div class="container">

        <div class="jumbotron text-center">
        <h1>Player Searching</h1>
        </div>
        
        <div class="container">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="search">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th>PlayerID</th>
                    <th>FullName</th>
                    <th>Position</th>
                    <th>Nationality</th>
                    <th>Number</th>
                    </tr>
                </thead>
                <tbody id="output">
                    
                </tbody>
            </table>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#search").keydown(function(){
            $.ajax({
                type:'POST',
                url:'<?= ROOT ?>search.php',
                data:{
                name:$("#search").val(),
                },
                success:function(data){
                $("#output").html(data);
                }
            });
            });
        });
    </script>
</main>

<?php $this->view("football/layout/footer", $data) ?>