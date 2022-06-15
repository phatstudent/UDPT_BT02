
<?php $this->view("football/layout/header", $data) ?>
      
      <!-- MAIN -->
      <main role="main">
        <!-- Content -->
        <article style="min-height: 200px;">
          <header class="section background-white">
          </header>
        </article>
        <div class="container">
          <table class="table mb-5">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Full name</th>
                <th scope="col">Position</th>
                <th scope="col">Nationality</th>
                <th scope="col">Number</th>
              </tr>
            </thead>
            <?php if(is_array($data['posts'])): ?>
                <?php foreach($data['posts'] as $row): ?>
                    <tbody>
                    <tr>
                        <th scope="row"><?=$row->PlayerID?></th>
                        <td><?=$row->FullName?></td>
                        <td><?=$row->Position?></td>
                        <td><?=$row->Nationality?></td> 
                        <td><?=$row->Number?></td> 
                    </tr>
                    </tbody>
                <?php endforeach; ?>
            <?php endif;?>
          </table>   
        </div>
      </main>
      
      <!-- FOOTER -->
      <?php $this->view("football/layout/footer", $data) ?>