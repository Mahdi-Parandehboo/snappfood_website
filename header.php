<div class="container">
  <header class="d-flex flex-wrap align-items-center justify-content-center py-3 mb-4 border-bottom">
    <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <img class="bi me-2" width="100" src="imgs/LOGO-png-Eng.png">
    </a>

    <ul class="nav nav-pills justify-content-center">
      <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">سوپراپ</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-pink">ثبت نام راننده</a></li>
      <li class="nav-item"><a href="#" class="nav-link text-pink">درباره اسنپ</a></li>
    </ul>

    <form class="d-flex ms-lg-auto me-lg-auto" role="search">
      <input class="form-control me-2" type="search" placeholder="جستوجو" aria-label="Search">
      <button class="btn btn-outline-pink" type="submit">جستوجو</button>
    </form>

    <a href="cart.php" class="btn btn-pink me-2">سبد خرید</a>

    <?php if (isset($_SESSION['user_id'])): ?>
      <a href="dashboard.php" class="btn btn-outline-secondary">پنل کاربری</a>
    <?php else: ?>
      <a href="phone.php" class="btn btn-outline-secondary">ورود / ثبت‌نام</a>
    <?php endif; ?>
  </header>
</div>
