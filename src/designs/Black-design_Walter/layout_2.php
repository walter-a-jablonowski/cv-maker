<div class="container">
  <div class="sidebar">
    <!-- Existing sidebar content -->
  </div>

  <div class="main-content">
    <div class="action-buttons">
      <button id="printBtn" class="btn btn-action" onclick="window.print();">
        <i class="bi bi-printer"></i> Print
      </button>
      <button id="langBtn" class="btn btn-action" onclick="toggleLanguage();">
        <img src="https://flagcdn.com/w20/us.png" alt="English" id="langIcon"> EN
      </button>
    </div>

    <?php if( ! empty( $data['personal']['logo'] )): ?>
      <div style="text-align: center;">
        <img src="users/<?= $user ?>/<?= $data['personal']['logo'] ?>" width="150">
      </div>
    <?php endif; ?>
    
    <!-- Rest of the main content -->
  </div>
</div>

<script>
function toggleLanguage() {
  const langBtn = document.getElementById('langBtn');
  const langIcon = document.getElementById('langIcon');
  if (langIcon.alt === "English") {
    langIcon.src = "https://flagcdn.com/w20/de.png";
    langIcon.alt = "Deutsch";
    langBtn.innerHTML = langBtn.innerHTML.replace('EN', 'DE');
  } else {
    langIcon.src = "https://flagcdn.com/w20/us.png";
    langIcon.alt = "English";
    langBtn.innerHTML = langBtn.innerHTML.replace('DE', 'EN');
  }
  // Here you would add logic to actually change the language of the page
}
</script>
