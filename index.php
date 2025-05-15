<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

  <?php
    include_once "head.php";
  ?>

  <head>
    <title>سوپر اپلیکیشن اسنپ</title>
  </head>

<body class="user-select-none bg-light">

  <!-- loding header -->
  <?php
    include_once "header.php";
  ?>

      <main>
        <div class=".container-fluid">

            <div id="carouselExampleCaptions" class="carousel slide">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active shadow">
                  <img src="imgs/Driver.jpg" class="d-block w-100 h-50" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>ثبت نام راننده، پیک موتوری، وانت</h5>
                    <p>با هر کیلومتر درآمد کسب کنید!</p>
                  </div>
                </div>
                <div class="carousel-item shadow">
                  <img src="imgs/Food.jpg" class="d-block w-100 h-50" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>اسنپ غذا، تجربه سریع و آسان سفارش آنلاین غذا</h5>
                    <p> سفارش آنلاین غذا را به سادگی و با خیال راحت ثبت کنید و در سریع‌ترین زمان ممکن غذای خود را درب منزل تحویل بگیرید.</p>
                  </div>
                </div>
                <div class="carousel-item shadow">
                  <img src="imgs/Market.jpg" class="d-block w-100 h-50" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>سوپرمارکت آنلاین اسنپ!</h5>
                    <p> سفارش آنلاین غذا را به سادگی و با خیال راحت ثبت کنید و در سریع‌ترین زمان ممکن غذای خود را درب منزل تحویل بگیرید.</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="container ">
            <div class="text-center my-5">
              <a href="categories.php" class="btn btn-pink w-100 shadow text-white" style="max-width: 400px;">مشاهده دسته‌بندی غذاها</a>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 mx-3 mx-md-auto md-5">
              <div class="col order-md-2">
                <div class="card text-bg-success mb-3 h-100">
                  <svg class="h-25 w-25 mx-auto my-4" xmlns="http://www.w3.org/2000/svg" fill="#06c116" class="bi bi-taxi-front-fill" viewBox="0 0 16 16">
                    <path d="M6 1a1 1 0 0 0-1 1v1h-.181A2.5 2.5 0 0 0 2.52 4.515l-.792 1.848a.8.8 0 0 1-.38.404c-.5.25-.855.715-.965 1.262L.05 9.708a2.5 2.5 0 0 0-.049.49v.413c0 .814.39 1.543 1 1.997V14.5a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1.338c1.292.048 2.745.088 4 .088s2.708-.04 4-.088V14.5a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1.892c.61-.454 1-1.183 1-1.997v-.413q0-.248-.049-.49l-.335-1.68a1.8 1.8 0 0 0-.964-1.261.8.8 0 0 1-.381-.404l-.792-1.848A2.5 2.5 0 0 0 11.181 3H11V2a1 1 0 0 0-1-1zM4.309 4h7.382a.5.5 0 0 1 .447.276l.956 1.913a.51.51 0 0 1-.497.731c-.91-.073-3.35-.17-4.597-.17s-3.688.097-4.597.17a.51.51 0 0 1-.497-.731l.956-1.913A.5.5 0 0 1 4.309 4M4 10a1 1 0 1 1-2 0 1 1 0 0 1 2 0m10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-9 0a1 1 0 0 1 1-1h4a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1"/>
                  </svg>
                  <div class="card-body text-center">
                    <h5 class="card-title h3">اسنپ خودرو</h5>
                    <p class="card-text h5 pt-3"> بیش از <mark style="background-color: #06c1165f; color: white;">72 میلیون</mark> کاربر </p>
                  </div>
                </div>
              </div>
              <div class="col order-md-1">
                <div class="card text-bg-primary mb-3 h-100">
                  <svg class="h-25 w-25 mx-auto my-4" xmlns="http://www.w3.org/2000/svg" fill="blue" class="bi bi-basket2-fill" viewBox="0 0 16 16">
                    <path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1"/>
                  </svg>
                  <div class="card-body text-center">
                    <h5 class="card-title h3">اسنپ مارکت</h5>
                    <p class="card-text h5 pt-3"> بیش از <mark style="background-color: #0000ff5f; color: white;">21 میلیون</mark> کاربر </p>
                  </div>
                </div>
              </div>
              <div class="col order-md-3">
                <div class="card text-bg-pink mb-3 h-100">
                  <svg class="h-25 w-25 mx-auto my-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#FF007F " viewBox="0 0 50 50"><path d="M48 26.539063L48 22.582031C48.632813 22.335938 49.242188 22.019531 49.800781 21.597656C50.015625 21.4375 50.15625 21.195313 50.191406 20.929688C50.226563 20.664063 50.152344 20.394531 49.988281 20.183594L47.980469 17.632813C47.78125 11.1875 42.492188 6 36 6L14 6C7.5 6 2.203125 11.199219 2.019531 17.65625L0.1875 20.21875C-0.128906 20.660156 -0.0351563 21.273438 0.398438 21.601563C0.898438 21.972656 1.441406 22.257813 2 22.496094L2 26.539063C0.800781 27.222656 0 28.492188 0 30C0 31.507813 0.800781 32.777344 2 33.460938L2 39C2 41.757813 4.242188 44 7 44L43 44C45.757813 44 48 41.757813 48 39L48 33.460938C49.199219 32.777344 50 31.507813 50 30C50 28.492188 49.199219 27.222656 48 26.539063 Z M 17.5 9C18.328125 9 19 9.671875 19 10.5C19 11.328125 18.328125 12 17.5 12C16.671875 12 16 11.328125 16 10.5C16 9.671875 16.671875 9 17.5 9 Z M 15.5 13C16.328125 13 17 13.671875 17 14.5C17 15.328125 16.328125 16 15.5 16C14.671875 16 14 15.328125 14 14.5C14 13.671875 14.671875 13 15.5 13 Z M 12.5 10C13.328125 10 14 10.671875 14 11.5C14 12.328125 13.328125 13 12.5 13C11.671875 13 11 12.328125 11 11.5C11 10.671875 11.671875 10 12.5 10 Z M 4.25 18L45.769531 18.019531L47.726563 20.542969C45.847656 21.492188 43.527344 21.296875 41.800781 20C41.480469 19.761719 41.054688 19.734375 40.710938 19.929688L39.089844 20.839844C37.25 21.929688 35.015625 21.953125 33.191406 20.828125L31.589844 19.929688C31.300781 19.765625 30.949219 19.757813 30.652344 19.90625L27.671875 21.394531C26.074219 22.152344 24.109375 22.144531 22.546875 21.40625L19.546875 19.90625C19.40625 19.835938 19.253906 19.800781 19.101563 19.800781C18.929688 19.800781 18.761719 19.84375 18.609375 19.929688L16.992188 20.839844C15.148438 21.929688 12.910156 21.953125 11.089844 20.828125L9.488281 19.929688C9.144531 19.734375 8.71875 19.761719 8.398438 20C6.660156 21.304688 4.3125 21.496094 2.429688 20.519531 Z M 46 32L4 32C2.859375 32 2 31.140625 2 30C2 28.859375 2.859375 28 4 28L46 28C47.140625 28 48 28.859375 48 30C48 31.140625 47.140625 32 46 32Z"/></svg>
                  <div class="card-body text-center">
                    <h5 class="card-title h3">اسنپ فود</h5>
                    <p class="card-text h5 pt-3"> بیش از <mark style="background-color: #FF007F5f; color: white;">20 میلیون</mark> کاربر </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container-fluid">


            <div class="row align-items-center mt-5 justify-content-start gx-auto text-center">
              <div class="col-11 col-lg-6 alert alert-pink rounded-end-pill p-5 ">
                <h3 class="h2">
                  سوپر اپلیکیشن اسنپ؛ برای همۀ نیاز ها
                </h3>
                <p class="h5 mt-5">
                  از درخواست اسنپ تا خرید بلیت سفر و سفارش غذا
                </p>
              </div>
              <div class="col-lg-5 d-lg-block d-none">
                <img style="width: 40%;" src="imgs/8c646ef1-d75e-4549-9155-f009c3e814f1.png" alt="...">
              </div>
            </div>

            <div class="row align-items-center justify-content-end text-center">
              
              <div class="col-lg-5 d-lg-block d-none">
                <img style="width: 40%;" src="imgs/dd86543c-341b-4b30-899a-02e5f67369d0.png" alt="...">
              </div>
              <div class="col-11 col-lg-6 alert alert-pink rounded-start-pill p-5 ">
                <h3 class="h2">
                  مشاهدۀ کد های تخفیف، همه در یک جا
                </h3>
                <p class="h5 mt-5">
                  دسترسی آسان تر به کدهای تخفیف اسنپ کلاب و همۀ سرویس ها
                </p>
              </div>
            </div>

            <div class="row align-items-center mb-5 justify-content-start text-center">
              <div class="col-11 col-lg-6 alert alert-pink rounded-end-pill p-5 ">
                <h3 class="h2">
                  تجربۀ بهتر با تنظیم کردن سفر
                </h3>
                <p class="h5 mt-5">
                درخواست سفر به دو مقصد،
                </p>
                <p class="h5">
                  سفر های رفت و برگشت
                </p>
                <p class="h5">
                  یا تغییر مقصد در طول سفر
                </p>
              </div>
              <div class="col-lg-5 d-lg-block d-none">
                <img style="width: 40%;" src="imgs/940ef79d-f864-4ea6-82c1-6be8fd9ea8b0.png" alt="...">
              </div>
            </div>
            
            <div class="row row-cols-2 row-cols-lg-5 justify-content-center text-center align-items-center my-4">
              <a href="https://redirect.appmetrica.yandex.com/serve/100056237185439217" target="_blank" class="col-6 col-md-4 col-xl-2 my-1">
                <img alt="" src="imgs/direct-download-badge.png" width="160" loading="eager"><noscript></noscript></a>
              <a href="https://redirect.appmetrica.yandex.com/serve/1181173947656399155" target="_blank" class="col-6 col-md-4 col-xl-2 my-1">
                <img alt="" src="imgs/myketmarket.png" width="160" loading="eager"><noscript></noscript></a>
              <a href="https://redirect.appmetrica.yandex.com/serve/1109100489301122257" target="_blank" class="col-6 col-md-4 col-xl-2 my-1">
                <img alt="" src="imgs/app_store.svg" width="160" loading="eager"><noscript></noscript></a>
              <a href="https://app.snapp.taxi/pre-ride?utm_source=website&amp;utm_medium=webapp-button" target="_blank" class="col-6 col-md-4 col-xl-2 my-1">
                <img alt="" src="imgs/snapp-pwa.png" width="160" loading="eager"><noscript></noscript></a>
              <a href="https://redirect.appmetrica.yandex.com/serve/243413381082522868?campaign=CafeBazaar" target="_blank" class="col-6 col-md-4 col-xl-2 my-1">
                <img alt="" src="imgs/bazaar.png" width="160" loading="eager"><noscript></noscript></a>
            </div>
          </div>
        </main>

        <?php
          include_once "footer.php";
        ?>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>