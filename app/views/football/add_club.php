<?php $this->view("football/layout/header", $data) ?>

<main role="main" class="scroll d-flex">
  <?php $this->view("football/layout/sidebar", $data) ?>
  <div class="right-area">
    <?php check_messenger() ?>
    <div class="form">
      <form  method="post">
        <input type="text" name="added_club_ClubName" placeholder="Club Name" />
        <input type="text" name="added_club_Shortname" placeholder="Short Name" />
        <!-- <input type="text" name="added_player_ClubID" placeholder="Club ID"/> -->
        <select name="added_club_StadiumID" class="custom-select" required>
          <option>Stadium</option>
          <?php if (!empty($data['option_stadiums_list'])) : ?>
            <?php foreach ($data['option_stadiums_list'] as $row) : ?>
              <option value="<?=$row->StadiumID?>"><?= $row->SName ?></option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
        <select name="added_club_CoachID" class="custom-select" required>
          <option>Coach</option>
          <?php if (!empty($data['option_coachs_list'])) : ?>
            <?php foreach ($data['option_coachs_list'] as $row) : ?>
              <option value="<?=$row->CoachID?>"><?= $row->CFullName ?></option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>

        <button>Add</button>
      </form>
    </div>
  </div>
</main>

<?php $this->view("football/layout/footer", $data) ?>