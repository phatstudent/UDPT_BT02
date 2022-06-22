<?php $this->view("football/layout/header", $data) ?>

<main role="main" class="scroll d-flex">
  <?php $this->view("football/layout/sidebar", $data) ?>
  <div class="right-area">
    <?php check_messenger() ?>
    <div class="form">
      <form  method="post">
        <input type="text" name="added_player_FullName" placeholder="Full Name" />
        <!-- <input type="text" name="added_player_ClubID" placeholder="Club ID"/> -->
        <select name="added_player_ClubName" class="custom-select" placeholder="Club ID" required>
          <option value="">Club Name</option>
          <?php if (!empty($data['selected_club_list'])) : ?>
            <?php foreach ($data['selected_club_list'] as $row) : ?>
              <option><?= $row->ClubName ?></option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
        <input type="text" name="added_player_Position" placeholder="Position" />
        <input type="text" name="added_player_Nationality" placeholder="Nationality" />
        <input type="text" name="added_player_Number" placeholder="Number" />
        <button>Add</button>
      </form>
    </div>
  </div>
</main>

<?php $this->view("football/layout/footer", $data) ?>